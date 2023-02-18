<?php

//This is the main controller

// Get the database connection file
require_once 'library/connections.php';
// Get the PHP Motors model for use as needed
require_once 'model/main-model.php';
// Get the functions library
require_once 'library/functions.php';

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
 if ($action == NULL){
  $action = filter_input(INPUT_GET, 'action');
}

switch ($action) {
  case 'template':
    include 'view/template.php';
    break;
  default:
    include 'view/home.php';
    break;
 }

?>