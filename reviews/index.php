<?php
//Reviews Controller
session_start();

require_once '../library/connections.php';
require_once '../model/main-model.php';
require_once '../model/accounts-model.php';
require_once '../model/reviews-model.php';
require_once '../library/functions.php';

$classifications = getClassifications();
$navList = getNavBar($classifications);

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}

switch ($action) {

    case 'addReview':

        $reviewText = filter_input(INPUT_POST, 'review', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $clientId = filter_input(INPUT_POST, 'clientId', FILTER_VALIDATE_INT);
        $invId = filter_input(INPUT_POST, 'invId', FILTER_VALIDATE_INT);

        if (empty($reviewText) || empty($clientId) || empty($invId)) {
            $message = "<p class='message'>Please make sure to write a review</p>";
            $_SESSION['message'] = $message;
            header('location: .');
            exit;
        }

        $addReview = addReview($reviewText, $clientId, $invId);

        if ($addReview === 1) {
            $_SESSION['message'] = "<p class='message'>Your review was successfully added!</p>";
            header('location: .');
            exit;
        } else {
            $_SESSION['message'] = "<p class='message'>There was an error adding the review.</p>";
            header('location: .');
            exit;
        }
    
    case 'reviewView':
        $reviewId = filter_input(INPUT_GET, 'reviewId', FILTER_VALIDATE_INT);
        
        $review = getReview($reviewId);

        include '../view/updateReview.php';
        exit;
    
    case 'updateReview':
        $reviewId = filter_input(INPUT_POST, 'reviewId', FILTER_VALIDATE_INT);
        $reviewText = filter_input(INPUT_POST, 'reviewText', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if (empty($reviewText) || empty($reviewId)) {
            $_SESSION['message'] = "<p class='message'>Please provide a new review</p>";
            include '../view/updateReview.php';
            exit;
        }

        $update = updateReview($reviewId, $reviewText);

        if ($update === 1) {
            $_SESSION['message'] = "<p class='message'>The review was successfully updated</p>";
            header('location: /phpmotors/accounts/');
            exit;
        } else {
            $_SESSION['message'] = "<p class='message'>There was an error updating the review</p>";
            include '../view/updateReview.php';
            exit;
        }

    case 'deleteView':
        $reviewId = filter_input(INPUT_GET, 'reviewId', FILTER_VALIDATE_INT);

        $review = getReview($reviewId);

        include '../view/deleteReview.php';
        exit;

    case 'deleteReview':
        $reviewId = filter_input(INPUT_POST, 'reviewId', FILTER_VALIDATE_INT);

        $delete = deleteReview($reviewId);

        if ($delete === 1) {
            $_SESSION['message'] = "<p class='message'>The review was successfully deleted.</p>";
        } else {
            $_SESSION['message'] = "<p class='message'>There was an error deleting the post.</p>";
        }

        header('location: .');
        exit;

    default:
        if ($_SESSION['loggedin']) {
            include '../view/admin.php';
            exit;
        }

        header('location: /index.php/');
        exit;
}
?>