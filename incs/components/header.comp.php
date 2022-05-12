
<?php 

    // include_once '\addons/beta/chat_app/auth/access-auth.php';

    if (!defined("header_comp__access")) {
        header("Location: ../../pages/home.php");
        exit();
} ?>
<header class="header-sec">
    <nav class="header-sec__nav-bar">
        <ul class="nav-bar__menu--general-nav">
            <li><a href="./home.php">Home page</a></li>
            <!-- <li><a href="./contact.php">Contact us</a></li> -->
            <!-- <li><a href="./about-us.php">About us</a></li> -->
        </ul>
        <ul class="nav-bar__menu--user-account">


            <li><a href="./signup.php"> Sign up</a></li>
            <li><a href="./login.php">Log in</a></li>
        </ul>
    </nav>        
</header>