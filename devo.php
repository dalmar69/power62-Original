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

<div class="devo">
    <div class="row">
        <div class="col-1 main-secondar-img-container">
            <img src="../images/worlds/devo/secondary.png" alt="secondary" class="secondary-img">
            <img src="../images/worlds/devo/main.png" alt="main" class="main-img">
        </div>  
        <div class="col-1 world-descr-container">
            <h1 class="header header-shadow">DEVO</h1>
            <p class="descr-1">
                From a nearby solar system over 1 light year away. The Devonians traveled to 
                Star System 62 inside their gas planet. They called themselves the “Machians,” 
                which in their language means the Conqueror. The Machians came to this 
                system specifically for the abundance of water, which was in short supply 
                in their previous star system.
            </p>
            <p class="descr-2">
                There were thousands of Devoan cities floating in the sky on Devo. They had divided the planet into two 
                communities, each responsible for the environment on their half of the planet. They constantly repair 
                damage to the planet's atmosphere. The two communities were called the Nevska Empire and the Rurak 
                Federation, but it must be noted they are enemies at best, 
            </p>
        </div>
    </div>
    <div class="row">
        <div class="section-banner-imgs">
            <div class="banner-card">
                <img src="../images/worlds/devo/sub_1.png" alt="sub_1" class="banner-img">
                <p class="banner-descr">
                    ALMA CLAN  RESEMBLES <br>
                    THE VIKING MAURADERS
                </p>
            </div>
            <div class="banner-card">
                <img src="../images/worlds/devo/sub_2.png" alt="sub_2" class="banner-img">
                <p class="banner-descr">
                    ALMA CLAN  RESEMBLES <br>
                    THE VIKING MAURADERS
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