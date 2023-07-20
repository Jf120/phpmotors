<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/phpmotors/css/main.css" media="screen">
    <title><?php echo $classificationName; ?> vehicles | PHP Motors, Inc.</title>
    </title>
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
        <h1><?php echo $classificationName; ?> vehicles</h1>
        <?php if (isset($message)) {
            echo $message;
        }
        ?>
        <?php if (isset($vehicleDisplay)) {
            echo $vehicleDisplay;
        } ?>
    </main>
    <footer id="footer">
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
    </footer>
    <script src="/phpmotors/js/main.js"></script>
</body>

</html>