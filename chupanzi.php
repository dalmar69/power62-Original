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

<div class="chupanzi">
    <div class="row">
        <div class="col-1 main-secondar-img-container">
            <img src="../images/worlds/chupanzi/secondary.png" alt="secondary" class="secondary-img">
            <img src="../images/worlds/chupanzi/main.png" alt="main" class="main-img">
        </div>  
        <div class="col-1 world-descr-container">
            <h1 class="header header-shadow">CHUPANZI</h1>
            <p class="descr-1">
                The third planet in Star System 62 is called Chupanzi. It is a warm, tropical world 
                with a wide variety of native life forms. The Makurians are shorter compared to the 
                Nahararians. They are excellent at handling dinosaurs and understand the complex 
                building construction. Their language is uniqye and they seem to be able to 
                communicate with the dinosaurs.
            </p>
            <p class="descr-2">
                Sawati Lake is a rich area for gold mining because of the geological formation. The Chupanians rely on coal 
                for energy consumption therefore they are creating a devastated emission consequence like Bannoo.
                To the east is a hunting ground called the D-Hab(Dinosaur habitat). The dinosaurs are also tamed and
                trained by the Tribes.
            </p>
        </div>
    </div>
    <div class="row">
        <div class="section-banner-imgs">
            <div class="banner-card">
                <img src="../images/worlds/chupanzi/sub_1.png" alt="sub_1" class="banner-img">
                <p class="banner-descr">
                  THE MAKU TRIBE 
                </p>
            </div>
            <div class="banner-card">
                <img src="../images/worlds/chupanzi/sub_2.png" alt="sub_2" class="banner-img">
                <p class="banner-descr">
                 THE NAHARA TRIBE
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