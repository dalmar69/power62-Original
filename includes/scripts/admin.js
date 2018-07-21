
$(document).ready(function()
{
	// AJAX related
	setupAJAX();

	chapterNameNotEmpty();
	setupChapterButton();
	setupChapters();

	setupLogoutButton();
	setupHomeButton();
	setupUploadButton();
	setupPageNumber();
});



function setupAJAX()
{
	// Show loading screen
	$(document).ajaxStart(function()
	{
		$('#loading').show();
	});

	// Hide loading screen
	$(document).ajaxComplete(function()
	{
		$('#loading').hide();
	});
}

function setupChapterButton()
{
	// Perform sign up
	$('#createChapter').click(function(e)
	{
		// Button is in a form, this prevents submission/post back
		e.preventDefault();

		// Prepare data
		var action      = 'createChapter';
		var title 		= $("#chapterName").val();
		var ajaxurl     = 'includes/ajax.php';

		// Validate sign up form
		if(!$("#chapterName").hasClass('valid'))
		{
			alert("Chapter name cannot be empty.");
			return;
		}

		data =
		{
			'action'	:   action,
			'title'		:	title
		};

		// Post to processing page
		$.post(ajaxurl, data, function (response)
		{
			// Parse JSON
			if(response)
			{
				try
				{
					var result = JSON.parse(response);

					// Successful sign up
					if(result.return_code == 'Success')
					{
						// Clear previous entry
						$("#chapterName").val("");

						// Add chapter to option list
						addChapterOption(title);

						// Display message :)
						alert(result.message);
					}

					// Generic error
					else
					{
						alert(result.message);
					}
				}
				// Improper JSON format
				catch(e)
				{
					alert(response);
				}
			}
		});
	});
}


function chapterNameNotEmpty()
{
	// Chapter name cannot be blank
	$('#chapterName').keyup(function(event)
	{
		var input      = $(this);
		var value      = $(this).val();
		if(value)
		{
			input.removeClass("invalid").addClass("valid");
		}
		else
		{
			input.removeClass("valid").addClass("invalid");
		}
	});
}

function addChapterOption(name)
{
	var tempChapterOption = $('<option>',
	{
		value: name,
		text : name
	});

	// Put in chapter list
	$('[name="chapterSelect"]').append(tempChapterOption);
}


// Attach options to chapter/page select elements
function setupChapters()
{
	// Safety first
	if(typeof chapterData !== 'undefined')
	{
		// Populate chapter list
		$.each(chapterData, function (index, title)
		{
			addChapterOption(title);
		});

		// When changing a planet populate cities list
		/*$('[name="planet"]').change(function()
		{
			// Remove previous options
			$('[name="city"]').children().remove();

			// Cities for selected planet
			let citiesForPlanet = planetCityData[$(this).val()];

			// Iterate cities
			$.each(citiesForPlanet, function(i, city)
			{
				// Create city option element
				var tempCityOption = $('<option>',
				{
					value: 	city,
					text: 	city
				});

				// Put in city list
				$('[name="city"]').append(tempCityOption);
			});
		});*/
	}
}

function setupHomeButton()
{
	// Navigate home
	$('#home-btn').click(function()
	{
		window.location = '/index.php';
	});
}


function setupLogoutButton()
{
	// Log user out
	$('#logout').click(function()
	{
		window.location = '/logout.php';
	});
}

function setupPageNumber()
{
	$('#pageNumber').keydown(function(e)
	{
   		e.preventDefault();
   		return false;
	});
}

function setupUploadButton()
{
	$('#upload').click(function()
	{
		// Verify not empty
		if($('#fileToUpload').val() != "")
		{

			// Prepare data
			var chapter 	= $('[name="chapterSelect"]').val();
			var description = $('#description').val();
			var pageNumber 	= $('#pageNumber').val();
			var fileData 	= $('#fileToUpload').prop('files')[0];
			var ajaxurl     = 'includes/upload.php';

			// Validate form
			if(chapter === "--PICK A CHAPTER--")
			{
				alert("Chapter name cannot be empty.");
				return;
			}

			if(pageNumber === '0' || pageNumber === '')
			{
				alert("Page number cannot be empty.");
				return;
			}

			// Put data in container
			var formData = new FormData();
			formData.append('chapter', chapter);
			formData.append('description', description);
			formData.append('pageNumber', pageNumber);
			formData.append('fileData', fileData);

			// Post to processing page
			$.ajax(
			{
				url: 			ajaxurl,
				dataType: 		'text',
				cache: 			false,
				contentType: 	false,
				processData:	false,
				data: 			formData,
				type: 			'post',
				success: function(response)
				{
					try
					{
						// Parse JSON
						var result = JSON.parse(response);

						// Success
						if(result.return_code == 'Success')
						{
							alert(result.message);

							// Clear fields
							$('#description').val("");
							$('#pageNumber').val(parseInt($('#pageNumber').val(), 10) + 1);
							$("#fileToUpload").replaceWith($("#fileToUpload").val('').clone(true));
						}

						// Error
						else
						{
							alert(result.message);
						}
					}
					// Improper JSON format
					catch(e)
					{
						alert(response);
					}
				}
			});
		}

		else
		{
			alert('Please select a file first.');
		}
	});
}
