
<?php 
    // include_once '\addons/beta/chat_app/auth/access-auth.php';

    if (!defined("chat-box_comp__access")) {
        header("Location: ../../../users.php");
        exit();
    }
?>
<div class="main-sec__chat-container">
        <div class="chat-box">
            
<?php
            /*
                        +-+-+-+- Incoming message sample -+-+-+-+

                <div class="chat-box__incoming-msg-container">
                    <img src="./assets/images/default.jpg" alt="Profile image" class="user-info__profile-pic">                            
                    <div class="chat-box__message--incoming-msg">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor ipsum officia corporis, quasi veniam corrupti sunt consequuntur quidem eveniet, sed nobis. Libero nulla enim, incidunt modi eum ex quisquam ratione.
                        <span class="msg-box__span--corner"> </span>
                    </div>
                </div>
            


              
                        +-+-+-+- Outgoing message sample -+-+-+-+

                <div class="chat-box__message--outgoing-msg">
                    Lorem ipsum
                    <span class="msg-box__span--corner"> </span>
                </div>

            */
        
?>
            </div>


        <div class="chat-container__form-container">
            <form action="javascript:void(0)" method="post" class="chat-message-form" enctype="multipart/form-data" autocomplete="off">
                <div class="form__file-attachment-container">    
                    <label>
                    <i class="fa-solid fa-paperclip"></i>
                        <input type="file" name="file">
                    </label>
                </div>
                <div class="form__msg-bar">
                    <textarea name="message" placeholder="message"></textarea>
                </div>
    
                <div class="form__send-btn-container" >
                    <button class="send-btn">
                        <i class="fa-solid fa-square-arrow-up-right"></i>
                    </button>
                </div>
            </form>
        </div>




    </div>