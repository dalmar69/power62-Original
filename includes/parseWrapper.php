<?
    // Parse PHP client
    try
    {
        require_once(__DIR__ . '/../vendor/autoload.php');

        //echo "Included: " . __DIR__ . '/../vendor/autoload.php';
    }
    catch(Exception $e)
    {
        return "Failed to include ParseWrapper.<br/>Error: " . $e;
    }

    // Session
    // MUST BE AFTER AUTOLOADER
    if(!isset($_SESSION))
    {
        session_start();
    }


    // Use declarations
    use Parse\ParseObject;
    use Parse\ParseQuery;
    use Parse\ParseACL;
    use Parse\ParsePush;
    use Parse\ParseUser;
    use Parse\ParseInstallation;
    use Parse\ParseException;
    use Parse\ParseAnalytics;
    use Parse\ParseFile;
    use Parse\ParseCloud;
    use Parse\ParseClient;
    use Parse\ParsePushStatus;
    use Parse\ParseServerInfo;
    use Parse\ParseLogs;
    use Parse\ParseAudience;
    use Parse\ParseSessionStorage;


    // Interact with ParseServer
    class ParseWrapper
    {
          // Config variables
          private static $appID      = 'solis-omega';
          private static $masterKey  = 'myMasterKey';
          private static $serverURL  = 'https://solis-omega.herokuapp.com';
          private static $mount      = 'parse';
          private static $restKey    =  'some_key_generated';



          ///////////////////////////////
          // MARK: Connection related  //
          ///////////////////////////////

          // Verify we are connected to backend
          // Returns 1 if success
          public static function IsConnected()
          {
              try
              {
                  ParseClient::initialize(self::$appID, self::$restKey, self::$masterKey);
                  ParseClient::setServerURL(self::$serverURL, self::$mount);

                  // Check if we are connected
                  $health = ParseClient::getServerHealth();
                  if($health['status'] === 200)
                  {
                      return 1;
                  }
                  else
                  {
                      return $health['status'];
                  }
              }
              catch(ParseException $ex)
              {
                  return $ex->getMessage();
              }
          }


          public static function Connect()
          {
              return self::IsConnected();
          }


          public static function Setup()
          {
              ParseClient::initialize(self::$appID, self::$restKey, self::$masterKey);
              ParseClient::setServerURL(self::$serverURL, self::$mount);

              // Session related
              ParseClient::setStorage(new ParseSessionStorage());
          }


          ///////////////////////////////
          // MARK: Sign in/up related  //
          ///////////////////////////////

          public static function Signup($name, $email, $username, $password, $planet, $city, $starport)
          {
              // Verify connection
              $connectionResult = self::Connect();
              if($connectionResult === 1)
              {
                  // Check params
                  if($name === '')
                  {
                      return self::BuildResult("Failed", "Empty name", "signup");
                  }

                  if($username === '')
                  {
                      return self::BuildResult("Failed", "Empty username", "signup");
                  }

                  if($password === '')
                  {
                      return self::BuildResult("Failed", "Empty password", "signup");
                  }

                  if(!filter_var($email, FILTER_VALIDATE_EMAIL))
                  {
                      return self::BuildResult("Failed", "Invalid email " . $email, "signup");
                  }

                  if($planet === '')
                  {
                      return self::BuildResult("Failed", "Empty planet", "signup");
                  }

                  if($city === '')
                  {
                      return self::BuildResult("Failed", "Empty city", "signup");
                  }

                  if($starport === '')
                  {
                      return self::BuildResult("Failed", "Empty starport", "signup");
                  }

                  // Create user
                  $user = new ParseUser();

                  // Set fields
                  $user->set("name", $name);
                  $user->setEmail($email);
                  $user->setUsername($username);
                  $user->setPassword($password);
                  $user->set("planet",    self::MakePlanet($planet));
                  $user->set("city",      self::MakeCity($city));
                  $user->set("starport", $starport);

                  // Sign up
                  try
                  {
                      $user->signUp();
                      return self::BuildResult("Success", "A verification email has been sent", "signup");
                  }

                  // Error
                  catch(ParseException $ex)
                  {
                      return self::BuildResult("Failed", $ex->getMessage(), "signup");
                  }
              }

              // Connection failed
              else
              {
                  return self::BuildResult("Failed", "Connection could not be established. Error code: '$connectionResult'", "signup");
              }
          }

      // Create pointer to planet
      public static function MakePlanet($planet)
      {
          // Get object ID for planet
          $query = new ParseQuery("Planet");
          $query->equalTo('name', $planet);
          $result = $query->first();

          return ParseObject::create('Planet', $result->getObjectId(), true);
      }

      // Create pointer to city
      public static function MakeCity($city)
      {
          // Get object ID for planet
          $query = new ParseQuery("City");
          $query->equalTo('name', $city);
          $result = $query->first();

          return ParseObject::create('City', $result->getObjectId(), true);
      }


        public static function Signin($username, $password)
        {
            // Verify connection
            if(self::Connect() === 1)
            {
                // Check params
                if($username === '')
                {
                    return self::BuildResult("Failed", "Empty username", "signup");
                }

                if($password === '')
                {
                    return self::BuildResult("Failed", "Empty password", "signup");
                }

                // Sign in
                try
                {
                    $user = ParseUser::logIn($username, $password);

                    // Save in session
                    $_SESSION['user']       = $user->getUsername();
                    $_SESSION['objectId']   = $user->getObjectId();

                    // Check if email verified
                    if(self::IsEmailVerified())
                    {
                        // Save OTP secret URL for settings page
                        $_SESSION['otpURL'] = $user->get('otpURL');

                        // User has 2FA enabled
                        if($user->get('otpEnabled'))
                        {
                            $_SESSION['otpEnabled'] = true;
                            return self::BuildResult("2FA", "Please verify via 2FA.", "signin");
                        }

                        else
                        {
                            $_SESSION['otpEnabled'] = false;
                            $_SESSION['loggedIn']   = 'true';
                            return self::BuildResult("Success", "Hello " . $username . ", welcome to Power62.  You will now be redirected to your settings page.", "signin");
                        }
                    }
                    else
                    {
                        self::SendVerificationEmail($user->get('email'));
                        return self::BuildResult("Failed", "Email not verified, check your email for further steps.", "signin");
                    }
                }

                // Error
                catch(ParseException $ex)
                {
                    return self::BuildResult("Failed", $ex->getMessage(), "signin");
                }
            }

            // Connection failed
            else
            {
                return self::BuildResult("Failed", "Connection could not be established.", "signin");
            }
        }

        // Send email verification
        public static function SendEmailVerification($email)
        {
            if(self::Connect() === 1)
            {
                ParseUser::requestVerificationEmail($email);
                return self::BuildResult("Success", "Instructions have been emailed to you", "sendVerificationEmail");
            }

            else
            {
                return self::BuildResult("Failed", "Connection could not be established.", "sendVerificationEmail");
            }
        }

        public static function IsEmailVerified()
        {
            return ParseUser::getCurrentUser()->get('emailVerified') === true;
        }

        // Send password reset
        public static function ForgotPassword($email)
        {
            if(self::Connect() === 1)
            {
                try
                {
                    ParseUser::requestPasswordReset($email);
                    return self::BuildResult("Success", "Instructions have been emailed to you", "forgotPassword");
                }
                catch(ParseException $e)
                {
                    return self::BuildResult("Failed", $ex->getMessage(), "forgotPassword");
                }
            }

            else
            {
                return self::BuildResult("Failed", "Connection could not be established.", "forgotPassword");
            }
        }

        // Get current user
        public static function CurrentUser()
        {
            if(self::Connect() === 1)
            {
                try
                {
                    $user = ParseUser::getCurrentUser();
                    if($user)
                    {
                        return $user->getUsername();
                    }
                    else
                    {
                        return NULL;
                    }
                }
                catch(ParseException $e)
                {
                    NULL;
                }
            }

            else
            {
                return NULL;
            }
        }


        ///////////////////////////////
        //      MARK: OTP Related    //
        ///////////////////////////////

        // Validate OTP token
        public static function VerifyToken($token)
        {
            if(self::Connect() === 1)
            {
                try
                {
                    $results    = ParseCloud::run("verifyToken", [  "token" => $token,
                                                                    "user"  => $_SESSION['objectId']
                                                                 ]);

                    // If not verified yet, set
                    if((isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']!== true) || !isset($_SESSION['loggedIn']))
                    {
                        $_SESSION['loggedIn'] = true;
                    }

                    // Return result to caller
                    return self::BuildResult("Success", "Data returned", "verifyToken", $results);
                }

                // Backend returns invalid token as error, so catch it here
                // Return error or failed response from server as message field
                catch(ParseException $ex)
                {
                    return self::BuildResult("Failed", $ex->getMessage(), "verifyToken");
                }
            }

            else
            {
                return self::BuildResult("Failed", "Connection could not be established.", "verifyToken");
            }
        }

        // Change OTP for user
        public static function Toggle2FA($value)
        {
            if(self::Connect() === 1)
            {
                try
                {
                    // Send to backend
                    $results    = ParseCloud::run("toggle2FA", [    "enabled"   => $value,
                                                                    "user"      => $_SESSION['objectId']
                                                                 ]);

                    // Adjust session
                    $_SESSION['otpEnabled'] = $value;

                    // Send response back to caller
                    return self::BuildResult("Success", "2FA set to " . $value, "toggle2FA");
                }
                catch(ParseException $ex)
                {
                    return self::BuildResult("Failed", $ex->getMessage(), "toggle2FA");
                }
            }

            else
            {
                return self::BuildResult("Failed", "Connection could not be established.", "toggle2FA");
            }
        }

        // Display OTP verification QR
        public static function GetQRCodeForOTP()
        {
            $query = new ParseQuery("_User");
            $query->equalTo('objectId', $_SESSION['objectId']);
            $result = $query->first();
            $url = $result->get('otpURL');
            return self::BuildResult("Success", $url, "getQRCodeForOTP");
        }

        ///////////////////////////////
        //     MARK: Data related    //
        ///////////////////////////////

        public static function GetPlanetsAndCities()
        {
            if(self::Connect() === 1)
            {
                try
                {
                    $results    = ParseCloud::run("getPlanetsAndCities", []);
                    return self::BuildResult("Success", "Data returned", "getPlanetsAndCities", $results);
                }
                catch(ParseException $ex)
                {
                    return self::BuildResult("Failed", $ex->getMessage(), "getPlanetsAndCities");
                }
            }

            else
            {
                return self::BuildResult("Failed", "Connection could not be established.", "getPlanetsAndCities");
            }
        }



        ///////////////////////////////
        //    MARK: Admin related    //
        ///////////////////////////////

        // Create new chapter
        public static function CreateChapter($title)
        {
            if(self::Connect() === 1)
            {
                $chapter = new ParseObject("Chapter");
                $chapter->set("title", $title);
                $chapter->set("archived", 0);

                try
                {
                    $chapter->save();
                    return self::BuildResult("Success", "Chapter \"" . $title . "\" created, add pages now.", "createChapter");
                }
                catch(ParseException $ex)
                {
                    return self::BuildResult("Failed", $ex->getMessage(), "createChapter");
                }
            }
            else
            {
                return self::BuildResult("Failed", "Connection could not be established.", "createChapter");
            }
        }

        // Return list of all chapter titles
        public static function GetChapterTitles()
        {
            if(self::Connect() === 1)
            {
                try
                {
                    $results    = ParseCloud::run("getChapterTitles", []);
                    return self::BuildResult("Success", "Data returned", "getChapterTitles", $results);
                }
                catch(ParseException $ex)
                {
                    return self::BuildResult("Failed", $ex->getMessage(), "getChapterTitles");
                }
            }

            else
            {
                return self::BuildResult("Failed", "Connection could not be established.", "getChapterTitles");
            }
        }

        // Upload a new page
        public static function CreatePage($file, $name, $chapter, $pageNumber, $description)
        {
            if(self::Connect() === 1)
            {
                try
                {
                    // Clean up data
                    $cleanName          = preg_replace('/\s+/', '', $name);  // No spaces allowed in file name
                    $cleanPageNumber    = (int)str_replace(' ', '', $pageNumber);  // Convert string to int

                    // Save file
                    $picture = ParseFile::createFromData(file_get_contents($file), $cleanName);
                    $picture->save();

                    // Create page
                    $page = ParseObject::create("Page");
                    $page->set("picture",       $picture);
                    $page->set("chapter",       self::MakeChapter($chapter));
                    $page->set("pageNumber",    $cleanPageNumber);
                    $page->set("description",   $description);
                    $page->save();

                    return self::BuildResult("Success", "Page " . $cleanPageNumber . " saved!", "createPage");
                }
                catch(ParseException $ex)
                {
                    return self::BuildResult("Failed", $ex->getMessage(), "createPage");
                }
            }

            else
            {
                return self::BuildResult("Failed", "Connection could not be established.", "getChapterTitles");
            }
        }

        // Create pointer to chapter
        public static function MakeChapter($chapter)
        {
            // Get object ID for chapter
            $query = new ParseQuery("Chapter");
            $query->equalTo('title', $chapter);
            $result = $query->first();

            return ParseObject::create('Chapter', $result->getObjectId(), true);
        }

        // Check if page exists
        public static function DoesPageExist($chapterTitle, $pageNumber)
        {
            if(self::Connect() === 1)
            {
                try
                {
                    $results    = ParseCloud::run("doesPageExist", [ "pageNumber"   => $pageNumber,
                                                                     "chapterTitle" => $chapterTitle
                                                                    ]);
                    return $results;
                }
                catch(ParseException $ex)
                {
                    return $ex->getMessage();
                }
            }

            else
            {
                return "Connection could not be established.";
            }
        }



        ///////////////////////////////
        //   MARK: Gallery related   //
        ///////////////////////////////

        public static function GetChaptersAndPages()
        {
            if(self::Connect() === 1)
            {
                try
                {
                    $results    = ParseCloud::run("getChaptersAndPages", []);
                    return self::BuildResult("Success", "Data returned", "getChaptersAndPages", $results);
                }
                catch(ParseException $ex)
                {
                    return self::BuildResult("Failed", $ex->getMessage(), "getChaptersAndPages");
                }
            }

            else
            {
                return self::BuildResult("Failed", "Connection could not be established.", "getChaptersAndPages");
            }
        }



        ///////////////////////////////
        //      MARK: Helpers        //
        ///////////////////////////////
        // Build return result
        public static function BuildResult($isSuccess, $message, $method, $data = null)
        {
            $result = array(
                "return_code"   => $isSuccess,
                "message"       => $message,
                "method"        => $method,
                "data"          => $data
            );
            return json_encode($result);
        }

    } // End class
?>
