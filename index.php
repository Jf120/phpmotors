<?php
//PHPMotors site controller

// Get the database connection file
require_once 'library/connections.php';
// Get the PHP Motors model for use as needed
require_once 'model/main-model.php';

// Get the array of classifications
$classifications = getClassifications();

// Build a navigation bar using the $classifications array
$navList = '<section>';
$navList .= '<div id="logo">';
$src = '"./images/site/logo.png"';
$alternate = '"this.src="../images/site/logo.png"; "';
$alt = '"Php Motors Logo"';
$navList .= "<img src=$src onerror=$alternate alt=$alt>";
$navList .= '</div>';
$navList .= '<div id="account">';
$navList .= "<a href='./accounts/index.php?action=".urlencode('login')."' title='View the accounts page'>My Account</a>";
$navList .= '</div>';
$navList .= '</section>';
$navList .= '<ul>';
$navList .= "<li><a href='/phpmotors/index.php' title='View the PHP Motors home page'>Home</a></li>";
foreach ($classifications as $classification) {
    $navList .= "<li><a href='/phpmotors/index.php?action=".urlencode($classification['classificationName'])."' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
}
$navList .= '</ul>';

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL){
    $action = filter_input(INPUT_GET, 'action');
}

switch ($action){
    case 'template':
        include 'view/template.php';
        break;
    
    default:
        include 'view/home.php';
        break;
}

// var_dump($classifications);
// 	exit;

// echo $navList;
// exit;
?>
