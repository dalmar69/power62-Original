<?php
	try
	{
		require_once(__DIR__ . '/includes/header.php');
	}
	catch(Exception $e)
	{
		echo "Failed to include Header.<br/>Error: " . $e;
	}

	// Not logged in
	if(!isset($_SESSION['loggedIn']))
	{   ?>

	    <script>
    		alert("You must sign in to access this page.");
    		window.location = '/index.php';
		</script>

		<?php
	}
?>

<html>
	<head>
		<meta charset="utf-8">
		<title>Settings</title>
		<meta name="description" content="">
		<meta name="author" content="">

		<!-- mobile specific metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1 user-scalable=no">
	</head>

	<input type="submit" class="button" id="logout" value="Logout"/>

	<div class="SettingsHolder" align="center">
		<br/>
		<input type="submit" class="button" id="toggle2FA" value="Toggle 2FA"/>
		<br/>
		<input type="submit" class="button" id="home-btn" value="Home"/>
		<br/>
		<div class="qrHolder">
            <h4 style="color: white;">Verify your 2FA key</h4>
            <br/>
            <input type="text" 	 name="token" 	id="token" class="form-control login-textfield" style="width: 30%;" placeholder="2FA Token"/>
            <input type="submit" class="button" id="verifyToken" value="Verify 2FA"/>
            <br/>
            <div class="qrCode" style="background-image: url(<?php echo $_SESSION['otpURL']; ?>)">
            </div>
        </div>
		<!-- Loading spinner  -->
		<div class="loading" id="signup-loading">
			<br/>
			<b>Loading...</b>
		</div>
	</div>
</html>

<?php
	// Display otp verification holder
	if($_SESSION['otpEnabled'] == false)
	{	?>

		<script>
			$('.qrHolder').show();
		</script>

		<?php
	}
?>
