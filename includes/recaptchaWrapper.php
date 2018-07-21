<?php

	// Recaptcha PHP wrapper
	try
	{
		require_once(__DIR__ . '/../vendor/autoload.php');
		//echo "Included: " . __DIR__ . '/../vendor/autoload.php';
	}
	catch(Exception $e)
	{
		return "Failed to include RecaptchaWrapper.<br/>Error: " . $e;
	}

	// Interact with Recaptcha
    class RecaptchaWrapper
    {
          // Config variables
          private static $secret   = '6LdXLFgUAAAAAEQMKR35sV3L7Muh7PoXbKdLeA7G';


		///////////////////////////////
	  	//     MARK: Verification    //
	  	///////////////////////////////

	  	public static function Verify($response)
	  	{
			// Verify
			$recaptcha 	= new \ReCaptcha\ReCaptcha(self::$secret);
			$resp 		= $recaptcha->verify($response);

			// Valid
			if ($resp->isSuccess())
			{
			    return true;
			}

			// Error
			else
			{
			    return false;
			}
		}
	}
?>
