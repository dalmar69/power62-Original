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
	if(!isset($_SESSION['user']))
	{
		?>

	    <script>
    		alert("You must sign in to access this page.");
    		window.location = '/index.php';
		</script>

		<?php
	}

	// Already verified
	else if(isset($_SESSION['loggedIn']))
	{   ?>

	    <script>
    		alert("You have already verified via 2FA.");
    		window.location = "/index.php";
	    </script>

	    <?php
	}
?>

<html>
	<head>
		<meta charset="utf-8">
		<title>2FA Confirmation</title>
		<meta name="description" content="">
		<meta name="author" content="">

		<!-- mobile specific metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1 user-scalable=no">
	</head>

	<input type="submit" class="button" id="logout" value="Logout"/>

	<div class="2FAHolder" align="center">
		<h4 style="color: white;">Verify your 2FA token</h4>
		<br/>
		<input type="text" 	 name="token" 	id="token" class="form-control login-textfield" style="width: 30%;" placeholder="2FA Token"/>
		<input type="submit" class="button" id="verifyToken" value="Verify"/>
		<br/>

		<!-- Loading spinner  -->
		<div class="loading" id="signup-loading">
			<br/>
			<b>Loading...</b>
		</div>
	</div>
</html>
