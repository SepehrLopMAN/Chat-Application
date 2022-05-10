<?php 
    if (!defined("active-user-header_comp__access")) {
        header("Location: ../../../pages/home.php");
        exit();
    }
?>


<nav class="header-sec__nav-bar">
    <ul class="nav-bar__menu--online-user-account">
        <li><i class="fa-solid fa-arrow-left menu__backwards-btn"></i></li>
        <li>
            <div class="menu__user-info">
                <img src="../assets/images/default.jpg" alt="Profile image" class="user-info__profile-pic">                            
                <div class="user-info__txt">
                    <h2 class="user-info__txt--user-name">Andrew Neil</h2>
                    <p>Active Now</p>
                </div>
            </div>
            
        </li>
        <li><a href="../incs/handlers/logout.handler.php">Log out</a></li>
    </ul>
</nav>        