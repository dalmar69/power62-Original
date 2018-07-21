<?php
    try
    {
        require_once(__DIR__ . '/parseWrapper.php');
?>
<html>
    <!-- CSS -->
    <link rel="stylesheet" href="./includes/css/index.css">
    <link rel="stylesheet" href="./includes/css/admin.css">

    <!-- Scripts -->
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="./includes/scripts/admin.js"></script>

    <!-- Fetch chapter titles from backend -->
	<script>

	// Holds chapters
	var chapterData = [];

	<?php

	$result     = json_decode(ParseWrapper::GetChapterTitles(), true);
	$titles     = $result['data'];

	// Store in javascript
    for($i = 0; $i < count($titles); $i++)
    {
	?>
        chapterData[<?php echo $i; ?>] = '<?php echo $titles[$i]; ?>';
    <?php
	}
	?>

	</script>


<?php
    }
    catch(Exception $e)
    {
        echo "Error: " . $e;
    }
?>
