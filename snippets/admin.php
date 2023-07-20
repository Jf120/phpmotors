<h1>
    <?php
    echo $_SESSION['clientData']['clientFirstname'];
    ?>
</h1>
<ul style="list-style-type: none;">
    <li>You are logged In</li>
</ul>
<?php
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    echo $message;
}
?>
<h2>Account Management</h2>
<ul>
    <li><a href='/phpmotors/accounts/index.php?action=updateAccount' title='Update Account Information'>Update Account Information</a></li>
</ul>
<?php
if ($_SESSION['clientData']['clientLevel'] > 1) {
    echo "<h2>Vehicle Management</h2><ul><li><a href='/phpmotors/vehicles/index.php' title='Vehicle Management Page'>Edit Vehicles</a></li></ul>";
}
?>
<?php
require_once '../model/reviews-model.php';
require_once '../library/functions.php';
$reviews = getClientReviews($_SESSION["clientData"]["clientId"]);
$reviews = HTMLreviewsAdmin($reviews);

if (isset($reviews)) {
    echo '<h2>Manage Reviews</h2>';
    echo $reviews;
}
?>