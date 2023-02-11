<?php

//This is the vehicles Controller

// Get the database connection file
require_once '../library/connections.php';

// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';

// Get the accounts model
require_once '../model/vehicles-model.php';

// Get the array of classifications
$classifications = getClassifications();

// Build a navigation bar using the $classifications array
$navList = '<ul>';
$navList .= "<li><a href='/phpmotors/index.php' title='View the PHP Motors home page'>Home</a></li>";
foreach ($classifications as $classification) {
 $navList .= "<li><a href='/phpmotors/index.php?action=".urlencode($classification['classificationName'])."' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
}
$navList .= '</ul>';

$classificationList = '<select id="cars" name="cars"> <option value="0">Choose Car Classification</option>';

foreach ($classifications as $classification) {
    $classificationList .= '<option value="'.urlencode($classification['classificationId']).'">'.urlencode($classification['classificationName']).'</option>';

}

$classificationList .=  '</select>';

//echo $classificationList;
//exit;

$action = filter_input(INPUT_POST, 'action');
 if ($action == NULL){
  $action = filter_input(INPUT_GET, 'action');
}

switch ($action){
    case 'add-classification':
        include '../view/add-classification.php';
        break;
    case 'add-vehicle':
        include '../view/add-vehicle.php';
        break;
    case 'addClass':
        $classificationName = filter_input(INPUT_POST, 'classificationName');
        // Check for missing data
        if(empty($classificationName)){
        $message = '<p>Please provide information for all empty form fields.</p>';
        include '../view/add-classification.php';
        exit; 
        }

        // Send the data to the model
        $addOutcome = newClassification($classificationName);
      
        // Check and report the result
        if($addOutcome === 1){
            header("Location: http://localhost/phpmotors/vehicles/");
            exit;
        } else {
            $message = "<p>Sorry, but the $classificationName classification failed to be added. Please try again.</p>";
            include '../view/add-classification.php';
            exit;
        }
      
        break;
    
    case 'addVehicle':
        $invMake = filter_input(INPUT_POST, 'invMake');
        $invModel = filter_input(INPUT_POST, 'invModel');
        $invDescription = filter_input(INPUT_POST, 'invDescription');
        $invImage = filter_input(INPUT_POST, 'invImage');
        $invThumbnail = filter_input(INPUT_POST, 'invThumbnail');
        $invPrice = filter_input(INPUT_POST, 'invPrice');
        $invStock = filter_input(INPUT_POST, 'invStock');
        $invColor = filter_input(INPUT_POST, 'invColor');
        $classificationId = $_POST['cars'];
        
        // Check for missing data
        if(empty($invMake) || empty($invModel) || empty($invDescription) || empty($invPrice) || empty($invStock) || empty($invColor) || $classificationId == 0){
            $message = '<p>Please provide information for all empty form fields.</p>';
            include '../view/add-vehicle.php';
            exit; 
         }

        // Send the data to the model
        $addVehicleOutcome = newVehicle($invMake, $invModel, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invColor, $classificationId);
      
        // Check and report the result
        if($addVehicleOutcome === 1){
            $message = "<p>The $invMake $invModel was added successfully!</p>";
            include '../view/add-vehicle.php';
            exit;
        } else {
            $message = "<p>Sorry, but the $invMake $invModel failed to be added. Please try again.</p>";
            include '../view/add-vehicle.php';
            exit;
        }
      
        break;

    default:
        include '../view/vehicle-man.php';
}
?>
