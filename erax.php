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
<div class="erax">
    <div class="row">
        <div class="col-1 main-secondar-img-container">
            <img src="../images/worlds/erax/secondary.png" alt="secondary" class="secondary-img">
            <img src="../images/worlds/erax/main.png" alt="main" class="main-img">
        </div>  
        <div class="col-1 world-descr-container">
            <h1 class="header header-shadow">ERAX</h1>
            <p class="descr-1">POWER 62 Star System's innermost planet, is a fiery hell like surface on one 
                side and a frozen, barren wasteland on the other. The planet does not rotate. 
                It is roughly the same size as its neighboring planets. One side continually 
                faces its sun, while the other is always kept in darkness. In this belt of 
                moderate temperatures, there is a thin atmosphere that allows inhabitation.
            </p>
            <p class="descr-2">
                In spite of its limited resources, erax was a perfect haven for space pirates dealing in kidnapping,
                mercenary, theft, and the trade of their stolen goods. The Alma Clan(Vikings like) claims the northern 
                area of the vegetation belt. The Dart Clan(Mongols like) claims the territory in the southern stretch, 
                with the Barma Clan(Caribbean like) located between the two.
            </p>
        </div>
    </div>
    <div class="row">
        <div class="section-banner-imgs">
            <div class="banner-card">
                <img src="../images/worlds/erax/sub_1.png" alt="sub_1" class="banner-img">
                <p class="banner-descr">
                    ALMA CLAN  RESEMBLES <br>
                    THE VIKING MAURADERS
                </p>
            </div>
            <div class="banner-card">
                <img src="../images/worlds/erax/sub_2.png" alt="sub_2" class="banner-img">
                <p class="banner-descr">
                    ALMA CLAN  RESEMBLES <br>
                    THE VIKING MAURADERS
                </p>
                
            </div>
            
        </div>
        <p class="tag">GRAND POOHPA 49</p>
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