<?php
	try
	{
		require_once(__DIR__ . '/includes/header.php');
		require_once(__DIR__ . '/includes/utility.php');
	}
	catch(Exception $e)
	{
		echo "Failed to include Header.<br/>Error: " . $e;
	}

	// Not logged in
	if(!isset($_SESSION['loggedIn']))
	{   ?>

	    <script>
    		alert("You must sign in to access this page.");
    		window.location = '/index.php';
		</script>

		<?php
	}

	// Fetch novel
	else
	{
		$result     = json_decode(ParseWrapper::GetChaptersAndPages(), true);
		$chapters   = $result['data'];

		?>

		<script>
			// Holds [Chapter] => [desc, url, thumbnail]
			var chapterPageData = {};
		</script>

		<?php
		// Store in javascript

		// Index
		$i = 0;	// Chapter

		// For each chapter
		foreach($chapters as $chapter => $pageData)
		{
			$j = 0;	// Page index
			$i++;	// Chapter index
		?>

		<script>

			var chapter_j = '<?php echo $chapter; ?>';
			chapterPageData[chapter_j] = chapterPageData[chapter_j] || [];

			<?php
				// For each page
				foreach($pageData as $page => $data)
				{
					// Page counter
					$j++;

					// Generate thumbnail URL
					$thumbNailName 	= "chapter" . $i . "page" . $j . ".jpg";
					$thumbnailURL 	= "/includes/images/thumbnails/" . $thumbNailName;
			?>

					chapterPageData[chapter_j].push(['<?php echo $data[0] . '\', \'' . $data[1] . '\', \'' . $thumbnailURL;?>']);

		   <?php
		   			// Create thumbnail
					Thumbnail($data[1], "chapter" . $i . "page" . $j, 75);
	   			}
			?>

		</script>

		<?php
		}
	}
?>

<html>
	<head>
		<!-- Gallery stylesheet -->
		<link rel="stylesheet" href="gallery/css/blueimp-gallery.min.css">

		<meta charset="utf-8">
		<title>Graphic Novel</title>
		<meta name="description" 	content="">
		<meta name="author" 		content="">

		<!-- mobile specific metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1 user-scalable=no">
	</head>

	<body>

		<center>
			<!-- When gallery displayed hide this -->
			<div id="notShowingGalleryHolder">
				<input type="submit" class="button" id="home-btn" value="Home"/>
				<input type="submit" class="button" id="logout" value="Logout"/>

				<!-- Chapters -->
				<div id="chapterHolder">
				</div>
			</div>
			<!-- Photo gallery -->
			<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls blueimp-gallery-carousel">
			    <div class="slides" onclick="hideGallery()"></div>
			    <h3 class="title"></h3>
			    <a class="prev">‹</a>
			    <a class="next">›</a>
			    <!--<a class="close">×</a>-->
			    <a class="play-pause"></a>
			    <ol class="indicator"></ol>
			</div>

			<!-- Images to be used -->
			<div id="links">
			</div>

		</center>

		<!-- Dynamically place chapters and images on page -->
		<script>
			setupGalleryImagesForChapter("Chapter 1");
			setupChapters();
		</script>


	<script src="gallery/js/blueimp-gallery.min.js"></script>

	<script>
		// Put pictures in gallery
		document.getElementById('links').onclick = function (event)
		{
		    event = event || window.event;
		    var target 	= event.target || event.srcElement,
		        link 	= target.src ? target.parentNode : target,
		        options = {index: link, event: event},
		        links 	= this.getElementsByTagName('a');
		    blueimp.Gallery(links, options);
			$('#notShowingGalleryHolder').hide();
		};
	</script>

	</body>
</html>
