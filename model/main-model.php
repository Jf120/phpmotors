<?php
//Main PHP Motors Model
function getClassifications()
{

    // Create a connection object from the phpmotors connection function
    $db = phpmotorsConnect();
    // The SQL statement to be used with the database 
    $sql = 'SELECT classificationName, classificationId FROM carclassification ORDER BY classificationName ASC';
    // The next line creates the prepared statement using the phpmotors connection      
    $stmt = $db->prepare($sql);
    // The next line runs the prepared statement 
    $stmt->execute();
    // The next line gets the data from the database and 
    // stores it as an array in the $classifications variable 
    $classifications = $stmt->fetchAll();
    // The next line closes the interaction with the database 
    $stmt->closeCursor();
    // The next line sends the array of data back to where the function 
    // was called (this should be the controller) 
    return $classifications;
}

function getNavBar($classifications)
{
    // Build a navigation bar using the $classifications array
    $navList = '<section class="hey">';
    $navList .= '<div id="logo">';
    $src = '"../images/site/logo.png"';
    $alternate = '"this.src="./images/site/logo.png"; "';
    $alt = '"Php Motors Logo"';
    $navList .= "<img src=$src onerror=$alternate alt=$alt>";
    $navList .= '</div>';
    $navList .= '<div id="account">';
    $navList .= "<a href='/phpmotors/accounts/index.php?action=" . urlencode('login') . "' title='View the log in page'>My Account</a>";
    $navList .= '</div>';
    $navList .= '</section>';
    $navList .= '<ul>';
    $navList .= "<li><a href='/phpmotors/index.php' title='View the PHP Motors home page'>Home</a></li>";
    foreach ($classifications as $classification) {
        $navList .= "<li><a href='/phpmotors/index.php?action=" . urlencode($classification['classificationName']) . "' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
    }
    $navList .= '</ul>';

    return $navList;
}
?>
