<h1><?php echo "LOGIN" ?></h1>

  <?php  
        if(!empty($success_msg)){ 
            echo '<p class="status-msg success">'.$success_msg.'</p>'; 
        }elseif(!empty($error_msg)){ 
            echo '<p class="status-msg error">'.$error_msg.'</p>'; 
        } 
    ?>
  

<?php echo form_open('Users/login') ?>
  <fieldset>
    
    
    <div class="form-group">
      <label for="exampleInputEmail1">Email Address</label>
      <input 
      	type="email" 
      	class="form-control" 
      	id="emailID" 
        name="emailID" 
      	aria-describedby="emailHelp" 
      	placeholder="Enter email"
      	oninput="checkEmail()"
      	>
      <small id="emailHelp" class="text-danger">
       
      </small>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input 
      	type="password" 
      	class="form-control" 
      	id="password" 
        name="password" 
      	placeholder="Enter Password"
      	oninput="checkPassword()"

      	>
      	<small id="passwordHelp" class="text-danger">
       
      </small>
      <small id="passwordHelp1" class="text-danger">
       
      </small>
    </div>
    
    
    
    
    
    <button type="submit" class="btn btn-primary btn-lg btn-block" style="background-color:blue;">LOGIN </button>
    
</form>

<script type="text/javascript">
	var email = document.getElementById("emailID");
	var password = document.getElementById("password");

	var emailHelp = document.getElementById("emailHelp");
	var passwordHelp = document.getElementById("passwordHelp");

	function checkEmail(){
      var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
            if(email.value.length === 0){

                emailHelp.innerHTML = "Email field cannot be empty";
                // warning1.style.color = "green";
                // emailHelp.style.color = "red";
            }
            else if(!email.value.match(mailformat)){
              emailHelp.innerHTML = "Please Enter a valid email address";
            }
            else if (email.value.length > 1) {
                emailHelp.innerHTML = " ";
                
                email.style.color = '#333333';
                email.style.borderWidth = "4px";
                email.style.borderColor = 'green'
                
                

            }
        }
     function checkPassword(){
          var passw=  /^[A-Za-z]\w{7,14}$/;
            if(password.value.length === 0){

                passwordHelp.innerHTML = "Password field cannot be empty";
                // password1Help.style.color = "red";
            }
            else if(!password.value.match(passw)){
              passwordHelp.innerHTML = "Please enter a valid password";
            }
            else if (password.value.match(passw)) {
                passwordHelp.innerHTML = "";
                // passwordHelp.textColor = "green";
                password.style.borderWidth = "4px";
                password.style.borderColor = 'green'

            }
        }    

</script>