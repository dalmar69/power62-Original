<?php
    try
    {
        require_once(__DIR__ . '/parseWrapper.php');
        require_once(__DIR__ . '/recaptchaWrapper.php');
        //echo "Included: " . __DIR__ . '/parseWrapper.php';
    }
    catch(Exception $e)
    {
        echo "Failed to include required file.<br/>Error: " . $e;
    }

    // Process action
    if(isset($_POST['action']))
    {
        switch($_POST['action'])
        {
            // Return planets and cities
            case 'getPlanetsAndCities':
                getPlanetsAndCities();
                break;


            // Sign user up
            case 'signup':

                // Verify captcha
                if(RecaptchaWrapper::Verify($_POST['captcha']))
                {
                    signup( $_POST['name'],
                            $_POST['email'],
                            $_POST['username'],
                            $_POST['password'],
                            $_POST['planet'],
                            $_POST['city'],
                            $_POST['starport']
                            );
                }

                // Error
                else
                {
                    captchaError('signup');
                }
                break;


            // Sign user in
            case 'signin':

                // Verify captcha
                //if(RecaptchaWrapper::Verify($_POST['captcha']))
                //{
                    signin($_POST['username'], $_POST['password']);
                //}

                // Error
                //else
                //{
                //    captchaError('signin');
                //}
                break;


            // Send password reset email
            case 'forgotPassword':

                // Verify captcha
                //if(RecaptchaWrapper::Verify($_POST['captcha']))
                //{
                    forgotPassword($_POST['email']);
                //}

                // Error
                //else
                //{
                //    captchaError('forgotPassword');
                //}
                break;


            // Verify OTP token
            case 'verifyToken':
                verifyToken($_POST['token']);
                break;


            // Send email verification
            case 'sendEmailVerification':
                sendEmailVerification($_POST['email']);
                break;


            // Toggle 2FA
            case 'toggle2FA':
                toggle2FA($_POST['value']);
                break;


            // Check if Parse Server connection valid
            case 'isConnected':
                isConnected();
                break;


            // Return current user
            case 'currentUser':
                currentUser();
                break;


            // Create a new chapter for graphic novel
            case 'createChapter':
                createChapter($_POST['title']);
                break;


            // Dump session variables
            case 'dumpSession':
                dumpSession();
                break;
        }
    }

    /*
    // Get method for internal testing
    if(isset($_GET['action']))
    {
        switch($_GET['action'])
        {
            case 'signup':
                signup($_GET['username'], $_GET['password'], $_GET['email']);
                break;
            case 'signin':
                signin($_GET['username'], $_GET['password']);
                break;
        }
    }*/

    // Sign up
    function signup($name, $email, $username, $password, $planet, $city, $starport)
    {
        $signupResult = ParseWrapper::Signup($name, $email, $username, $password, $planet, $city, $starport);
        echo $signupResult;
        exit;
    }

    // Sign in
    function signin($username, $password)
    {
        $signinResult = ParseWrapper::Signin($username, $password);
        echo $signinResult;
        exit;
    }

    function forgotPassword($email)
    {
        $forgotPasswordResult = ParseWrapper::ForgotPassword($email);
        echo $forgotPasswordResult;
        exit;
    }

    function verifyToken($token)
    {
        $verifyTokenResult = ParseWrapper::VerifyToken($token);
        echo $verifyTokenResult;
        exit;
    }

    function sendEmailVerification($email)
    {
        $sendEmailVerificationResult = ParseWrapper::SendEmailVerification($email);
        echo $sendEmailVerificationResult;
        exit;
    }

    function isConnected()
    {
        $result = ParseWrapper::IsConnected();
        echo $result;
        exit;
    }

    function currentUser()
    {
        $result = ParseWrapper::CurrentUser();
        echo $result;
        exit;
    }

    function toggle2FA($value)
    {
        $result = ParseWrapper::Toggle2FA($value);
        echo $result;
        exit;
    }

    function dumpSession()
    {
        var_dump($_SESSION);
        exit;
    }

    function getPlanetsAndCities()
    {
        $result = ParseWrapper::GetPlanetsAndCities();
        echo $result;
        exit;
    }

    function captchaError($method)
    {
        echo ParseWrapper::BuildResult("Failed", "Captcha verification failed.", $method);
        exit;
    }

    function createChapter($title)
    {
        $result = ParseWrapper::CreateChapter($title);
        echo $result;
        exit;
    }

?>
