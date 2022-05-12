<?php

    // include_once '\addons/beta/chat_app/auth/access-auth.php';

    if (!defined("users-table_comp__access")) {
        header("Location: ../../../users.php");
        exit();
    } 
?>

<main class="main-sec">
        <div class="main-sec__users-container">
            <div class="search-bar-input">
                <label>
                    <input type="search" name="search" placeholder="Select a user to chat with" autocomplete="off">
                </label>
                <i class="fa-solid fa-magnifying-glass"></i>
                
            </div>

            <div class="users">
            <!--  
                    +-+-+-+- User item sample -+-+-+-+

                <div class="users__item-container">
                    <a href="#">
                        <div class="users__user-info">
                            <img src="../assets/images/default.jpg" alt="Profile image" class="user-info__profile-pic">                            
                            <div class="user-info__txt">
                                <h2 class="user-info__txt--user-name">Adriana Carter</h2>
                                <p class="user-info__txt--last-msg">USERNAME HERE</p>
                            </div>
                            <span class="user-info__circle--status status--active-user"></span>
                        </div>
                    </a>
                </div> 
            -->

               
        </div>    
    </main>