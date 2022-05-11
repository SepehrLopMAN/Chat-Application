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
    $incoming_profile_pic_sql_query = mysqli_query($conn, "SELECT userProfilePic FROM users WHERE user_id = {$incoming_id}");
    $userProfilePic = mysqli_fetch_assoc($incoming_profile_pic_sql_query);
    $userProfilePic = mysqli_real_escape_string($conn, $userProfilePic['userProfilePic']);
    $result = "";


    $sql_cmd = "SELECT * FROM messages WHERE (outgoing_message_id = {$outgoing_id} AND incoming_message_id = {$incoming_id}) 
    OR (outgoing_message_id = {$incoming_id} AND incoming_message_id = {$outgoing_id}) ORDER BY message_id DESC";
    $sql_query = mysqli_query($conn, $sql_cmd);
    if(!(mysqli_num_rows($sql_query) > 0)) {
        $result .= "<p class='chat-box__paragraph--no-msg-yet'>No messages yet! <br \><br \> Start the conversation!</p>";
    }
    else {
        while ($messages = mysqli_fetch_assoc($sql_query)) {
            
            if ($messages['outgoing_message_id'] === $outgoing_id ) {
                $result .= 
                '
                    <div class="chat-box__message--outgoing-msg">
                        ' . $messages["message"] . '
                        <span class="msg-box__span--corner"> </span>
                    </div>
                ';
            }

            else {
                $result .= 
                '
                    <div class="chat-box__incoming-msg-container">
                        <img src="../assets/images/' . $userProfilePic . '" alt="Profile image" class="user-info__profile-pic">                            
                        <div class="chat-box__message--incoming-msg">
                            ' . $messages["message"] . '
                            <span class="msg-box__span--corner"> </span>
                        </div>
                    </div>
                ';
            }

        }
    }
    echo $result;   
