<section>
    <div id="logo">
        <img src="./images/site/logo.png" onerror="this.src='../images/site/logo.png';" alt="Php Motors Logo">
    </div>
    <div id="account">
        <?php if (isset($cookieFirstname)) {
            echo "<span>Welcome $cookieFirstname</span>";
        } ?>
        <a href="#">My Account</a>
    </div>
</section>