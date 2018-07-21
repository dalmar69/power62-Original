<?php

	// Create thumbnail image from URL, only if it doesn't exist already
	function Thumbnail($url, $filename, $width = 150, $height = true)
	{
		// Save firl here
		$saveTo = __DIR__ . "/images/thumbnails/" . $filename . '.jpg';

		// Check if already exists
		if(file_exists($saveTo))
		{
			return;
		}

		// Download and create gd image
		$image = ImageCreateFromString(file_get_contents($url));

		// Calculate resized ratio
		// Note: if $height is set to TRUE then we automatically calculate the height based on the ratio
		$height = $height === true ? (ImageSY($image) * $width / ImageSX($image)) : $height;

		// Create image
		$output = ImageCreateTrueColor($width, $height);
		ImageCopyResampled($output, $image, 0, 0, 0, 0, $width, $height, ImageSX($image), ImageSY($image));

		// Save image
		ImageJPEG($output, $saveTo, 95);

		return;
	}
?>
