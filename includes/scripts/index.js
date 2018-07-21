// Global to hold username
var playerName 	= "";
var mode 		= "signup";


$(document).ready(function()
{
	// AJAX related
	setupAJAX();

	setupForgotPassword();

	// For users not signed in
	let page = document.location.pathname.toLowerCase();

	if(page.indexOf("index") >= 0 || page.length === 1)
	{
		setupPlanetsAndCities();
		usernameAndPasswordNotEmpty();
		starportAndNameNotEmpty();
		setupEmailVerificationButton();
		setupSignupButton();
		setupLoginButton();
		setupCaptchaCheckbox();
	}

	// For signed in users
	else
	{
		tokenNotEmpty();
		setupVerifyOTPButton();
		setupLogoutButton();
		setupSettingsPage();
	}
});



function setupAJAX()
{
	// Show loading screen
	$(document).ajaxStart(function()
	{
		if(mode == 'signup')
		{
			$('#signup-loading').show();
		}
		else
		{
			$('#signin-loading').show();
		}
	});

	// Hide loading screen
	$(document).ajaxComplete(function()
	{
		if(mode == 'signup')
		{
			$('#signup-loading').hide();
		}
		else
		{
			$('#signin-loading').hide();
		}
	});
}


// Attach options to planet/city select elements
function setupPlanetsAndCities()
{
	// If logged in, we do not fetch this data
	if(typeof planetCityData !== 'undefined')
	{
		// Populate planet list
		$.each(planetCityData, function (planet, cities)
		{
			// Create planet option element
			var tempPlanetOption = $('<option>',
			{
				value: planet,
				text : planet
			});

			// Put in planet list
			$('[name="planet"]').append(tempPlanetOption);
		});

		// When changing a planet populate cities list
		$('[name="planet"]').change(function()
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
		});
	}
}


// Email must be valid
function isEmail()
{
	var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	return regex.test($('#email').val());
}



function setupEmailVerificationButton()
{
	// Send email verification
	$('#sendEmailVerification').click(function()
	{
		// Validate fields
		if(isEmail())
		{
			var action      = $(this).val();
			var email    	= $("#email").val();
			var ajaxurl     = 'includes/ajax.php';
			data =
			{
						'action':   action,
						'email':    email
			};
			$.post(ajaxurl, data, function (response)
			{
				// Parse JSON
				//var result = JSON.parse(response);
				alert(response);
			});
		}

		// Not all fields filled out
		else
		{
			alert("Email cannot be empty.");
		}
	});
}


function usernameAndPasswordNotEmpty()
{
	// Username and password cannot be blank
	$('#username, #password').keyup(function(event)
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

function starportAndNameNotEmpty()
{
	// Starport and name cannot be blank
	$('#starport, #name').keyup(function(event)
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


// Display recaptcha
function setupCaptchaCheckbox()
{
	$('#captcha-checkbox').click(function(e)
	{
		e.preventDefault();
		$('.g-recaptcha').click();
	});
}


function setupSignupButton()
{
	// Perform sign up
	$('#sign-up-btn').click(function(e)
	{
		// Button is in a form, this prevents submission/post back
		e.preventDefault();

		// Set mode for ajax spinner
		mode = 'signup';

		// Prepare data
		var action      = 'signup';
		var name 		= $("#name").val();
		var email       = $("#email").val();
		var username    = $("#username").val();
		var password    = $("#password").val();
		var planet 		= $('[name="planet"]').val();
		var city 		= $('[name="city"]').val();
		var starport 	= $('#starport').val();
		var ajaxurl     = 'includes/ajax.php';

		// Check captcha
		if(grecaptcha.getResponse().length === 0)
		{
			alert("Captcha required.");
			return;
		}

		// Validate sign up form
		if(!$("#username").hasClass('valid') || !$("#password").hasClass('valid') || !isEmail())
		{
			alert("Username, email, and password are required.");
			return;
		}

		if(planet === '--PICK YOUR PLANET--')
		{
			alert("Don't forget to choose a planet and city");
			return;
		}

		if(!$("#starport").hasClass('valid') || !$("#name").hasClass('valid'))
		{
			alert("Starport and name are required.");
			return;
		}

		if(password !== $("#confirm-password").val())
		{
			alert("Passwords to not match.");
			return;
		}

		if(!$("#terms-checkbox").prop('checked'))
		{
			alert("Please read and agree to the terms and conditions first.");
			return;
		}

		data =
		{
					'action'	:   action,
					'name'		:	name,
					'email'		:   email,
					'username'	: 	username,
					'password'	: 	password,
					'planet'	:	planet,
					'city'		:	city,
					'starport'	:	starport,
					'captcha'	:	grecaptcha.getResponse()
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
						alert(result.message);
					}

					// Generic error
					else
					{
						// Reset recaptcha
						grecaptcha.reset();

						alert(result.message);
					}
				}
				// Improper JSON format
				catch(e)
				{
					// Reset recaptcha
					grecaptcha.reset();

					alert(response);
				}
			}
		});
	});
}


function setupLoginButton()
{
	// Detect enter button
	$('#login-username, #login-password').keypress(function(e)
	{
		// Check key
		var keyCode = (e.keyCode ? e.keyCode : e.which);

		// Enter button
		if(keyCode == '13')
		{
			// Stop form submission
			e.preventDefault();

			// Stop event from propogation
			e.stopPropagation();

			// Set mode for ajax loading image
			mode = "signin";

			// Perform login
			login();
		}
	});

	// Detect enter button
	$('.input-login-btn').click(function(e)
	{
		// Stop form submission
		e.preventDefault();

		// Set mode for ajax loading image
		mode = "signin";

		// Perform login
		login();
	});

	// Replace login with username if exists
	if(playerName)
	{
		$('.p1c2-login-area').html('<label>WELCOME ' + playerName + '</label>');

		// Hide enter button
		$('.input-login-btn').hide();
	}
}


function login()
{
	// Prepare data
	var action      = 'signin';
	var username 	= $("#login-username").val();
	var password    = $("#login-password").val();
	var ajaxurl     = 'includes/ajax.php';

	// Validate data
	if(!username || !password)
	{
		alert("Username and password are required.");
	}

	else
	{
		data =
		{
				'action'	:   action,
				'username'	: 	username,
				'password'	: 	password
		};


		// Post to processing page
		$.post(ajaxurl, data, function (response)
		{
			try
			{
				// Parse JSON
				var result = JSON.parse(response);

				// Successful sign in
				if(result.return_code == 'Success')
				{
					alert(result.message);
					window.location = '/settings.php';
				}

				// 2FA required
				else if(result.return_code == '2FA')
				{
					alert(result.message);
					window.location = '/2FA.php';
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
		});
	}
}

/*
function dumpSessionHandler()
{
	// Get current user  /  Dump session variables
	$('#currentUser, #dumpSession').click(function()
	{
		// Prepare data
		var action      = $(this).val();
		var ajaxurl     = 'includes/ajax.php';
		data =
		{
					'action':   action
		};

		// Post to processing page
		$.post(ajaxurl, data, function (response)
		{
			alert(response);
		});
	});
}*/

function tokenNotEmpty()
{
	// Username and password cannot be blank
	$('#token').keyup(function(event)
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

function setupVerifyOTPButton()
{
	// Verify OTP token button
	$('#verifyToken').click(function()
	{
		// Validate fields
		if($("#token").hasClass('valid'))
		{
			// Prepare data
			var action      = 'verifyToken';
			var token    	= $("#token").val();
			var ajaxurl     = 'includes/ajax.php';
			data =
			{
						'action':   action,
						'token':    token
			};

			// Post to processing page
			$.post(ajaxurl, data, function (response)
			{
				// Parse JSON
				//alert(response);
				var result = JSON.parse(response);

				// Success
				if(result.return_code == 'Success')
				{
					// Settings page
					let page = document.location.pathname.toLowerCase();
					if(page.indexOf("settings") >= 0)
					{
						// Token verified, toggle setting on backend
						if(result.data.includes('Verified'))
						{
							// Enable 2FA
							toggle2FA(true);
						}

						else
						{
							alert(result.data);
						}
					}

					// Login page
					else
					{
						alert(result.data);

						// Forward to settings page
						window.location = '/settings.php';
					}
				}

				// Error
				else
				{
					alert(result.message);
				}
			});
		}

		// Not all fields filled out
		else
		{
			alert("Token cannot be empty.");
		}
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

function setupSettingsPage()
{
	setupHomeButton();
	setupToggle2FA();
}

// Display QR holder and interact with backend
function setupToggle2FA()
{
	$('#toggle2FA').click(function()
	{
		// Disable 2FA
		toggle2FA(false);

		let qrHolder 	= $('.qrHolder');

		// Toggled on already
		if(qrHolder.is(":visible"))
		{
			// Hide QR holder
			qrHolder.hide();
		}

		// Toggled off already
		else
		{
			qrHolder.show();
			alert("2FA is not enabled.  You must verify your token first.");
		}
	});
}

function setupForgotPassword()
{
	// Forward to forgot page
	$('#forgot-password-btn').click(function()
	{
		window.location = '/forgot.php';
	});

	// Send password reset
	$('#forgot-btn').click(function()
	{
		// Validate email
		if(isEmail())
		{
			// Prepare data
			var action      = 'forgotPassword';
			var email    	= $("#email").val();
			var ajaxurl     = 'includes/ajax.php';
			data =
			{
						'action':   action,
						'email':    email
			};

			// Post to processing page
			$.post(ajaxurl, data, function (response)
			{
				// Parse JSON
				var result = JSON.parse(response);

				alert(result.message);
			});
		}

		// Not all fields filled out
		else
		{
			alert("Email cannot be empty.");
		}
	});
}

function toggle2FA(mode)
{
	// Disable on backend
	var action      = 'toggle2FA';
	var ajaxurl     = 'includes/ajax.php';
	data =
	{
				'action':	action,
				'value'	: 	mode
	};

	// Post to processing page
	$.post(ajaxurl, data, function (response)
	{
		// Parse JSON
		var result = JSON.parse(response);
		alert(result.message);

		// Hide QR holder if we just enabled it successfully
		if(mode == true)
		{
			$('.qrHolder').hide();
		}
	});
}

function setupHomeButton()
{
	// Navigate home
	$('#home-btn').click(function()
	{
		window.location = '/index.php';
	});
}


// Add image link to gallery div
function addImageLink(desc, url, thumbnail)
{
	var newLink = '<a href="' + url + '" title="' + desc +'"' + '"><img src="' + thumbnail + '" alt="' +  desc + '"/></a>';
	var links = $('#links');
	if(links.length > 0)
	{
		$(links).append(newLink);
	}
	else
	{
		console.log("Error");
	}
}

function setupGalleryImagesForChapter(chapter)
{
	// Put links in gallery
	if(typeof chapterPageData !== 'undefined')
	{
		let pageData = chapterPageData[chapter];
		// Iterate chapters
		//$.each(chapterPageData, function (chapter, pageData)
		//{
			// Iterate pages
			for(var i = 0; i < pageData.length; i++)
			{
				addImageLink(pageData[i][0], pageData[i][1], pageData[i][2]);
			}
		//});
	}
}

function addChapterButton(chapter)
{
	var newChapter 		= '<p onclick="chapterSelected(this)">' + chapter + '</p>';
	var chapterHolder 	= $('#chapterHolder');
	if(chapterHolder.length > 0)
	{
		$(chapterHolder).append(newChapter);
	}
	else
	{
		console.log("Error");
	}
}

// Put chapter buttons in holder
function setupChapters()
{
	if(typeof chapterPageData !== 'undefined')
	{
		$.each(chapterPageData, function(chapter, pageData)
		{
			addChapterButton(chapter);
		});
	}
}

// When chapter button pressed repopulate gallery
function chapterSelected(element)
{
	// Clear previous
	var links = $('#links');
	links.html("");

	setupGalleryImagesForChapter(element.innerHTML);
}

function hideGallery()
{
	$('#notShowingGalleryHolder').show();
}
/*
function setupCaptchaAlert()
{
	$('#captchaResponse').click(function()
	{
		alert(grecaptcha.getResponse());
	});
}*/
