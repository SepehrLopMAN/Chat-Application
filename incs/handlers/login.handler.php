<?php

    // include_once '\addons/beta/chat_app/auth/access-auth.php';

    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) || !$_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
        header("Location: ../../users.php");
        exit();
    }

    define("--DBH_ACCESS--",1);
    include_once "./db.handler.php";

    $username = filter_var(strtolower(mysqli_real_escape_string($conn, $_POST['username'])), FILTER_SANITIZE_STRING);
    $pwd = mysqli_real_escape_string($conn, $_POST['password']);

    if(empty($username)|| empty($pwd)) {
        exit("Please fill all the required input fields!");
    }

    $check_username_existance = function ($db_conn,string $username) {
        $username = strtolower($username);
        

        $db_sql_query_check = "SELECT * FROM users WHERE username = ?;";
        $stmt = mysqli_stmt_init($db_conn);
        if (!mysqli_stmt_prepare($stmt, $db_sql_query_check)) {
            exit("Oops! Something went wrong. Try again");
        }


        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        if (!$userInfo = mysqli_fetch_assoc($resultData)) {
            mysqli_stmt_close($stmt);
            return FALSE;
        }
        mysqli_stmt_close($stmt);
        return $userInfo;
    };

    $userInfo = $check_username_existance($conn,$username);

    if($userInfo === FALSE) {
        exit("Username or Password is incorrect!");
    }

    $pwdHashed = $userInfo["userPassword"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === FALSE) {
        exit("Username or Password is incorrect!");
    } else if ($checkPwd === TRUE) {
        session_start();
        $sql_query = mysqli_query($conn, "UPDATE users SET userStatus = 'Online' WHERE uid = {$userInfo["uid"]}");
        if (!$sql_query) {
            exit("Something went wrong! Try Again.");
        }
        $_SESSION["uid"] = $userInfo["uid"];
        exit();
    }
