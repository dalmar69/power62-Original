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

<div class="profile-setup">
    <img src="images/power.png" alt="power img" class="logo">
    <h2 class="secondary-header">SIGN UP</h6>
    <div class="row">
        <form action="#" class="col-1">
            <div class="form-group">
                <label for="profile_name" class="label">Profile Name</label>
                <input type="text" name="profile_name" class="input">
            </div>
            <div class="form-group">
                <label for="Real_Name" class="label">Real Name</label>
                <input type="text" name="Real_Name" class="input">
            </div>
            <div class="form-group">
                <label for="country" class="label">Country</label>
                <input type="text" name="country" class="input">
            </div>
            <div class="form-group">
                <label for="state" class="label">State / Providence</label>
                <input type="text" name="state" class="input">
            </div>
            <div class="form-group">
                <div class="avatar-group">
                    <img src="images/profile-icon.png" alt="pro file icon" class="power-icon-1">
                    <span class="px-size-184">184PX</span>
                    <img src="images/profile-icon.png" alt="pro file icon" class="power-icon-2">
                    <span class="px-size-64">64PX</span>
                    <img src="images/profile-icon.png" alt="pro file icon" class="power-icon-3">
                    <span class="px-size-32">32PX</span>
                </div>
                <label for="state" class="label avatar-label">Avatar</label>
                <input type="text" name="avatar" class="input" disabled>
                <div class="avatar-btn-container">
                    <button class="browse">BROWSE</button> <span class="white">NO FILE SELECTED</span>
                    <button class="upload">UPLOAD</button> 
                    <p class="btn-descr">UPLOAD AN IMAGE OR <span class="white">CHOOSE FROM OFFICIAL GAME AVATARS.</span></p>
                </div>
            </div>
        </form>

        <form action="#" class="col-2">
            <div class="form-group">
                <input type="text" name="profile_name" class="input" value="EDIT" disabled>
            </div>
            <div class="form-group">
                <input type="text" name="Real_Name" class="input" value="MY PROFILE" disabled>
            </div>
            <div class="form-group">
                <input type="text" name="country" class="input" value="MY PRIVACY SETTINGS" disabled>
            </div>
            <div class="form-group">
                <input type="text" name="state" class="input" value="TERMS & PRIVACY" disabled>
                <div class="btn-white-1">I AGREED</div>
            </div>
            <div class="form-group">
                <span class="question">HOW'S YOUR MATH</span>
                <input type="text" name="state" class="input input-addition" value="5+7= " disabled>
                <div class="btn-white-2"></div>
                <p class="age-warning">YOU MUST BE 18 YEARS OF AGE TO SIGN UP</p>
            </div>
        </form>
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