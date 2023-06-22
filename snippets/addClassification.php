<h1>Add Classification</h2>
    <?php
    if (isset($message)) {
        echo $message;
    }
    ?>
    <form id="classification" method="post" action="/phpmotors/vehicles/index.php">
        <label for="classificationName">Classification Name:</label>
        <span>The classification name can't be larger than 30 characters</span>
        <input type="text" id="classificationName" name="classificationName" placeholder="Classification Name" maxlength="30" required>
        <input type="submit" name="submit" id="carclass" value="Add Classification">
        <!-- Add the action name - value pair -->
        <input type="hidden" name="action" value="addClassification">
    </form>