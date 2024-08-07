<?php 
    
    // include_once '\addons/beta/chat_app/auth/access-auth.php';

    if (!defined("signup-form_comp__access")) {
            header("Location: ../../users.php");
            exit();
    } 
?>
<div class="form-container">

    
    <form action="javascript:void(0)" method="post" class="form-container__form--sign-up" autocomplete="off" enctype="multipart/form-data">
    <div class="form__form-input">
             <label>
                <input name="name" type="text" required>
                <span>
                    First Name
                </span>
             </label>
           </div>
           
           <div class="form__form-input">
             <label>
                <input name="surname" type="text" required>
                <span>
                    Surname
                </span>
             </label>
           </div>
           
           <div class="form__form-input">
               <label>
                   <input name="username" type="text" required>
                   <span>
                       Username
                    </span>
                </label>
                <p class="form-input__inp--username-status">

                </p>
            </div>
            
            <div class="form__form-input">
              <label>
                 <input name="email" type="text" required>
                 <span>
                     Email Address
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

           <div class="form__form-input">
               <label>
                   <input name="re-password" type="password" required>
                <span>
                    Confirm Password
                </span>
                </label>
             <i class="fas fa-eye-slash" onclick="pwdToggle(this)"></i>
           </div>

           <div class="form__form-input--profile-pic">
               <label>
                    Profile Picture (Optional)
                   <input name="profile-pic" type="file">
                </label>
             
           </div>

           <p class="form__paragraph--error-details">

           </p>

           <input class="form__form-input--submit" name="submit" type="button" value="Sign Up">
    </form>
    
</div>