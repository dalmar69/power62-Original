<?php
	try
	{
		require_once(__DIR__ . '/views/partials/header.php');
	}
	catch(Exception $e)
	{
		echo "Failed to include Header.<br/>Error: " . $e;
	}
?>

<div class="video">
	<div class="row">
        <h1 class="header header-shadow">
             THE <br> POWER 62 1.0 <br> GAMEPLAY       
        </h1>
        <iframe width="80%" height="420" src="https://www.youtube.com/embed/bn40jr3or_Y" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
    </div>
</div>

<?php
	try
	{
		require_once(__DIR__ . '/views/partials/footer.php');
	}
	catch(Exception $e)
	{
		echo "Failed to include Header.<br/>Error: " . $e;
	}
?>