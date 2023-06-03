<h1>Add Vehicle</h2>
    <?php
    if (isset($message)) {
        echo $message;
    }

    require_once '../model/vehicles-model.php';
    $selectList = getSelectList($classifications);
    ?>
    <form action="/phpmotors/vehicles/index.php" method="POST">
        <label for="invMake">Make</label>
        <input type="text" name="invMake" id="invMake">
        <label for="invModel">Model</label>
        <input type="text" name="invModel" id="invModel">
        <label for="invDescription">Description</label>
        <textarea id="invDescription" name="invDescription" rows="10" cols="30"></textarea>
        <label for="invImage">Image Path</label>
        <input type="text" name="invImage" id="invImage">
        <label for="invThumbnail">Thumbnail Path</label>
        <input type="text" name="invThumbnail" id="invThumbnail">
        <label for="invPrice">Price</label>
        <input type="number" step="0.01" name="invPrice" id="invPrice">
        <label for="invStock"># In Stock</label>
        <input type="number" name="invStock" id="invStock">
        <label for="invColor">Color</label>
        <input type="text" name="invColor" id="invColor">
        <?php echo $selectList; ?>

        <input type="submit" name="submit" id="regbtn" value="Add Vehicle">
        <!-- Add the action name - value pair -->
        <input type="hidden" name="action" value="addVehicle">
    </form>