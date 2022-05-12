<?php

    // include_once '\addons/beta/chat_app/auth/access-auth.php';

    if (!defined("login-form_comp__access")) {
            header("Location: ../../pages/home.php");
            exit();
    } 
?>
<div class="form-container">

    
    <form action="./" method="post" class="form-container__form--login" autocomplete="off">
        
           <div class="form__form-input">
             <label>
                 <input name="username" type="text" required>
                <span>
                    Username
                </span>
             </label>
           </div>
   
   
           <div class="form__form-input">
               <label>
                   <input name="password" type="password" required>
                <span>
                    Password
                </span>
                </label>
             <i class="fas fa-eye-slash" onclick="pwdToggle(this)"></i>
           </div>
   
           <p class="form__paragraph--error-details">

           </p>
           
           <input class="form__form-input--submit" name="submit" type="submit" value="Log In">
        
    </form>

    
        <p class="login-form-container__paragraph--register">Don't have an account?<a href="./signup.php"> Sign up</a></p>
    
    
</div>