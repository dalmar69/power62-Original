<?php

	try
	{
		require_once(__DIR__ . '/parseWrapper.php');
	}
	catch(Exception $e)
    {
        echo "Error: " . $e;
    }

	// Check if admin
	if(!isset($_SESSION['user']) || $_SESSION['user'] != 'admin')
	{
		?>
		<html>
			<script>
				alert('Nice try :)');
				window.location = '../index.php';
			</script>
		</html>

		<?php
		exit;
	}


	// Check for error
	if(0 < $_FILES['fileData']['error'])
	{
		echo ParseWrapper::BuildResult('Failed', 'Error: ' . $_FILES['fileData']['error'], 'upload');
		exit;
	}

	// Check if page exists
	/*if(ParseWrapper::DoesPageExist($_POST['chapter'], $_POST['pageNumber']) === 'true')
	{
		echo ParseWrapper::BuildResult('Failed',
										'Error: Page (' . $_POST['pageNumber'] . ') already exists for chapter (' .$_POST['chapter'] . ') select the overwrite checkbox to forcefully overwrite this page.',
										'upload');
		exit;
	}*/

	// All good, upload
	else
	{
		// Description is optional so safely unwrap
		$description = "";
		if(isset($_POST['description']))
		{
			$description = $_POST['description'];
		}

		$name = $_FILES['fileData']['name'];

		// Send to backend
		$result = ParseWrapper::CreatePage($_FILES['fileData']['tmp_name'], $name, $_POST['chapter'], $_POST['pageNumber'], $description);
		echo $result;
		exit;

		//move_uploaded_file($_FILES['fileData']['tmp_name'], 'files/' . $_FILES['fileData']['name']);
	}

?>
