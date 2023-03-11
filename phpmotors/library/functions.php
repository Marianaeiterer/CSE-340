<?php

/* Custom functions library  */


//Validates email addresses
function checkEmail($clientEmail)
{
    $valEmail = filter_var($clientEmail, FILTER_VALIDATE_EMAIL);
    return $valEmail;
}

// Check the password for a minimum of 8 characters, at least one 1 capital letter, at least 1 number and 
//at least 1 special character
function checkPassword($clientPassword)
{
    $pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]\s])(?=.*[A-Z])(?=.*[a-z])(?:.{8,})$/';
    return preg_match($pattern, $clientPassword);
}

// Build a navigation bar using the $classifications array
function buildNavigation($classifications)
{
    $navList = '<ul>';
    $navList .= "<li><a href='/phpmotors/' title='View the PHP Motors home page'>Home</a></li>";
    foreach ($classifications as $classification) {
        $navList .= "<li><a href='/phpmotors/vehicles/?action=classification&classificationName=" . urlencode($classification['classificationName']) . "' title='View our $classification[classificationName] lineup of vehicles'>$classification[classificationName]</a></li>";
    }
    $navList .= '</ul>';

    return $navList;
}

// Build the classifications select list 
function buildClassificationList($classifications){ 
    $classificationList = '<select name="classificationId" id="classificationList">'; 
    $classificationList .= "<option>Choose a Classification</option>"; 
    foreach ($classifications as $classification) { 
     $classificationList .= "<option value='$classification[classificationId]'>$classification[classificationName]</option>"; 
    } 
    $classificationList .= '</select>'; 
    return $classificationList; 
}

//build a display of vehicles within an unordered list
function buildVehiclesDisplay($vehicles){
    $dv = '<ul id="inv-display">';
    foreach ($vehicles as $vehicle) {
     $dv .= '<li>';
     $dv .= "<a href='/phpmotors/vehicles/?action=vehicleInfo&vehicleId=$vehicle[invId]'><img src='$vehicle[invThumbnail]' alt='Image of $vehicle[invMake] $vehicle[invModel] on phpmotors.com'></a>";
     $dv .= '<hr>';
     $dv .= "<h2><a href='/phpmotors/vehicles/?action=vehicleInfo&vehicleId=$vehicle[invId]'>$vehicle[invMake] $vehicle[invModel]</a></h2>";
     $dv .= "<span>$" . number_format($vehicle['invPrice']);"</span>";
     $dv .= '</li>';
    }
    $dv .= '</ul>';
    return $dv;
}

function buildVehicleInformationDisplay($vehicleDetails){

    $dv = '<section id="info-display">';
    foreach ($vehicleDetails as $vehicleDetail) {
     $dv .= "<h1>$vehicleDetail[invMake] $vehicleDetail[invModel]</h1>";
     $dv .= "<div class='cont'>";
     $dv .= "<div>";
     $dv .= "<img src='$vehicleDetail[invImage]' alt='Image of $vehicleDetail[invMake] $vehicleDetail[invModel] on phpmotors.com'>";
     $dv .= "<h2>Price: $" . number_format($vehicleDetail['invPrice']);
     $dv .= "</h2>";
     $dv .= "</div>";
     $dv .= "<div>";
     $dv .= "<h2>$vehicleDetail[invMake] $vehicleDetail[invModel] Details</h2>";
     $dv .= "<p>$vehicleDetail[invDescription]</p>";
     $dv .= "<p>Color: $vehicleDetail[invColor]</p>";
     $dv .= "<p># in Stock: $vehicleDetail[invStock]</p>";
     $dv .= "</div>";
     $dv .= "</div>";
    }
    $dv .= '</section>';
    return $dv;
}

?>