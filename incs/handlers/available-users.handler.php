<?php
    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) || !$_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
        header("Location: ../../pages/home.php");
        exit();
    }
    session_start();
    if(!defined("--DBH_ACCESS--"))
        define("--DBH_ACCESS--",1);
    include_once "./db.handler.php";
    $sql_query = mysqli_query($conn, "SELECT * FROM users");
    $result = "";
    if (mysqli_num_rows($sql_query) == 1) {
        $result .= "<p style='text-align:center;'>No users are available to chat!</p>";
    } elseif (mysqli_num_rows($sql_query) > 1) {
        define("db-search__access", 1);
        include_once "./db.user-search.handler.php";
    }
    echo $result;