<?php
    if (!defined("users-table_comp__access")) {
        header("Location: ../../../pages/home.php");
        exit();
    } 
?>

<main class="main-sec">
        <div class="main-sec__users-container">
            <div class="search-bar-input">
                <label>
                    <input type="search" name="search" placeholder="Select a user to chat with">
                </label>
                <i class="fa-solid fa-magnifying-glass"></i>
                
            </div>

            <div class="users">
                <div class="users__item-container">
                    <a href="#">
                        <div class="users__user-info">
                            <img src="../assets/images/default.jpg" alt="Profile image" class="user-info__profile-pic">                            
                            <div class="user-info__txt">
                                <h2 class="user-info__txt--user-name">Adriana Carter</h2>
                                <p class="user-info__txt--last-msg">No messages available</p>
                            </div>
                            <span class="user-info__circle--status status--active-user"></span>
                        </div>
                    </a>
                </div>

                <div class="users__item-container">
                    <a href="#">
                        <div class="users__user-info">
                            <img src="../assets/images/default.jpg" alt="Profile image" class="user-info__profile-pic">                            
                            <div class="user-info__txt">
                                <h2 class="user-info__txt--user-name">Coding Nepalsdaklkjdass ..</h2>
                                <p class="user-info__txt--last-msg">adsddsdjkjskjh</p>
                            </div>
                            <span class="user-info__circle--status status--inactive-user"></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>    
    </main>