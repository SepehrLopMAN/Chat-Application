<?php 
    // include_once '\addons/beta/chat_app/auth/access-auth.php';

    if (!defined("profile-comp__access")) {
        header("Location: ../../../users.php");
        exit();
    }
?>
<div class="main-sec__container">
       

    <?php

        if (!defined("--DBH_ACCESS--")) {
            define("--DBH_ACCESS--",1);
        }
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

        if (!isset($_GET['user_id']) || $_GET['user_id'] === "{$userInfo['user_id']}" ) {
            echo "
                <form action='javascript:void(0)' method='post' class='form-container__form--sign-up' autocomplete='off' enctype='multipart/form-data'>
                    <div class='form__form-input--profile-pic profile-pic-attachment'>
                        <label>
                            <div class='profile-pic-container--editable'>
                                <img src='./assets/images/". $userInfo['userProfilePic'] ."' alt='Profile image' class='profile-container__img--profile-pic'>
                            </div>
                            <input name='profile-pic' type='file'>
                        </label>
                    </div>

                    <div class='form__unchangable-info-container'>
                        <div class='profile-form__user-name'>
                            Username:<br \> ". $userInfo['username'] ."
                        </div>
                        <div class='profile-form__user-status'>
                            ". $userInfo['userStatus'] ."
                        </div>
                    </div>

                    <div class='form__form-input'>
                        <label>
                            <input name='name' type='text' value='". $userInfo['firstname'] ."' required>
                            <span>
                                First Name
                            </span>
                        </label>
                    </div>
           
                    <div class='form__form-input'>
                        <label>
                            <input name='surname' type='text' value='". $userInfo['surname'] ."' required>
                            <span>
                                Surname
                            </span>
                        </label>
                    </div>
               
                   <div class='form__form-input'>
                        <label>
                            <input name='email' type='text' value='". $userInfo['email'] ."' required>
                            <span>
                                Email Address
                            </span>
                        </label>
                    </div>
                   
                   <div class='form__form-input'>
                        <label>
                            <input name='old-password' type='password' required>
                            <span>
                                Current Password
                            </span>
                        </label>
                        <i class='fas fa-eye-slash' onclick='pwdToggle(this)'></i>
                    </div>

                    <div class='form__form-input'>
                        <label>
                            <input name='password' type='password' required>
                            <span>
                                New Password
                            </span>
                        </label>
                        <i class='fas fa-eye-slash' onclick='pwdToggle(this)'></i>
                    </div>

                    <div class='form__form-input'>
                        <label>
                            <input name='re-password' type='password' required>
                            <span>
                                Confirm Password
                            </span>
                        </label>
                        <i class='fas fa-eye-slash' onclick='pwdToggle(this)'></i>
                    </div>
           
                    <p>
                        Account created on : ". explode(" ", $userInfo['creation_date'])[0] ."
                    </p>
           
                    <p class='form__paragraph--error-details'>
           
                    </p>
           
                    <div class='profile-form__btn-container'>
                        <div>
                            <input class='form__form-input--submit' name='submit' type='button' value='Save changes'>
                            <i class='fa-solid fa-circle-check'></i>
                        </div>
           
                        <div>
                            <input class='form__form-input--submit red-btn' type='reset' value='Discard changes'>
                            <i class='fa-solid fa-trash-arrow-up red-btn'></i>
                        </div>
           
                    </div>
           
                </form>";
           
        }
        else {
                echo "
                    <div class='profile-pic-attachment'>
                
                        <div class='profile-pic-container'>
                        <img src='./assets/images/". $contact['userProfilePic'] ."' alt='Profile image' class='profile-container__img--profile-pic'>
                        </div>
                    
                    </div>
                    
                    <div class='form__unchangable-info-container'>
                        <div class='profile-form__user-name'>
                            Username:<br \> ". $contact['username'] ."
                        </div>
                        <div class='profile-form__user-status'>
                        ". $contact['userStatus'] ." 
                        </div>
                    </div>

                    <div class='form__form-input'>
                        <p>
                            First Name : ". $contact['firstname'] ." 
                        </p>
                    </div>
            
                    <div class='form__form-input'>
                        <p>
                            Surname : ". $contact['surname'] ." 
                        </p>
                    </div>
            
                    <p>
                        Account created on : ". explode(" ", $contact['creation_date'])[0] ." 
                    </p>

                    <div class='profile-form__btn-container'>
                        <div>
                            <a class='form__form-input--submit' href='./chat.php?user_id=". $contact['user_id'] ." '>
                                Message
                            <i class='fa-solid fa-comment-dots'></i>
                            </a>
                        </div>
                        <div>
                            <a class='form__form-input--submit red-btn' class='red-btn' href='./incs/handlers/block-user.handler.php?user_id=". $contact['user_id'] ." '>  
                                Block
                                <i class='fa-solid fa-trash-arrow-up red-btn'></i>
                            </a>
                        </div>
                
                        
                    </div>
                ";
                       
            }
        ?>

</div>
