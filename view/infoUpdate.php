<?php
if (!isset($_SESSION['clientData'])) {
    header('Location: /phpmotors/index.php');
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css" media="screen">
    <title>Php Motors | Sign Up</title>
</head>
<body>
    <header>
        <nav id="page_nav">
            <?php
                echo $navList;
            ?>
        </nav>
    </header>
    <main>
        <?php require_once $_SERVER['DOCUMENT_ROOT'].'/phpmotors/snippets/updateInfoForm.php'; ?>
    </main>
    <footer id="footer">
        <?php require_once $_SERVER['DOCUMENT_ROOT'].'/phpmotors/snippets/footer.php'; ?>
    </footer>
    <script src="../js/main.js"></script>
</body>
</html>
<?php unset($_SESSION['message'])?>