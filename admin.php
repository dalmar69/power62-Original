<?php
	try
	{
		require_once(__DIR__ . '/includes/adminHeader.php');
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

	// Not logged in
	if(!isset($_SESSION['user']) || $_SESSION['user'] !== 'admin')
	{   ?>

	    <script>
    		alert("Access denied :)");
    		window.location = '/index.php';
		</script>

		<?php
	}
?>


	<head>
		<meta charset="utf-8">
		<title>Admin Panel</title>
		<meta name="description" content="">
		<meta name="author" content="">

		<!-- mobile specific metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1 user-scalable=no">
	</head>

	<body>

		<!-- Top buttons -->
		<input type="submit" class="button" id="logout" value="Logout" style="width: 100px; display: inline;"/>
		<div style="margin-left: 10px;"></div>
		<input type="submit" class="button" id="home-btn" value="Home" style="width: 100px; display: inline"/>

		<!-- Holder -->
		<section>

			<!-- Chapter manager -->
	    	<div id="left">
				<div id="wrapper">
					<center>
						<h4 style="color: white;">Chapter Manager</h4>
						<br/>
						<input type="text" name="chapterName" id="chapterName" placeholder="Chapter name"/>
						<div style="margin-top: 10px;"></div>
						<input type="submit" class="button" id="createChapter" value="Create chapter"/>
					</center>
				</div>
			</div>

			<!-- Page manager -->
	    	<div id="right">
				<div id="wrapper">
					<center>
						<h4 style="color: white;">Page Manager</h4>
						<br/>
						<form enctype="multipart/form-data">
							<select name="chapterSelect" id="chapterSelect">
								<option>--PICK A CHAPTER--</option>
							</select>
							<br/>
							<br/>
							<input type="text" name="description" id="description" placeholder="Page descrpition"/>
							<br/>
							<div id="pageNumberHolder">
								<p id="pageLabel">Page number: </p><input type="number" name="pageNumber" id="pageNumber" min="1" max="20">
								<!--<p id="overwriteLabel"> Overwrite existing: <input type="checkbox" name="overwrite" id="overwrite">-->
							</div>
							<br/>
							<div id="imageHolder">
								<p>Image: </p><input type="file" name="fileToUpload" id="fileToUpload">
							</div>
							<br/>
						</form>
						<input type="submit" class="button" id="upload" value="Submit Page"/>
					</center>
				</div>
			</div>
		</section>

		<!-- Loading spinner  -->
		<div class="loading" id="loading">
			<br/>
			<b style="color: white;">Loading...</b>
		</div>

	</body>
</html>
