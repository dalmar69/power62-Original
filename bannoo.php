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

<div class="bannoo">
    <div class="row">
        <div class="col-1 main-secondar-img-container">
            <img src="../images/worlds/bannoo/secondary.png" alt="secondary" class="secondary-img">
            <img src="../images/worlds/bannoo/main.png" alt="main" class="main-img">
        </div>  
        <div class="col-1 world-descr-container">
            <h1 class="header header-shadow">BANNOO</h1>
            <p class="descr-1">
                The next planet out from Arango is Bannoo. The colonists of Bannoo prefer their 
                new home to the one they had on Fodo. Because of the incredible temperatures 
                built up by greenhouse warming, it is the hottest planet in this star system, 
                even though Arango is closer to the sun. The atmosphere is made up primarily 
                of carbon dioxide.
            </p>
            <p class="descr-2">
                The colony's inhabitants come from a country on Fodo where the population strongly resembles
                the citizens of India, China, Japan and Korea on earth. After Bannoo's revolution and declaration 
                of independence, the colonist's powerful will to survive shaped the colony, and created a 
                technologically advanced society and a new class of warrior, the Techno-Ninjas.
                <img src="../images/worlds/bannoo/female-figure.png" alt="figure" class="figure">
            </p>
        </div>
    </div>
    <div class="row">
        <div class="section-banner-imgs">
            <div class="banner-card">
                <img src="../images/worlds/bannoo/sub_1.png" alt="sub_1" class="banner-img">
                <p class="banner-descr">
                    THE IMPERIAL STANDARD OF<br>
                    THE EMPIRE OF NISHI
                </p>
            </div>
        </div>
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
