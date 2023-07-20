<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css" media="screen">
    <title><?php echo "$vehicleInfo[invMake] $vehicleInfo[invModel]"; ?> | PHP Motors, Inc.</title>
</head>

<body>
    <header>
        <nav id="page_nav">
            <?php
            $classifications = getClassifications();
            $navList = getNavBar($classifications);
            echo $navList;
            ?>
        </nav>
    </header>
    <main class="detail">
        <h1><?php echo "$vehicleInfo[invMake] $vehicleInfo[invModel]"; ?></h1>
        <?php if (isset($message)) {
            echo $message;
        }
        ?>
        <?php
        if (isset($thumbnailsList)) {
            echo $thumbnailsList;
        }
        ?>

        <?php if (isset($vehicleHTML)) {
            echo $vehicleHTML;
        }
        ?>
        <p class='message'>Scroll down for the reviews</p>
        <h3 id="custtitle">Customer Reviews</h3>

        <?php
        if (!isset($_SESSION['loggedin'])) {
            echo '<p class="reviewError" style="grid-area: form; text-align:left; margin: auto 20px;">Reviews can be added by logging in<br>';
            echo "Have an account? <a href='/phpmotors/accounts/index.php?action=login' title='View the log in page'>Log In</a></p>";
            echo '<style type="text/css">
        #reviewForm {
            display: none;
        }
        </style>';
        }
        ?>
        <form id="reviewForm" action="/phpmotors/reviews/index.php" method="POST">
            <label>Add a review</label>
            <textarea id="review" name="review" rows="4" cols="50" required placeholder="<?php echo substr($_SESSION['clientData']['clientFirstname'], 0, 1) . $_SESSION['clientData']['clientLastname']; ?>"></textarea>
            <input type="submit" name="submit" id="regbtn" value="Add Review">

            <input type="hidden" name="action" value="addReview">
            <input type="hidden" name="clientId" value="<?php if (isset($_SESSION["clientData"])) {
                                                            echo $_SESSION["clientData"]["clientId"];
                                                        } ?>">
            <input type="hidden" name="invId" value="<?php echo $vehicleId ?>">
        </form>
        <?php

        require_once '../model/reviews-model.php';
        $reviews = getVehicleReviews($vehicleId);
        $HTMLreviews = HTMLreviews($reviews);

        if (isset($HTMLreviews)) {
            echo $HTMLreviews;
        }
        ?>
    </main>
    <footer id="footer">
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
    </footer>
    <script src="../js/main.js"></script>
    <script src="../js/inventory.js"></script>
</body>

</html>
<?php unset($_SESSION['message']); ?>