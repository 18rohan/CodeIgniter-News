<h1><?=$title ?></h1>

<?php echo form_open('Users/signin'); ?>
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
      <div id="emailHelp" class="text-danger">
       
      </div>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input 
        type="password" 
        class="form-control" 
        id="password1" 
        name="password1" 
        placeholder="Enter Password"
        oninput="checkPassword1()"
        >
      <div id="password1_help" class="text-danger">
        <p></p>
      </div>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Confirm Password</label>
      <input 
        type="password" 
        class="form-control" 
        id="password2" 
        name="password2" 
        placeholder="Confirm Password"
        oninput="checkPassword2()"
        >
      <div id="password2_help" class="text-danger">
        <p ></p>
      </div>
    </div>
    
    
    
    <div class="form-group">
      <label for="exampleInputPassword1">User Title</label>
    <select class="custom-select" id="user_title" name="user_title">
      <option selected="">Select your title</option>
      <option value="admin">Admin</option>
      <option value="sales">Sales</option>
      <option value="marketing">Marketing</option>
    </select>
  </div>

    <button type="submit" class="btn btn-primary btn-lg btn-block" style="background-color:blue;">SIGN IN </button>
    
    
</form>


<script type="text/javascript">
  var email = document.getElementById('emailID');
  var password1 = document.getElementById('password1');
  var password2 = document.getElementById('password2');
  var warning1 = document.getElementById('warning1');


  var emailHelp = document.getElementById('emailHelp');
  var password1Help = document.getElementById('password1_help');
  var password2Help = document.getElementById('password2_help');

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
            else if (email.value.match(mailformat)) {
                emailHelp.innerHTML = " ";
                email.style.color = '#333333';
                email.style.borderWidth = "4px";
                email.style.borderColor = 'green'
                

            }
        }

    function checkPassword1(){
          var passw=  /^[A-Za-z]\w{7,14}$/;
            if(password1.value.length === 0){

                password1Help.innerHTML = "Password field cannot be empty";
                // password1Help.style.color = "red";
            }
            else if(!password1.value.match(passw)){
              password1Help.innerHTML = "Please enter a valid password";
            }
            else if ((password1.value.match(passw))) {
                password1Help.innerHTML = " ";
                password1.style.borderWidth = "4px";
                password1.style.borderColor = 'green'


            }
        }    
    function checkPassword2(){
      var passw=  /^[A-Za-z]\w{7,14}$/;
            if(password2.value.length === 0){

                password2Help.innerHTML = "Password field cannot be empty";
                password2Help.style.color = "red";
            }
            else if(!password2.value.match(passw)){
              password2Help.innerHTML = "Please enter a valid password";
            }
            else if (password1.value != password2.value){
              password2Help.innerHTML = "Passwords do not match";
            }
            else if (email.value.length > 1) {
                password2Help.innerHTML = " ";
                password2.style.borderWidth = "4px";
                password2.style.borderColor = 'green'


            }

        }  

</script>