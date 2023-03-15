<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User-Login</title>
  <?php include "components/header.php" ?>
  <script src="assets/js/validity.js?newversion"></script>
  <script type="text/javascript">
    login_obj = new Validity();
    function checkEmailStatus(){
    var user_email = document.getElementById('useremail').value;
    reg_obj.checkEmail(user_email, "email_status", "submitLogin");
    }
    function checkPasswordStatus(){
      var userpassword = document.getElementById('userpassword').value;
      login_obj.checkPasswords(userpassword, "pwd_status", "submitLogin");
    }
  </script>
</head>
<body>
  <?php include "components/navbar.php" ?>
  <div class="container">
    <div class="form-content">
      <div class="form-fields">
        <h1>User Log-in Page</h1>
        <?php include "components/loginForm.php" ?>
      </div>
    </div>
  </div>
</body>
</html>