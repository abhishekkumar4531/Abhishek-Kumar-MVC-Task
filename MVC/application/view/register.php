<?php
  if((isset($_SESSION['logged_in']) && $_SESSION['logged_in'])){
    header("location: /home");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User-Registration</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <script src="assets/js/validity.js?newversion"></script>
  <script type="text/javascript">
    reg_obj = new Validity();
    function checkFname(){
      var user_name = document.getElementById('first_name').value;
      reg_obj.checkName(user_name, "invalid_fname", "submitBtn", "red");
    }
    function checkLname(){
      var user_name = document.getElementById('last_name').value;
      reg_obj.checkName(user_name, "invalid_lname", "submitBtn", "red");
    }
    function checkPhoneNo(){
      var user_mobile = document.getElementById('mobile').value;
      reg_obj.checkPhone(user_mobile, "invalid_mobile", "submitBtn", "red");
    }
    function checkEmailStatus(){
      var user_email = document.getElementById('email').value;
      reg_obj.checkEmail(user_email, "email_status", "submitBtn");
    }
    function checkPasswordStatus(){
      var user_pwd = document.getElementById('pwd').value;
      reg_obj.checkPasswords(user_pwd, "pwd_status", "submitBtn");
    }
  </script>
</head>
<body>
  <h1>Registration-Page</h1>
  <form action="http://mvc-task.com/userControl/userRegistration" method="post" enctype="multipart/form-data">
    <dl>
      <dt><label for="first_name">Enter your first name</label></dt>
      <dd>
        <input type="text" name="first_name" id="first_name" required onblur="checkFname()" placeholder="Enter your first name"
        value="<?php ?>"
        >
      </dd>
      <dd>
        <span id="invalid_fname"></span>
      </dd>
      <dd>
        <span>
          <?php ?>
        </span>
      </dd>
      <dt><label for="last_name">Enter your last name</label></dt>
      <dd>
        <input type="text" name="last_name" id="last_name" required onblur="checkLname()" placeholder="Enter your last name"
        value="<?php ?>"
        >
      </dd>
      <dd>
        <span id="invalid_lname"></span>
      </dd>
      <dd>
        <span>
          <?php ?>
        </span>
      </dd>
      <dt><label for="pwd">Enter your password</label></dt>
      <dd>
        <input type="text" name="pwd" id="pwd" required onblur="checkPasswordStatus()" placeholder="Enter your password"
        value="<?php ?>"
        >
      </dd>
      <dd>
        <span id="pwd_status"></span>
      </dd>
      <dd>
        <span>
          <?php ?>
        </span>
      </dd>
      <dt><label for="mobile">Enter your mobile</label></dt>
      <dd>
        <input type="text" name="mobile" id="mobile" required onblur="checkPhoneNo()" placeholder="Enter your mobile no"
        value="<?php ?>"
        >
      </dd>
      <dd>
        <span id="invalid_mobile"></span>
      </dd>
      <dt><label for="email">Enter your email</label></dt>
      <dd>
        <input type="text" name="email" id="email" required onblur="checkEmailStatus()" placeholder="Enter your email"
        value="<?php ?>"
        >
      </dd>
      <dd>
        <span id="email_status"></span>
      </dd>
      <dt>Upload your img</dt>
      <dd>
        <input type="file" name="user_img" id="user_img" required>
      </dd>

      <dd>
        <button name="submitBtn" id="submitBtn">Registered</button>
      </dd>
      <dd>
        <a href="/login">Exiting user?</a>
      </dd>
    </dl>
  </form>
</body>
</html>