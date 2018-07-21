<?php
    try
    {
        require_once(__DIR__ . '/parseWrapper.php');
    ?>

    <html>
        <!-- CSS -->
        <link rel="stylesheet" href="./includes/css/index.css">
        <link href="https://fonts.googleapis.com/css?family=Saira+Condensed" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/base.css">
        <!-- <link rel="stylesheet" href="../css/vendor.css"> -->
        <!-- <link rel="stylesheet" href="../css/main.css"> -->
        <!-- <link rel="stylesheet" href="../css/fancybox.css">
        <link rel="stylesheet" href="../css/morphing.css"> -->
        <link rel="stylesheet" href="../css/app.css">

        <!-- Scripts -->
        <script src="../js/jquery-3.2.1.min.js"></script>
        <script src="../js/modernizr.js"></script>
        <script src="../js/pace.min.js"></script>
        <script src="https://www.google.com/recaptcha/api.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="./includes/scripts/index.js"></script>
        <script src="../js/plugins.js"></script>
        <script src="../js/main.js"></script>
        <script src="../js/fancybox.js"></script>
        <script type="text/javascript" src="../js/jquery.matchHeight.js"></script>

    <?php

        // Check if logged in
        if(isset($_SESSION['user']))
        {
            // Verified 2FA or it is not enabled
            // Good to go
            if(isset($_SESSION['loggedIn']))
            {
                ?>
                    <script>
                        // Save username in javascript
                        playerName = '<?php echo $_SESSION['user']; ?>';
                    </script>
                <?php
            }

            // Did not verify via 2FA
            else
            {
                ?>
                    <script>
                        // If not on 2FA page bring them there.
                        if(!window.location.pathname.includes("2FA"))
                        {
                            alert("Please verify via 2FA first.");
                            window.location = '/2FA.php';
                        }
                    </script>
                <?php
            }
        }

        // Get planets and cities
        // Dirty because we're fetching in PHP and converting to JS
        // Can't expose any backend interactions client side.
        else
        {?>
            <script>

            // Holds planet -> [City]
        	var planetCityData = {};

            <?php

            $result     = json_decode(ParseWrapper::GetPlanetsAndCities(), true);
            $planets    = $result['data'];

            // Store in javascript
            foreach($planets as $planet => $cities)
            {
            ?>

                var planet_j = '<?php echo $planet; ?>';
                planetCityData[planet_j] = planetCityData[planet_j] || [];

                <?php
                    foreach($cities as $city)
                    {
                ?>
                        planetCityData[planet_j].push('<?php echo $city; ?>');

               <?php } ?>

    <?php   } ?>

            </script>
<?php    }
    }
    catch(Exception $e)
    {
        echo "Error: " . $e;
    }
?>
</html>
