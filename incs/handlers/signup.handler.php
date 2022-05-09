<?php 


include_once "./db.handler.php";

$name = mysqli_real_escape_string($conn, $_POST['name']);
$surname = mysqli_real_escape_string($conn, $_POST['surname']);
$username = mysqli_real_escape_string($conn, $_POST['username']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$pwd = mysqli_real_escape_string($conn, $_POST['password']);
$re_pwd =  mysqli_real_escape_string($conn, $_POST['re-password']);
echo var_dump($_POST);