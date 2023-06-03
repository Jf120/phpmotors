<h1>Registration Form</h2>
    <?php
    if (isset($message)) {
        echo $message;
    }
    ?>
    <form id="signup" method="post" action="/phpmotors/accounts/index.php">
        <label for="first_name">First Name:</label>
        <input type="text" id="fname" name="clientFirstname" placeholder="First name is required" autocomplete="given-name">
        <label for="last_name">Last Name:</label>
        <input type="text" id="lname" name="clientLastname" placeholder="Last name is required" autocomplete="family-name">
        <label for="email">Email:</label>
        <input type="email" id="email" name="clientEmail" placeholder="Email is required" autocomplete="email">
        <label for="password">Password:</label>
        <input type="password" id="password" name="clientPassword" placeholder="Password is required" autocomplete="new-password">
        <input type="submit" name="submit" id="regbtn" value="Register">
        <!-- Add the action name - value pair -->
        <input type="hidden" name="action" value="register">
    </form>