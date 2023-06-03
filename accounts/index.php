<?php
//Accounts Controller

// Get the database connection file
require_once '../library/connections.php';

// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';

// Get the accounts model
require_once '../model/accounts-model.php';

// Get the array of classifications
$classifications = getClassifications();

$navList = getNavBar($classifications);

$action = filter_input(INPUT_GET, 'action');
if ($action == NULL){
    $action = filter_input(INPUT_POST, 'action');
}

switch ($action){
    case 'login':
        include '../view/login.php';
        break;

    case 'registration':
        include '../view/registration.php';
        break;

    case 'register':
        // Filter and store the data
        $clientFirstname = filter_input(INPUT_POST, 'clientFirstname');
        $clientLastname = filter_input(INPUT_POST, 'clientLastname');
        $clientEmail = filter_input(INPUT_POST, 'clientEmail');
        $clientPassword = filter_input(INPUT_POST, 'clientPassword');

        // Check for missing data
        if(empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($clientPassword)){
            $message = '<p class="message">Please provide information for all empty form fields.</p>';
            include '../view/registration.php';
            exit; 
        }

        $regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, $clientPassword);

        // Check and report the result
        if($regOutcome === 1){
            $message = '<p class="message">Thanks for registering '.$clientFirstname.'. Please use your email and password to login.</p>';
            include '..//view/login.php';
            exit;
        } else {
            $message = '<p class="message">Sorry '.$clientFirstname.', but the registration failed. Please try again.</p>';
            include '../view/registration.php';
            exit;
        }

    default:
        include '../view/login.php';
        break;
}

// var_dump($classifications);
// 	exit;

// echo $navList;
// exit;
