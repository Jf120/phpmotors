<h1>Change Password</h1>
<?php
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    echo $message;
}
?>
<form method="post" action="/phpmotors/accounts/index.php" id="changePassword">
    <label for="password">Password:</label>
    <span>Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span>
    <input type="password" id="password" name="clientPassword" placeholder="Password is required" autocomplete="new-password" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
    <input type="submit" name="submit" id="updatePassword" value="Change Password">
    <!-- Add the action name - value pair -->
    <input type="hidden" name="action" value="changePassword">
    <input type="hidden" name="clientId" value="<?php echo $_SESSION['clientData']['clientId']; ?>">
</form>