<?php

    // include_once '\addons/beta/chat_app/auth/access-auth.php';

    if (!defined("--DBH_ACCESS--")) {
        header("Location: ../../users.php");
        exit();
    }

    $server = "127.0.0.1";
    $db_username = "root";
    $db_password = "";
    $db_name = "chat_system";

    $conn = mysqli_connect($server, $db_username, $db_password, $db_name);
    
    if(!$conn) {
        echo "Connection to Database failed!" . mysqli_connect_error();
    }

    // $server = "127.0.0.1";
    // $db_username = "u141467892_lopman_chat_ap";
    // $db_password = "&A[4_Yc9AT^g/L!u";
    // $db_name = "u141467892_lopman_chat_ap";



    // $conn = mysqli_connect($server, $db_username, $db_password, $db_name);
    
    // if(!$conn) {
    //     echo "Connection to Database failed!";
    // }
