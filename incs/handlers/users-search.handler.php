<?php
    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) || !$_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
        header("Location: ../../pages/home.php");
        exit();
    }
    session_start();
    if(!defined("--DBH_ACCESS--"))
        define("--DBH_ACCESS--",1);
    include_once "./db.handler.php";
    $searchKeyWord = mysqli_real_escape_string($conn, $_POST['searchKeyWord']);
    $result = "";
    $sql_query = mysqli_query($conn, "SELECT * FROM users WHERE firstname LIKE '%{$searchKeyWord}%' OR surname LIKE '%{$searchKeyWord}%' OR username LIKE '%{$searchKeyWord}%'");
    if (!(mysqli_num_rows($sql_query) > 0)) {
        $result .= "<p style='text-align: center;'>No users found!</p>";
    }
    else {
        define("db-search__access", 1);
        include_once "./db.user-search.handler.php";
    }
    echo $result;