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

<section class="under-construction">
    <div class="row">
        <a href="/" class="home">        
        <img src="images/under-construction/bg-with-txt.PNG" alt="" class="bg">
        </a>
    </div>
</section> <!-- end p1b --> 
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