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
    <link rel="stylesheet" href="/phpmotors/css/main.css" media="screen">
    <title><?php if (isset($invInfo['invMake']) && isset($invInfo['invModel'])) {
                echo "Modify $invInfo[invMake] $invInfo[invModel]";
            } elseif (isset($invMake) && isset($invModel)) {
                echo "Delete $invMake $invModel";
            } ?> | PHP Motors</title>
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
        <h1><?php if (isset($invInfo['invMake']) && isset($invInfo['invModel'])) {
                echo "Delete $invInfo[invMake] $invInfo[invModel]";
            } elseif (isset($invMake) && isset($invModel)) {
                echo "Delete $invMake $invModel";
            } ?></h1>
        <?php
        if (isset($message)) {
            echo $message;
        }

        require_once '../model/vehicles-model.php';
        ?>
        <form action="/phpmotors/vehicles/index.php" method="POST">
            <fieldset>
                <label for="invMake">Make</label>
                <input type="text" name="invMake" id="invMake" readonly <?php if (isset($invInfo['invMake'])) {
                                                                            echo "value='$invInfo[invMake]'";
                                                                        } ?>>

                <label for="invModel">Model</label>
                <input type="text" name="invModel" id="invModel" readonly <?php if (isset($invInfo['invModel'])) {
                                                                                echo "value='$invInfo[invModel]'";
                                                                            } ?>>

                <label for="invDescription">Description</label>
                <textarea id="invDescription" name="invDescription" rows="10" cols="30" readonly><?php if (isset($invInfo['invDescription'])) {
                                                                                                        echo "$invInfo[invDescription]";
                                                                                                    }
                                                                                                    ?></textarea>

                <input type="submit" name="submit" id="regbtn" value="Delete Vehicle">
                <!-- Add the action name - value pair -->
                <input type="hidden" name="action" value="deleteVehicle">
                <input type="hidden" name="invId" value="<?php if (isset($invInfo['invId'])) {
                                                                echo $invInfo['invId'];
                                                            } ?>">

            </fieldset>
        </form>
    </main>
    <footer id="footer">
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
    </footer>
    <script src="/phpmotors/js/main.js"></script>
</body>

</html>