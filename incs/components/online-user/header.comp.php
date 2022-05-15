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
        <?php
            if (isset($contact)) {
                echo "<a href='./profile.php?user_id=$contact_id'>";
            }
        ?>
            <div class="menu__user-info">
                <?php
                    if (isset($contact)) {
                        echo "
                            <img src='./assets/images/{$contact['userProfilePic']}' alt='User's profile image' class='user-info__profile-pic'> 
                        ";
                }
                ?>
                <div class="user-info__txt">
                    <h2 class="user-info__txt--user-name">
                                       <?php echo (!isset($contact)) ? "Welcome Back {$userInfo['firstname']}" : "{$contact['firstname']} {$contact['surname']}" ; ?></h2>
                    <p><?php echo (!isset($contact)) ? $userInfo['userStatus'] : $contact['userStatus'] ;?></p>
                </div>
            </div>

        <?php
            if (isset($contact)) {
                echo "</a>";
            }
        ?>  

            
        </li>
        <li class="nav-bar-menu__account-settings">
            <div class="account-settings-conatiner">
                <div class="account-settings__caret-down-icon">
                    <i class="fa-solid fa-square-caret-down"></i>
                </div>
                <div class="account-settings__menu-container">
                    <h3 class="account-settings-menu__heading--client-name"><?php echo "{$userInfo['firstname']} {$userInfo['surname']}"; ?></h3>
                    <ul class="account-settings__menu">
                        <li>
                            <a href="./users.php" class="account-settings-menu__anchor--chats">Chats & Users <i class="fa-solid fa-users"></i></a>
                        </li>
                        <li>
                            <a href="./profile.php?user_id=<?php echo $userInfo['user_id']; ?>" class="account-settings-menu__anchor--edit-profile">Edit profile <i class="fa-solid fa-pen-to-square"></i></a>
                        </li>
                        <li>
                            <a href="./incs/handlers/logout.handler.php" class="account-settings-menu__anchor--logout">Logout <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
                        </li>
                    </ul>
                </div>
        </div>
        </li>
    </ul>
</nav>