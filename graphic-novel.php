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

<section class="graphic-novel">
    <div class="row">
        <img src="images/power.png" alt="" class="logo">
        <div class="main-content">
        <a href="#" class="main-content-link">
            <img class="main-content-img" src="images/GRAPHIC-NOVEL.PNG" alt="robot">
        </a>
        </div>
    </div>
</section>
<script>
    document.body.style.overflow = "hidden";
</script> 

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