<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User-Login</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <script src="assets/js/validity.js?newversion"></script>
  <script type="text/javascript">
    login_obj = new Validity();
    function checkUname(){
      var username = document.getElementById('username').value;
      login_obj.checkName(username, "invalid_name", "submitLogin", "red");
    }
    function checkPasswordStatus(){
      var userpassword = document.getElementById('userpassword').value;
      login_obj.checkPasswords(userpassword, "pwd_status", "submitLogin");
    }
  </script>
</head>
<body>
  <?php
    //include "../../system/Init.php";
  ?>
  <h1>User Log-in Page</h1>
  <div>
    <form action="http://mvc-task.com/userControl/userLogin" method="post">
      <dl>
        <dt>Enter Your's User-Name</dt>
        <dd>
          <input type="text" name="username" id="username" placeholder="Enter Your's User-Name" required onblur="checkUname()">
        </dd>
        <dd>
          <span id="invalid_name"></span>
        </dd>
        <dt>Enter Your's Password</dt>
        <dd>
          <input type="text" name="userpassword" id="userpassword" placeholder="Enter Your's Password" required onblur="checkPasswordStatus()">
        </dd>
        <dd>
          <span id="pwd_status"></span>
        </dd>
        <dd>
          <a href="/reset">Reset password!</a>
        </dd>

        <dd>
          <button name="submitLogin" id="submitLogin">Login</button>
        </dd>
        <dd>
          <a href="/register">New user?</a>
        </dd>
      </dl>
    </form>
  </div>
</body>
</html>