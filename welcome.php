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

<div class="shop-welcome">
    <div class="row">
        <div class="col-1">
            <h2 class="shop-header">WELCOME TO POWER62 SHOP</h2>
            <img src="images/power.png" alt="power icon" class="logo">
        </div>

        <div class="col-2">
            <div class="item-group">
                <img src="images/power_icon.png" alt="power Icon" class="power-icon">
                <a href="#" class="shop-link">Shirts and Caps</a>
            </div>
            <div class="item-group">
                <img src="images/power_icon.png" alt="power Icon" class="power-icon">
                <a href="#" class="shop-link">Citizen store</a>
            </div>
           <div class="item-group">
                <img src="images/power_icon.png" alt="power Icon" class="power-icon">
                <a href="#" class="shop-link">Power62 1.0 Game</a>
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