<?php

    // include_once '\addons/beta/chat_app/auth/access-auth.php';

    session_start();
    if(!isset($_SESSION['uid'])){
        header('Location: \addons/beta/ ');
        exit();
    }
    define("--DBH_ACCESS--",1);
    include_once "./db.handler.php";
    $sql_query = mysqli_query($conn, "UPDATE users SET userStatus = 'Offline' WHERE uid = {$_SESSION['uid']}");
    if (!$sql_query) {
        header('Location: ../../pages/users.php?err=unknown');
        exit();
    }
    session_unset();
    session_destroy();
    header("Location: ../../pages/login.php");
    exit();