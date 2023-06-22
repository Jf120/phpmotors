<h1>Registration Form</h2>
    <?php
    if (isset($message)) {
        echo $message;
    }
    ?>
    <form id="signup" method="post" action="/phpmotors/accounts/index.php">
        <label for="first_name">First Name:</label>
        <input type="text" id="fname" name="clientFirstname" placeholder="First name is required" autocomplete="given-name" <?php if(isset($clientFirstname)){echo "value='$clientFirstname'";}  ?> required>
        <label for="last_name">Last Name:</label>
        <input type="text" id="lname" name="clientLastname" placeholder="Last name is required" autocomplete="family-name" <?php if(isset($clientLastname)){echo "value='$clientLastname'";}  ?> required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="clientEmail" placeholder="Email is required" autocomplete="email" <?php if(isset($clientEmail)){echo "value='$clientEmail'";}  ?> required>
        <label for="password">Password:</label>
        <span>Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span>
        <input type="password" id="password" name="clientPassword" placeholder="Password is required" autocomplete="new-password" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
        <input type="submit" name="submit" id="regbtn" value="Register">
        <!-- Add the action name - value pair -->
        <input type="hidden" name="action" value="register">
    </form>