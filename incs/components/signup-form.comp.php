<div class="form-container">

    
    <form action="./" method="post" class="form-container__form--sign-up" enctype="multipart/form-data">
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
            </div>
            
            <div class="form__form-input">
              <label>
                 <input name="email" type="email" required>
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
                    Repeat Password
                </span>
                </label>
             <i class="fas fa-eye-slash" onclick="pwdToggle(this)"></i>
           </div>

           <div class="form__form-input--profile-pic">
               <label>
                    Profile Picture
                   <input name="profile-pic" type="file">
                </label>
             
           </div>

           <input class="form__form-input--submit" name="submit" type="submit" value="Sign Up">
    </form>
    
</div>