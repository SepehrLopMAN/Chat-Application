<!DOCTYPE html>
<?php

    // include_once '\addons/beta/chat_app/auth/access-auth.php';

    session_start();
    if (!isset($_SESSION['uid'])) {
        header("Location: ./home.php");
        exit();
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
    ?>
</header>

   <main>
       
   </main>
    
    
</body>
</html>