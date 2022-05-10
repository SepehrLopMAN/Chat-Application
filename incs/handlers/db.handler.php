<?php
if (!defined("--DBH_ACCESS--")) {
    header("Location: ../../pages/home.php");
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