<?php
if ($_SESSION['clientData']['clientLevel'] == 1 || !isset($_SESSION['clientData'])) {
    header('Location: /phpmotors/index.php');
}
// Build a select list element using the classifications arrayifications
$selectList = '<label for="classifications">Choose a classification:</label>';
$selectList .= '<select id="classifications" name="classificationId">';
foreach ($classifications as $classification) {
    $selectList .= "<option value='$classification[classificationId]'";
    if (isset($classificationId)) {
        if ((int)$classification['classificationId'] === (int)$classificationId) {
            $selectList .= " selected ";
        }
    }
    $selectList .= "' >$classification[classificationName]</option>";
}
$selectList .= '</select>';
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/phpmotors/css/main.css" media="screen">
    <title>Php Motors | Add Vehicle</title>
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
        <!-- require_once $_SERVER['DOCUMENT_ROOT'].'/phpmotors/snippets/addVehicle.php'; -->
        <h1>Add Vehicle</h2>
            <?php
            if (isset($message)) {
                echo $message;
            }

            require_once '../model/vehicles-model.php';
            ?>
            <form action="/phpmotors/vehicles/index.php" method="POST">
                <label for="invMake">Make</label>
                <input type="text" name="invMake" id="invMake" <?php if (isset($invMake)) {
                                                                    echo "value='$invMake'";
                                                                }  ?> required>
                <label for="invModel">Model</label>
                <input type="text" name="invModel" id="invModel" <?php if (isset($invModel)) {
                                                                        echo "value='$invModel'";
                                                                    }  ?> required>
                <label for="invDescription">Description</label>
                <textarea id="invDescription" name="invDescription" rows="10" cols="30" required><?php if (isset($invDescription)) {
                                                                                                        echo "$invDescription";
                                                                                                    }  ?></textarea>
                <label for="invImage">Image Path</label>
                <input type="text" name="invImage" id="invImage" <?php if (isset($invImage)) {
                                                                        echo "value='$invImage'";
                                                                    }  ?> required>
                <label for="invThumbnail">Thumbnail Path</label>
                <input type="text" name="invThumbnail" id="invThumbnail" <?php if (isset($invThumbnail)) {
                                                                                echo "value='$invThumbnail'";
                                                                            }  ?> required>
                <label for="invPrice">Price</label>
                <input type="number" step="0.01" name="invPrice" id="invPrice" <?php if (isset($invPrice)) {
                                                                                    echo "value='$invPrice'";
                                                                                }  ?> required>
                <label for="invStock"># In Stock</label>
                <input type="number" name="invStock" id="invStock" <?php if (isset($invStock)) {
                                                                        echo "value='$invStock'";
                                                                    }  ?> required>
                <label for="invColor">Color</label>
                <input type="text" name="invColor" id="invColor" <?php if (isset($invColor)) {
                                                                        echo "value='$invColor'";
                                                                    }  ?> required>
                <?php echo $selectList; ?>

                <input type="submit" name="submit" id="regbtn" value="Add Vehicle">
                <!-- Add the action name - value pair -->
                <input type="hidden" name="action" value="addVehicle">
            </form>
    </main>
    <footer id="footer">
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
    </footer>
    <script src="/phpmotors/js/main.js"></script>
</body>

</html>