<?php
//Accounts Controller

// Create or access a Session
session_start();

// Get the database connection file
require_once '../library/connections.php';

// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';

// Get the accounts model
require_once '../model/accounts-model.php';

// Get library of functions
require_once '../library/functions.php';

// Get the array of classifications
$classifications = getClassifications();

$navList = getNavBar($classifications);

$action = filter_input(INPUT_GET, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_POST, 'action');
}

switch ($action) {
    case 'login':
        include '../view/login.php';
        break;

    case 'registration':
        include '../view/registration.php';
        break;

    case 'Login':
        $clientEmail = trim(filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL));
        $clientPassword = trim(filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_FULL_SPECIAL_CHARS));

        $clientEmail = checkEmail($clientEmail);
        $passwordCheck = checkPassword($clientPassword);

        // Run basic checks, return if errors
        if (empty($clientEmail) || empty($passwordCheck)) {
            $_SESSION['message'] = '<p class="message">Please provide a valid email address and password</p>';
            include '../view/login.php';
            exit;
        }

        // A valid password exists, proceed with the login process
        // Query the client data based on the email address
        $clientData = getClient($clientEmail);

        if (empty($clientData)) {
            $_SESSION['message'] = '<p class="message">There is no account associated to that email.</p>';
            include '../view/login.php';
            exit;
        }
        // Compare the password just submitted against
        // the hashed password for the matching client
        // Hash the checked password

        $hashCheck = password_verify($clientPassword, $clientData['clientPassword']);
        // If the hashes don't match create an error
        // and return to the login view
        if (!$hashCheck) {
            $_SESSION['message'] = '<p class="message">Please check your password and try again.</p>';
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
        unset($_SESSION['message']);
        // Send them to the admin view
        header('Location: /phpmotors/accounts/index.php');
        exit;

    case 'register':
        // Filter and store the data
        $clientFirstname = trim(filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $clientLastname = trim(filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $clientEmail = trim(filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL));
        $clientPassword = trim(filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_FULL_SPECIAL_CHARS));

        $clientEmail = checkEmail($clientEmail);
        $checkPassword = checkPassword($clientPassword);

        // Checking for existing email address
        $checkedEmail = existingEmail($clientEmail);

        // Check for existing email address in the table
        if ($checkedEmail === 1) {
            $_SESSION['message'] = 'That email address already exists. Do you want to login instead?';
            include '../view/login.php';
            exit;
        }

        // Check for missing data
        if (empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($checkPassword)) {
            $message = '<p class="message">Please provide information for all empty form fields.</p>';
            include '../view/registration.php';
            exit;
        }

        // Hash the checked password
        $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);

        $regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, $hashedPassword);

        // Check and report the result
        if ($regOutcome === 1) {
            $_SESSION['message'] = "Thanks for registering $clientFirstname. Please use your email and password to login.";
            header('Location: /phpmotors/accounts/?action=login');
            exit;
        } else {
            $message = '<p class="message"> Sorry ' . $clientFirstname . ', but the registration failed. Please try again.</p>';
            include '../view/registration.php';
            exit;
        }

    case 'updateAccount':
        include '../view/clientUpdate.php';
        exit;

    case 'updateInformation':
        include '../view/infoUpdate.php';
        exit;

    case 'updatePassword':
        include '../view/passwordUpdate.php';
        exit;

    case 'changeInfo':
        // Filter and store the data
        $clientFirstname = trim(filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $clientLastname = trim(filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $clientEmail = trim(filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL));
        $clientId = filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_NUMBER_INT);

        $clientEmail = checkEmail($clientEmail);

        if ($clientEmail === $_SESSION['clientData']['clientEmail']) {

            $_SESSION['message'] = "<p class='message'>Please use a different email address</p>";
            include '../view/infoUpdate.php';
            exit;
        }

        // Checking for existing email address
        $checkedEmail = existingEmail($clientEmail);

        // Check for existing email address in the table
        if ($checkedEmail === 1) {
            $_SESSION['message'] = "<p class='message'>That email address already exists. Please use a different email address.</p>";
            include '../view/infoUpdate.php';
            exit;
        }

        $regOutcome = updateInfo($clientFirstname, $clientLastname, $clientEmail, $clientId);
        $clientData = getClient($clientEmail);
        $_SESSION['clientData'] = $clientData;

        // Check and report the result
        if ($regOutcome === 1) {
            $_SESSION['message'] = "<p class='message'>Your information was successfully updated.</p>";
            header('Location: /phpmotors/accounts/?action=updateAccount');
            exit;
        } else {
            $message = '<p class="message"> Sorry ' . $clientFirstname . ', we were not able to update your information. Please try again.</p>';
            include '../view/infoUpdate.php';
            exit;
        }

    case 'changePassword':
        // Filter and store the data
        $clientPassword = trim(filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $clientId = filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_NUMBER_INT);

        $checkPassword = checkPassword($clientPassword);
        // Check for missing data
        if (empty($checkPassword)) {
            $_SESSION['message'] = '<p class="message">Please provide a valid password.</p>';
            include '../view/passwordUpdate.php';
            exit;
        }

        // Hash the checked password
        $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);

        $regOutcome = updatePassword($hashedPassword, $clientId);

        // Check and report the result
        if ($regOutcome === 1) {
            $_SESSION['message'] = "<p class='message'>Your password was successfully updated.</p>";
            header('Location: /phpmotors/accounts/?action=updateAccount');
            exit;
        } else {
            $message = '<p class="message"> Sorry ' . $clientFirstname . ', we were not able to update your password. Please try again.</p>';
            include '../view/infoUpdate.php';
            exit;
        }

    case 'logout':
        session_destroy();
        header('Location: /phpmotors/accounts/index.php?action=login');
        exit;

    default:
        include '../view/admin.php';
        break;
}
