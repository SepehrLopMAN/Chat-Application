<?php

    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) || !$_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
        header("Location: ../../pages/home.php");
        exit();
    }

    session_start();
    if (!isset($_SESSION['uid'])) {
        header("Location: ./login.php");
        exit();
    }
    define("--DBH_ACCESS--",1);
    include_once "./db.handler.php";
    $outgoing_id_sql_query = mysqli_query($conn, "SELECT user_id FROM users WHERE uid = {$_SESSION['uid']}");
    $outgoing_id = mysqli_fetch_assoc($outgoing_id_sql_query);
    $outgoing_id = mysqli_real_escape_string($conn, $outgoing_id['user_id']);
    $incoming_id = mysqli_real_escape_string($conn, $_POST['user_id']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);
    if(empty($message)) {
        exit();
    }

    $sql_cmd = "INSERT INTO messages (incoming_message_id, outgoing_message_id, message) VALUES (?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql_cmd)) {
        mysqli_stmt_close($stmt);
        exit("Something went wrong!");
    }
    mysqli_stmt_bind_param($stmt, "sss", $incoming_id, $outgoing_id, $message);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    exit();

