<div class="form-container">

    
    <form action="./" method="post" class="form-container__form--login">
        
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
   
           
           <input class="form__form-input--submit" name="submit" type="submit" value="Log In">
        
    </form>
    
</div>