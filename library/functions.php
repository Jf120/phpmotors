<?php

function checkEmail($clientEmail)
{

    $filteredEmail = filter_var($clientEmail, FILTER_VALIDATE_EMAIL);

    return $filteredEmail;
}

// Check the password for a minimum of 8 characters,
// at least one 1 capital letter, at least 1 number and
// at least 1 special character
function checkPassword($clientPassword)
{
    $pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]\s])(?=.*[A-Z])(?=.*[a-z])(?:.{8,})$/';
    return preg_match($pattern, $clientPassword);
}

function getNavBar($classifications)
{
    // Build a navigation bar using the $classifications array
    $navList = '<section class="flex">';
    $navList .= '<div id="logo">';
    $src = '"/phpmotors/images/site/logo.png"';
    $alternate = '"this.src="/phpmotors/images/site/logo.png"; "';
    $alt = '"Php Motors Logo"';
    $navList .= "<img src=$src onerror=$alternate alt=$alt>";
    $navList .= '</div>';

    // Check if the firstname cookie exists, get its value
    if (isset($_SESSION['clientData'])) {
        $navList .= "<span><a href='/phpmotors/accounts/index.php'>Welcome " . $_SESSION['clientData']['clientFirstname'] . "</a></span>";
    }
    $navList .= '<div id="account">';

    if (!isset($_SESSION['clientData'])) {
        $navList .= "<a href='/phpmotors/accounts/index.php?action=" . urlencode('login') . "' title='View the log in page'>My Account</a>";
    } else {
        $navList .= "<a href='/phpmotors/accounts/index.php?action=" . urlencode('logout') . "' title='Log out from account'>Logout</a>";
    }

    $navList .= '</div>';
    $navList .= '</section>';
    $navList .= '<ul>';
    $navList .= "<li><a href='/phpmotors/index.php' title='View the PHP Motors home page'>Home</a></li>";
    foreach ($classifications as $classification) {
        $navList .= "<li><a href='/phpmotors/index.php?action=" . urlencode($classification['classificationName']) . "' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
    }
    $navList .= '</ul>';

    return $navList;
}

// Build the classifications select list 
function buildClassificationList($classifications)
{
    $classificationList = '<select name="classificationId" id="classificationList">';
    $classificationList .= "<option>Choose a Classification</option>";
    foreach ($classifications as $classification) {
        $classificationList .= "<option value='$classification[classificationId]'>$classification[classificationName]</option>";
    }
    $classificationList .= '</select>';
    return $classificationList;
}
?>