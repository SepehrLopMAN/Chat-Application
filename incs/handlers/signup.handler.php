<?php 

    // include_once '\addons/beta/chat_app/auth/access-auth.php';

    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) || !$_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
        header("Location: ../../pages/home.php");
        exit();
    }
    define("--DBH_ACCESS--",1);
    include_once "./db.handler.php";

    $name = filter_var(mysqli_real_escape_string($conn, $_POST['name']), FILTER_SANITIZE_STRING);
    $surname = filter_var(mysqli_real_escape_string($conn, $_POST['surname']), FILTER_SANITIZE_STRING);
    $username = filter_var(mysqli_real_escape_string($conn, $_POST['username']), FILTER_SANITIZE_STRING);
    $email = filter_var(mysqli_real_escape_string($conn, $_POST['email']), FILTER_SANITIZE_STRING);
    $pwd = mysqli_real_escape_string($conn, $_POST['password']);
    $re_pwd =  mysqli_real_escape_string($conn, $_POST['re-password']);
    $file_name = "default.jpg";

    if(empty($name) || empty($surname) || empty($username) || empty($email) || empty($pwd) || empty($re_pwd)) {
        exit("Please fill all the required input fields!");
    }
    if (!preg_match("/^[a-zA-Z]+$/",$name) || !preg_match("/^[a-zA-Z]+$/",$surname)) {
        exit("Name and Surname must contain only letters of English alphabet and no spaces!");
    }

    include_once "./username-err.handler.php";

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        exit("Email address is not valid!");
    }
    (function () {
        $sql_query = mysqli_query($GLOBALS['conn'], "SELECT email FROM users WHERE email = '{$GLOBALS['email']}'");
        if (mysqli_num_rows($sql_query) > 0) {
            exit("Email address is already taken!");
        }
    })();

    if(!preg_match("/^.{6,}$/", $pwd)) {
        exit("password must contain at least 6 characters!");
    }

    if (!preg_match("/[a-z]+/", $pwd) || !preg_match("/[A-Z]+/", $pwd) || !preg_match("/[^\w]+/", $pwd) || !preg_match("/[0-9]+/", $pwd)) {
        exit("password must contain at least one Uppercase letter, Lowercase letter, Number & symbol!");
    }

    if ($pwd !== $re_pwd) {
        exit("Passwords are not matched!");
    }

    if (isset($_FILES['profile-pic']) && $_FILES['profile-pic']['size']) {
        $file_name = $_FILES['profile-pic']['name'];
        $tmp_name = $_FILES['profile-pic']['tmp_name'];
        $file_explode = explode('.', $file_name); 
        $file_ext = end($file_explode); 
        // NOTE: parameter of end function should be passed by reference
        // and returning value of explode() cannot be turned into reference
        $extensions = ["png", "jpeg", "jpg"];
        if(!in_array($file_ext, $extensions) !== FALSE) {
            exit("Image format not supported! (Supportable formats: jpeg, png, jpg)");
        }
        $file_name = date('Y-m-d--H-i-s-T',time()) ."__$file_name";
        if(!move_uploaded_file($tmp_name, "../../assets/images/$file_name")) {
            exit("Image could not be uploaded. Try Again!");
        }
        
    }
    $status = "Online";

    (function ($db_conn, $name, $surname, $username, $email, $pwd, $file_name, $status ){
        $db_sql_query_check = "INSERT INTO users (firstname, surname, email, username, userPassword, userProfilePic, userStatus, user_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($db_conn);
        if(!mysqli_stmt_prepare($stmt, $db_sql_query_check)) {
            mysqli_stmt_close($stmt);
            exit("Something went wrong! Please try again later.");
        }
        $hashed_pwd = password_hash($pwd, PASSWORD_DEFAULT);
        $name = strtolower($name);
        $username = strtolower($username);
        $surname = strtolower($surname);
        $name = ucfirst($name);
        $surname = ucfirst($surname);
        $user_id = rand(time(), 100000000);
        mysqli_stmt_bind_param($stmt, "ssssssss", $name, $surname, $email, $username, $hashed_pwd, $file_name, $status, $user_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        exit();
        
    })($conn, $name, $surname, $username, $email, $pwd, $file_name, $status);

