<h1>Log In</h2>
    <?php
    if (isset($message)) {
        echo $message;
    }
    ?>
    <form id="login">

        <label for="email">Email address:</label>
        <input type="email" id="email" name="email" autocomplete="email" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" autocomplete="current-password" required>

        <input type="submit" value="Submit">
        <p>Don't have an account? <a href="/phpmotors/accounts/index.php?action=registration" title="View the registration page">Sign Up</a></p>
    </form>