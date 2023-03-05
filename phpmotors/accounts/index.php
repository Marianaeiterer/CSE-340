<?php

//This is the accounts Controller

// Create or access a Session
session_start();

// Get the database connection file
require_once '../library/connections.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';
// Get the accounts model
require_once '../model/accounts-model.php';
// Get the functions library
require_once '../library/functions.php';

// Get the array of classifications
$classifications = getClassifications();

//var_dump is a PHP function that displays information about a variable, array or object
//var_dump($classifications); 
//The exit directive stops all further processing by PHP.
//exit; 

// Build a navigation bar using the $classifications array
$navList = buildNavigation($classifications);

//echo $navList;
//exit;

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
   $action = filter_input(INPUT_GET, 'action');
}

switch ($action) {
   case 'login':
      include '../view/login.php';
      break;
   case 'registration':
      include '../view/registration.php';
      break;
   case 'register':
      // Filter and store the data
      $clientFirstname = trim(filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
      $clientLastname = trim(filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
      $clientEmail = trim(filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL));
      $clientPassword = trim(filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
      $clientEmail = checkEmail($clientEmail);
      $checkPassword = checkPassword($clientPassword);

      $existingEmail = checkExistingEmail($clientEmail); //number 1 is TRUE and 0 FALSE

      // Check for existing email address in the table
      if ($existingEmail) {
         $message = '<p class="notice">That email address already exists. Do you want to login instead?</p>';
         include '../view/login.php';
         exit;
      }

      // Check for missing data
      if (empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($checkPassword)) {
         $message = '<p>Please provide information for all empty form fields.</p>';
         include '../view/registration.php';
         exit;
      }

      // Hash the checked password
      $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);

      // Send the data to the model
      $regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, $hashedPassword);

      // Check and report the result
      if ($regOutcome === 1) {
         //The fourth parameter is the path and being "/" means the cookie will be visible to the entire web site.
         setcookie('firstname', $clientFirstname, strtotime('+1 year'), '/');
         $_SESSION['message'] = "Thanks for registering $clientFirstname. Please use your email and password to login.";
         header('Location: /phpmotors/accounts/?action=login');
         exit;
      } else {
         $message = "<p>Sorry $clientFirstname, but the registration failed. Please try again.</p>";
         include '../view/registration.php';
         exit;
      }

      break;

   case 'Login':
      $clientEmail = trim(filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL));
      $clientPassword = trim(filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
      $clientEmail = checkEmail($clientEmail);
      $checkPassword = checkPassword($clientPassword);

      // Check for missing data
      if (empty($clientEmail) || empty($checkPassword)) {
         $message = '<p class="notice">Please provide a valid email address and password.</p>';
         include '../view/login.php';
         exit;
      }

      // A valid password exists, proceed with the login process
      // Query the client data based on the email address
      $clientData = getClient($clientEmail);
      // Compare the password just submitted against
      // the hashed password for the matching client
      $hashCheck = password_verify($clientPassword, $clientData['clientPassword']);
      // If the hashes don't match create an error
      // and return to the login view
      if (!$hashCheck) {
         $message = '<p class="notice">Please check your password and try again.</p>';
         include '../view/login.php';
         exit;
      }
      // A valid user exists, log them in
      $_SESSION['loggedin'] = TRUE;
      // Remove the password from the array
      // the array_pop function removes the last
      // element from an array
      array_pop($clientData);
      // Store the array into the session
      $_SESSION['clientData'] = $clientData;
      // Send them to the admin view
      include '../view/admin.php';
      exit;
      break;
   case 'Logout':

      unset($_SESSION['loggedin']);
      unset($_SESSION['clientData']);
      session_destroy();
      header("Location: http://localhost/phpmotors/index.php");
      break;

   case 'updateAccount':
        $clientId = filter_input(INPUT_GET, 'clientId', FILTER_VALIDATE_INT); // It is GET because it comes from a link 
      include '../view/client-update.php';
      exit;

      break;
   case 'updateInfo':
      // Filter and store the data
      $clientFirstname = trim(filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
      $clientLastname = trim(filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
      $clientEmail = trim(filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL));
      $clientEmail = checkEmail($clientEmail);
      $clientId = filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_NUMBER_INT);

      // Check for missing data
      if (empty($clientFirstname) || empty($clientLastname) || empty($clientEmail)) {
         $message = '<p>Please provide information for all empty form fields.</p>';
         include '../view/client-update.php';
         exit;
      }

      if ($clientEmail != $_SESSION['clientData']['clientEmail']) {
         $existingEmail = checkExistingEmail($clientEmail); //number 1 is TRUE and 0 FALSE
         // Check for existing email address in the table
         if ($existingEmail) {
            $message = '<p class="notice">This email address already exists</p>';
            include '../view/client-update.php';
            exit;
         }
      }


      // Send the data to the model
      $updateResult = updateInfo($clientFirstname, $clientLastname, $clientEmail, $clientId);

      // Check and report the result
      if ($updateResult) {
         //The fourth parameter is the path and being "/" means the cookie will be visible to the entire web site.
         $clientData = getClientId($clientId);
         array_pop($clientData);
         $_SESSION['clientData'] = $clientData;
         $message = "<p class='notice'>Congratulations, your information was successfully updated.</p>";
         $_SESSION['message'] = $message;
         header('location: /phpmotors/accounts/');
         exit;
      } else {
         $message = "<p class='notice'>Error! Information was not updated.</p>";
         include '../view/client-update.php';
         exit;
      }
      break;

   case 'updatePassword':
      $clientPassword = trim(filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
      $clientId = filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_NUMBER_INT);
      $checkPassword = checkPassword($clientPassword, $clientId);


      // Check for missing data
      if (empty($checkPassword)) {
         $message = '<p>Please provide the right information for all empty form fields.</p>';
         include '../view/client-update.php';
         exit;
      }

      $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);

      // Send the data to the model
      $updateResult = updatePassword($hashedPassword, $clientId);

      // Check and report the result
      if ($updateResult) {
         //The fourth parameter is the path and being "/" means the cookie will be visible to the entire web site.
         $clientData = getClientId($clientId);
         array_pop($clientData);
         $_SESSION['clientData'] = $clientData;
         $message = "<p class='notice'>Congratulations, your password was successfully updated.</p>";
         $_SESSION['message'] = $message;
         header('location: /phpmotors/accounts/');
         exit;
      } else {
         $message = "<p class='notice'>Error! Password was not updated.</p>";
         include '../view/client-update.php';
         exit;
      }

      break;
   default:
      include '../view/admin.php';
}
