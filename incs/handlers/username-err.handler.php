<?php

if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) || !$_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
    header("Location: ../../pages/home.php");
    exit();
}
include_once "./db.handler.php";


$username = mysqli_real_escape_string($conn, $_POST['username']);

$check_username_existance = function (string $username) : bool {
    $username = strtolower($username);
    $sql_query = mysqli_query($GLOBALS['conn'], "SELECT username FROM users WHERE username = '{$username}'");
    if (mysqli_num_rows($sql_query) == 0) {
        return FALSE;
    }
    return TRUE;
};

if(!preg_match("/^[\w]{3,}$/",$username)) {
    exit("Username must contain at least 3 characters using only letters, numbers and \"_\"");
}

if ($check_username_existance($username) !== FALSE) {
    exit("$username is already taken!");
}
