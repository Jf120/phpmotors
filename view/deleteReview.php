<?php
if ($_SESSION['clientData']['clientLevel'] == 1 || !isset($_SESSION['clientData'])) {
    header('Location: /phpmotors/index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css" media="screen">
    <title>Php Motors | Update Review</title>
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
    <main>
        <?php
        if (isset($_SESSION['message'])) {
            $message = $_SESSION['message'];
            echo $message;
        }
        ?>
        <form id="reviewForm" action="/phpmotors/reviews/index.php" method="POST">
            <label>Are you sure you want to delete the review?</label>
            <textarea id="reviewText" name="reviewText" rows="4" cols="50" readonly>
                <?php echo $review['reviewText']; ?>
            </textarea>
            <input type="submit" name="submit" id="regbtn" value="Yes, delete!">

            <input type="hidden" name="action" value="deleteReview">
            <input type="hidden" name="reviewId" value="<?php echo $reviewId
                                                        ?>">
        </form>
    </main>
    <footer id="footer">
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
    </footer>
    <script src="../js/main.js"></script>
    <script src="../js/inventory.js"></script>
</body>

</html>
<?php unset($_SESSION['message']); ?>