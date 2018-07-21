<?php
	try
	{
		require_once(__DIR__ . '/includes/header.php');
	}
	catch(Exception $e)
	{
		echo "Failed to include Header.<br/>Error: " . $e;
	}
?>

<html>
	<head>
		<meta charset="utf-8">
		<title>Forgot Password</title>
		<meta name="description" content="">
		<meta name="author" content="">

		<!-- mobile specific metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1 user-scalable=no">
	</head>

	<div class="SettingsHolder" align="center">
		<br/>
		<input type="text" 	 name="email" 	id="email" class="form-control login-textfield" style="width: 30%;" placeholder="Email address"/>
		<br/>
		<input type="submit" class="button" id="forgot-btn" value="Send Password Reset Email"/>
		<br/>
	</div>
</html>
