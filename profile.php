<!DOCTYPE html>
<?php

    // include_once '\addons/beta/chat_app/auth/access-auth.php';

    session_start();
    if (!isset($_SESSION['uid'])) {
        header("Location: ./home.php");
        exit();
    }
    if (isset($_GET['user_id'])) {
        $user_id = $_GET['user_id'];
        unset($_GET['user_id']);
    }

    define("active-user-header_comp__access",1);
    define("users-table_comp__access",1);

 ?>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="theme-color" media="(prefers-color-scheme: light)" content="#4e60ff">
     <meta name="theme-color" media="(prefers-color-scheme: dark)" content="#000">
     <link rel="shortcut icon" href="./assets/favicon/favicon.ico" type="image/x-icon">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link rel="stylesheet" href="./css/style.css">
     <script src="./js/main.js" defer></script>
     <title>Edit profile (Beta V)</title>
    </head>
    <body>

        <header class="header-sec">
            
            <?php 
            include_once "./incs/components/online-user/header.comp.php";
            $_GET['user_id'] = $user_id ;
        ?>
    </header>
   <main class="main-sec">

       <div class="main-sec__container">
       

 
        <form action="javascript:void(0)" method="post" class="form-container__form--sign-up" autocomplete="off" enctype="multipart/form-data">
            <div class="form__form-input--profile-pic profile-pic-attachment">
                <label>
                    <div class="profile-pic-container--editable">
                        <img src="./assets/images/default.jpg" alt="Profile image" class="profile-container__img--profile-pic">
                    </div>
                    <input name="profile-pic" type="file">
                </label>
            </div>

            <div class="form__unchangable-info-container">
                    <div class="profile-form__user-name">
                        Username:<br \> John
                    </div>
                    <div class="profile-form__user-status">
                        Online 
                    </div>
            </div>

            <div class="form__form-input">
                <label>
                    <input name="name" type="text" value="John" required>
                    <span>
                        First Name
                    </span>
                </label>
            </div>
            
            <div class="form__form-input">
                <label>
                    <input name="surname" type="text" value="Doe" required>
                    <span>
                        Surname
                    </span>
                </label>
            </div>
                
            <div class="form__form-input">
                <label>
                    <input name="email" type="text" value="example@mail.com" required>
                    <span>
                        Email Address
                    </span>
                </label>
            </div>

            <div class="form__form-input">
                <label>
                    <input name="old-password" type="password" required>
                    <span>
                        Current Password
                    </span>
                    </label>
                <i class="fas fa-eye-slash" onclick="pwdToggle(this)"></i>
            </div>

            <div class="form__form-input">
                <label>
                    <input name="password" type="password" required>
                    <span>
                        New Password
                    </span>
                    </label>
                <i class="fas fa-eye-slash" onclick="pwdToggle(this)"></i>
            </div>

            <div class="form__form-input">
                <label>
                    <input name="re-password" type="password" required>
                    <span>
                        Confirm Password
                    </span>
                    </label>
                <i class="fas fa-eye-slash" onclick="pwdToggle(this)"></i>
            </div>

            <p>
            Account created on : 2022-05-16
            </p>

            <p class="form__paragraph--error-details">
            
            </p>

            <div class="profile-form__btn-container">
                <div>
                    <input class="form__form-input--submit" name="submit" type="button" value="Save changes">
                    <i class="fa-solid fa-circle-check"></i>
                </div>

                <div>
                    <input class="form__form-input--submit red-btn" type="reset" value="Discard changes">
                    <i class="fa-solid fa-trash-arrow-up red-btn"></i>
                </div>

            </div>

        </form>

        </div>


   </main>
    
    
</body>
</html>