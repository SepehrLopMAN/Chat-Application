<?php 

    // include_once '\addons/beta/chat_app/auth/access-auth.php';

    if (!defined("active-user-header_comp__access")) {
        header("Location: ../../../users.php");
        exit();
    }

    define("--DBH_ACCESS--",1);
    include_once "./incs/handlers/db.handler.php";

    $sql_query = mysqli_query($conn, "SELECT * FROM users WHERE uid = {$_SESSION['uid']}");
    if (!(mysqli_num_rows($sql_query) > 0)) {
        session_unset();
        session_destroy();
        header("Location: ./home.php");
        exit();
    }
    $userInfo = mysqli_fetch_assoc($sql_query);
    if (isset($_GET['user_id'])) {
        if (!preg_match("/^[0-9]+$/",$_GET['user_id'])) {
            header("Location: ./users.php?err=invalidContact");
            exit();
        }
        $contact_id = mysqli_real_escape_string($conn, $_GET['user_id']);
        $ct_sql_query = mysqli_query($conn, "SELECT * FROM users WHERE user_id = {$contact_id}"); // sql query for contact
        if (!(mysqli_num_rows($ct_sql_query) > 0)) {
            header("Location: ./users.php?err=invalidContact");
            exit();
        }
        $contact = mysqli_fetch_assoc($ct_sql_query);
    }
?>


<nav class="header-sec__nav-bar">
    <ul class="nav-bar__menu--online-user-account">
        <?php
            if(isset($contact))
                echo '<li><a href="./users.php"><i class="fa-solid fa-arrow-left menu__backwards-btn"></i></a></li>';    
        ?>
        <li>
            <div class="menu__user-info">
                <img src="./assets/images/<?php echo (!isset($contact)) ? $userInfo['userProfilePic'] : $contact['userProfilePic']; ?>" alt="Profile image" class="user-info__profile-pic">                            
                <div class="user-info__txt">
                    <h2 class="user-info__txt--user-name"><?php echo (!isset($contact)) ? "{$userInfo['firstname']} {$userInfo['surname']}" : "{$contact['firstname']} {$contact['surname']}" ; ?></h2>
                    <p><?php echo (!isset($contact)) ? $userInfo['userStatus'] : $contact['userStatus'] ;?></p>
                </div>
            </div>
            
        </li>
        <li><a href="./incs/handlers/logout.handler.php">Log out</a></li>
    </ul>
</nav>        