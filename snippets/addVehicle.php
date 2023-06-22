<h1>Add Vehicle</h2>
    <?php
    if (isset($message)) {
        echo $message;
    }

    require_once '../model/vehicles-model.php';
    ?>
    <form action="/phpmotors/vehicles/index.php" method="POST">
        <label for="invMake">Make</label>
        <input type="text" name="invMake" id="invMake" <?php if(isset($invMake)){echo "value='$invMake'";}  ?> required>
        <label for="invModel">Model</label>
        <input type="text" name="invModel" id="invModel" <?php if(isset($invModel)){echo "value='$invModel'";}  ?> required>
        <label for="invDescription">Description</label>
        <textarea id="invDescription" name="invDescription" rows="10" cols="30" required><?php if(isset($invDescription)){echo "$invDescription";}  ?></textarea>
        <label for="invImage">Image Path</label>
        <input type="text" name="invImage" id="invImage" <?php if(isset($invImage)){echo "value='$invImage'";}  ?> required>
        <label for="invThumbnail">Thumbnail Path</label>
        <input type="text" name="invThumbnail" id="invThumbnail" <?php if(isset($invThumbnail)){echo "value='$invThumbnail'";}  ?> required>
        <label for="invPrice">Price</label>
        <input type="number" step="0.01" name="invPrice" id="invPrice" <?php if(isset($invPrice)){echo "value='$invPrice'";}  ?> required>
        <label for="invStock"># In Stock</label>
        <input type="number" name="invStock" id="invStock" <?php if(isset($invStock)){echo "value='$invStock'";}  ?> required>
        <label for="invColor">Color</label>
        <input type="text" name="invColor" id="invColor" <?php if(isset($invColor)){echo "value='$invColor'";}  ?> required>
        <?php echo $selectList; ?>

        <input type="submit" name="submit" id="regbtn" value="Add Vehicle">
        <!-- Add the action name - value pair -->
        <input type="hidden" name="action" value="addVehicle">
    </form>