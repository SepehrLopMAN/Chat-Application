<?php 
    if (!defined("active-user-header_comp__access")) {
        header("Location: ../../../pages/home.php");
        exit();
    }

    define("--DBH_ACCESS--",1);
    include_once "../incs/handlers/db.handler.php";

    $sql_query = mysqli_query($conn, "SELECT * FROM users WHERE uid = {$_SESSION['uid']}");
    if (!(mysqli_num_rows($sql_query) > 0)) {
        //!!!!! NEED TO DESTROY THE SESSION HERE, LOG OUT AND CHANGE THE LOCATION TO HOME PAGE
        header("Location: ./home.php");
    }
    $userInfo = mysqli_fetch_assoc($sql_query);
?>


<nav class="header-sec__nav-bar">
    <ul class="nav-bar__menu--online-user-account">
        <?php
            if (isset($_GET['user_id'])) {
                echo '<li><i class="fa-solid fa-arrow-left menu__backwards-btn"></i></li>';
            }
        ?>
        <li>
            <div class="menu__user-info">
                <img src="../assets/images/<?php echo $userInfo['userProfilePic']; ?>" alt="Profile image" class="user-info__profile-pic">                            
                <div class="user-info__txt">
                    <h2 class="user-info__txt--user-name"><?php echo "{$userInfo['firstname']} {$userInfo['surname']}"; ?></h2>
                    <p><?php echo $userInfo['userStatus'];?></p>
                </div>
            </div>
            
        </li>
        <li><a href="../incs/handlers/logout.handler.php">Log out</a></li>
    </ul>
</nav>        