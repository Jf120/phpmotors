<?php
//Vehicles Controller

// Get the database connection file
require_once '../library/connections.php';

// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';

// Get the vehicles model
require_once '../model/vehicles-model.php';

// Get the array of classifications
$classifications = getClassifications();

// Build Nav Bar
$navList = getNavBar($classifications);

$action = filter_input(INPUT_GET, 'action');
if ($action == NULL){
    $action = filter_input(INPUT_POST, 'action');
}

switch ($action){
    case 'classification':
        include '../view/addClassification.php';
        break;

    case 'vehicle':
        include '../view/addVehicle.php';
        break;
    
    case 'addVehicle':
        // Filter the input
        $classificationId = filter_input(INPUT_POST, 'classificationId');
        $invMake = filter_input(INPUT_POST, 'invMake');
        $invModel = filter_input(INPUT_POST, 'invModel');
        $invDescription = filter_input(INPUT_POST, 'invDescription');
        $invImage = filter_input(INPUT_POST, 'invImage');
        $invThumbnail = filter_input(INPUT_POST, 'invThumbnail');
        $invPrice = filter_input(INPUT_POST, 'invPrice');
        $invStock = filter_input(INPUT_POST, 'invStock');
        $invColor = filter_input(INPUT_POST, 'invColor');

        // Check for missing data
        if(empty($classificationId) || empty($invMake) || empty($invModel) || empty($invDescription) || empty($invImage) || empty($invThumbnail) || empty($invPrice) || empty($invStock) || empty($invColor)){
            $message = '<p class="message">Please provide information for all empty form fields.</p>';
            include '../view/addVehicle.php';
            exit; 
        }

        // Add Data to database
        $addVehicleReport = addVehicle($invMake, $invModel, $invDescription, $invImage, $invThumbnail, $invPrice, (int)$invStock, $invColor, (int)$classificationId);
        
        // Check and report the result
        if($addVehicleReport === 1){
            $message = '<p class="message">Vehicle registration was a success.</p>';
            include '../view/vehicle-man.php';
            exit;
        } else {
            $message = '<p class="message">Sorry, but the registration failed. Please try again.</p>';
            include '../view/add-vehicle.php';
            exit;
        }

    case 'addClassification':
        // Filter and store the data
        $classificationName = filter_input(INPUT_POST, 'classificationName');
        // Check for missing data
        if(empty($classificationName)){
            $message = '<p class="message">Please provide information for the empty form field.</p>';
            include '../view/addClassification.php';
            exit; 
        }

        $addOutcome = addClassification($classificationName);

        // Check and report the result
        if($addOutcome === 1){
            include '../view/vehicle-man.php';
            exit;

        } else {
            $message = '<p class="message">Sorry, we were unable to add the classification. Please try again.</p>';
            include '../view/addClassification.php';
            exit;
        }

    default:
        include '../view/vehicle-man.php';
        break;
}

?>  