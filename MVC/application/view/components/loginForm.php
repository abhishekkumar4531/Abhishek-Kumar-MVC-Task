<form action="http://mvc-task.com/userControl/userLogin" method="post">
  <dl>
    <dt>Enter User-Email</dt>
    <dd>
      <input type="text" name="useremail" id="useremail" placeholder="Enter User-Email" required onblur="checkEmailStatus()"
      value = "<?php if(isset($_SESSION['userLoginEmail'])){echo $_SESSION['userLoginEmail'];} ?>"
      >
    </dd>
    <dd>
      <span id="email_status"></span>
    </dd>
    <dd>
      <span class="error-msg"><?php if(isset($_SESSION['emailErrorMsg']) && $_SESSION['emailErrorMsg']){echo "Please Enter Valid User-Email";} ?></span>
    </dd>
    <dt>Enter User-Password</dt>
    <dd>
      <input type="text" name="userpassword" id="userpassword" placeholder="Enter User-Password" required onblur="checkPasswordStatus()"
      value = "<?php if(isset($_SESSION['userPwds'])){echo $_SESSION['userPwds'];} ?>"
      >
    </dd>
    <dd>
      <span id="pwd_status"></span>
    </dd>
    <dd>
    <span class="error-msg"><?php if(isset($_SESSION['pwdErrorMsg']) && $_SESSION['pwdErrorMsg']){echo "Please Enter Valid User-Password";} ?></span>
    </dd>
    <dd>
      <a href="/reset">Reset password!</a>
    </dd>

    <dd>
      <button name="submitLogin" id="submitLogin">Login</button>
    </dd>
    <dd>
      <a href="http://mvc-task.com/userControl/userSignup">New user?</a>
    </dd>
  </dl>
</form>