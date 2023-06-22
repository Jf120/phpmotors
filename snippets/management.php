<h1>Vehicle Management</h2>
    <?php
    if (isset($_SESSION['message'])) {
        $message = $_SESSION['message'];
        echo $message;
    }
    ?>
    <noscript>
        <p><strong>JavaScript Must Be Enabled to Use this Page.</strong></p>
    </noscript>
    <ul>
        <li><a href="/phpmotors/vehicles/index.php?action=classification">Add Classification</a></li>
        <li><a href="/phpmotors/vehicles/index.php?action=vehicle">Add Vehicle</a></li>
    </ul>
    <?php
    if (isset($classificationList)) {
        echo "<div class='classifiedVehicles'>";
        echo '<h2>Vehicles By Classification</h2>';
        echo '<p>Choose a classification to see those vehicles</p>';
        echo $classificationList;
        echo '</div>';
    }
    ?>
    <table id="inventoryDisplay"></table>