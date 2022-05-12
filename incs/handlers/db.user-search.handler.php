<?php

    // include_once '\addons/beta/chat_app/auth/access-auth.php';

    if (!defined("db-search__access")) {
        header("Location: ../../users.php");
        exit();
    }

    while ($userInfo = mysqli_fetch_assoc($sql_query)) {
        if ($_SESSION['uid'] != $userInfo['uid'])
            $result .= '
                <div class="users__item-container">
                    <a href="./chat.php?user_id=' . $userInfo["user_id"] . '">
                        <div class="users__user-info">
                            <img src="./assets/images/' . $userInfo['userProfilePic'] . '" alt="Profile image" class="user-info__profile-pic">                            
                            <div class="user-info__txt">
                                <h2 class="user-info__txt--user-name">' . $userInfo['username'] .'</h2>
                                <p class="user-info__txt--last-msg">' . "{$userInfo["firstname"]} {$userInfo["surname"]}" . '</p>
                            </div>
                            <span class="user-info__circle--status' . (($userInfo["userStatus"] !== "Online")? ' status--inactive-user' :'' ) . '"></span>
                        </div>
                    </a>
                </div>
            ';
    }