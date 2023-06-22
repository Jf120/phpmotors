<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css" media="screen">
    <title>Php Motors | Vehicle Management</title>
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
        <?php require_once $_SERVER['DOCUMENT_ROOT'].'/phpmotors/snippets/management.php'; ?>
    </main>
    <footer id="footer">
        <?php require_once $_SERVER['DOCUMENT_ROOT'].'/phpmotors/snippets/footer.php'; ?>
    </footer>
    <script src="../js/main.js"></script>
    <script src="../js/inventory.js"></script>
</body>
</html>