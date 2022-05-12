<!DOCTYPE html>
<?php

    // include_once '\addons/beta/chat_app/auth/access-auth.php';

    session_start();
    if (!isset($_SESSION['uid'])) {
        header("Location: ./login.php");
        exit();
    }
    if (!isset($_GET['user_id'])) {
        header("Location: ./users.php");
        exit();
    }
    define("active-user-header_comp__access",1);
    define("chat-box_comp__access",1);
 ?>
<html lang="en" style="min-height: 100vh;">
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
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
     <script src="./js/chat.js" defer></script>
     <title>Real Time Chat (Beta V)</title>
</head>
<body>
    <header class="header-sec--chat">
        <?php include_once "./incs/components/online-user/header.comp.php" ?>
    </header>
    <main class="main-sec--chat">
    <?php include_once "./incs/components/online-user/chat-box.comp.php" ?>
    </main>
    
</body>
</html>