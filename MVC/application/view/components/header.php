<!-- <link rel="stylesheet" href="<?php //echo BASEURL; ?>/assets/css/style.css?version=1"> -->
<link rel="stylesheet" href="/assets/css/style.css?version">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

<!-- <script src="<?php //echo BASEURL; ?>/assets/js/userValidity.js?newversion"></script> -->
<script src="/assets/js/userValidity.js?newversion"></script>
<script type="text/javascript">
  reg_obj = new UserValidity();
  function checkFname(){
    var user_name = document.getElementById('first_name').value;
    var status = reg_obj.checkName(user_name);
    if(status){
      document.getElementById("invalid_fname").innerHTML = `Enter only alphabets`;
      document.getElementById("submitBtn").disabled = true;
    }
    else{
      document.getElementById(invalidName).innerHTML = '';
      document.getElementById(submitBtn).disabled = false;
    }
  }
  function checkLname(){
    var user_name = document.getElementById('last_name').value;
    var status = reg_obj.checkName(user_name);
    if(status){
      document.getElementById("invalid_lname").innerHTML = `Enter only alphabets`;
      document.getElementById("submitBtn").disabled = true;
    }
    else{
      document.getElementById("invalid_lname").innerHTML = '';
      document.getElementById("submitBtn").disabled = false;
    }
  }
  function checkPhoneNo(){
    var user_mobile = document.getElementById('mobile').value;
    var status = reg_obj.checkPhone(user_mobile);
    if(status){
      document.getElementById("invalid_mobile").innerText = `Enter valid mobile number`;
      document.getElementById("submitBtn").disabled = true;
    }
    else{
      document.getElementById("invalid_mobile").innerText = '';
      document.getElementById("submitBtn").disabled = false;
    }
  }
  function checkEmailStatus(){
    var user_email = document.getElementById('email').value;
    var status = reg_obj.checkEmail(user_email);
    if(status){
      document.getElementById("email_success").innerText = ``;
      document.getElementById("email_status").innerText = `Enter valid email`;
      document.getElementById("submitBtn").disabled = true;
    }
    else{
      document.getElementById("email_status").innerText = ``;
      document.getElementById("email_success").innerText = `Valid email`;
      document.getElementById("submitBtn").disabled = false;
    }
  }
  function checkPasswordStatus(){
    var user_pwd = document.getElementById('pwd').value;
    var status = reg_obj.checkPasswords(user_pwd);
    if(status){
      document.getElementById("pwd_success").innerText = ``;
      document.getElementById("pwd_status").innerText = `Enter valid password`;
      document.getElementById("submitBtn").disabled = true;
    }
    else{
      document.getElementById("pwd_status").innerText = ``;
      document.getElementById("pwd_success").innerText = `Valid password`;
      document.getElementById("submitBtn").disabled = false;
    }
  }
</script>
