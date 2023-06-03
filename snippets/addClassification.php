<h1>Add Classification</h2>
    <?php
    if (isset($message)) {
        echo $message;
    }
    ?>
    <form id="classification" method="post" action="/phpmotors/vehicles/index.php">
        <label for="classificationName">Classification Name:</label>
        <input type="text" id="classificationName" name="classificationName" placeholder="Classification Name">
        <input type="submit" name="submit" id="carclass" value="Add Classification">
        <!-- Add the action name - value pair -->
        <input type="hidden" name="action" value="addClassification">
    </form>