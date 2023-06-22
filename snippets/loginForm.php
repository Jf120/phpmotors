<h1>Log In</h2>
    <?php
    if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
    }
    ?>
    <form id="login" method="post" action="/phpmotors/accounts/">

        <label for="email">Email address:</label>
        <input type="email" id="email" name="clientEmail" autocomplete="email" <?php if(isset($clientEmail)){echo "value='$clientEmail'";}  ?> required>

        <label for="password">Password:</label>
        <span>Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span>    
        <input type="password" id="password" name="clientPassword" autocomplete="current-password" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">

        <input type="submit" value="Submit">
        <input type="hidden" name="action" value="Login">
        <p>Don't have an account? <a href="/phpmotors/accounts/index.php?action=registration" title="View the registration page">Sign Up</a></p>
    </form>