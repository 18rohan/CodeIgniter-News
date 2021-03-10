<!-- <h1><?php echo "LOGIN" ?></h1> -->


  <?php  
        if(!empty($success_msg)){ 
            echo '<p class="status-msg success">'.$success_msg.'</p>'; 
        }elseif(!empty($error_msg)){ 
            echo '<p class="status-msg error">'.$error_msg.'</p>'; 
        } 
    ?>

<div style="display:flex;justify-content:center;flex-direction:row;">

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


<!-- Google Login -->
<div style="margin-top:10em;">
  <h1>Google Login</h1>
  <?php 
  if(isset($login_button)){
    $user_data = $this->session->userdata('user_data');
    echo '<div> Welcome User</div>';
    echo '<img src="'.$user_data['picture_url'].'';
    echo '<h3><b>Name: </b>'.$user_data["first_name"].''.$user_data["last_name"].'</h3>';
    echo '<h3><b>Email: </b>'.$user_data["email"].'</h3>';
    echo '<h3><a href="'.base_url().'User_authentication/logout"</h3>';

  }else{
    echo '<div align="center">'.$login_button.'</div>';
  }

  ?>
<!-- <a href="<?php echo base_url(); ?>User_Authentication/glogin"><img src="<?php echo base_url('assets/images/google-signin.png'); ?>" style="width:70%; height:auto;"/></a> -->
<!-- <form action="<?php echo base_url(); ?>Users" methods="POST">
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
    
    
    
    
    
    <button type="submit" class="btn btn-primary btn-lg btn-block" style="background-color:blue;">Google login </button>


</form>
 -->
</div>
</fieldset>
</div>
<script type="text/javascript">
  console.log(Notification.permission);
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