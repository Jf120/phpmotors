<h1>Information Update</h1>
    <?php
    if (isset($_SESSION['message'])) {
        $message = $_SESSION['message'];
        echo $message;
    }
    ?>
    <form id="changeInfo" method="post" action="/phpmotors/accounts/index.php">
        <label for="fname">First Name:</label>
        <input type="text" id="fname" name="clientFirstname" placeholder="First name is required" autocomplete="given-name" <?php $clientFirstname = $_SESSION['clientData']['clientFirstname']; echo "value='$clientFirstname'";  ?> required>
        <label for="lname">Last Name:</label>
        <input type="text" id="lname" name="clientLastname" placeholder="Last name is required" autocomplete="family-name" <?php $clientLastname = $_SESSION['clientData']['clientLastname']; echo "value='$clientLastname'";  ?> required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="clientEmail" placeholder="Email is required" autocomplete="email" <?php $clientEmail = $_SESSION['clientData']['clientEmail']; echo "value='$clientEmail'";  ?> required>
        <input type="submit" name="submit" id="updateInfo" value="Update Info">
        <!-- Add the action name - value pair -->
        <input type="hidden" name="action" value="changeInfo">
        <input type="hidden" name="clientId" value="<?php echo $_SESSION['clientData']['clientId']; ?>">
    </form>