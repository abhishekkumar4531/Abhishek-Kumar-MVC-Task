<form action="http://mvc-task.com/userControl/userLogin" method="post">
  <dl>
    <dt>Enter User-Email</dt>
    <dd>
      <input type="text" name="useremail" id="email" placeholder="Enter User-Email" required onblur="checkEmailStatus()"
      value = "<?php if(isset($_POST['useremail'])){echo $_POST['useremail'];} ?>"
      >
    </dd>
    <dd id="email_success" class="success-msg"></dd>
    <dd id="email_status" class="error-msg"></dd>
    <dd class="error-msg">
      <?php
        if(isset($GLOBALS['emailErrorStatus']) && $GLOBALS['emailErrorStatus']) {
          echo "Please Enter Valid User-Email";
        }
      ?>
    </dd>
    <dt>Enter User-Password</dt>
    <dd>
      <input type="password" name="userpassword" id="pwd" placeholder="Enter User-Password" required onblur="checkPasswordStatus()"
      value = "<?php if(isset($_POST['userpassword'])){echo $_POST['userpassword'];} ?>"
      >
    </dd>
    <dd id="pwd_success" class="success-msg"></dd>
    <dd id="pwd_status" class="error-msg"></dd>
    <dd class="error-msg">
    <?php
      if(isset($GLOBALS['pwdErrorStatus']) && $GLOBALS['pwdErrorStatus']) {
        echo "Please Enter Valid User-Password";
      }
    ?>
    </dd>
    <dd>
      <a href="http://mvc-task.com/userControl/sendOTP">Reset password!</a>
    </dd>

    <dd>
      <button name="submitLogin" id="submitBtn">Login</button>
    </dd>
    <dd>
      <a href="http://mvc-task.com/userControl/userSignup">New user?</a>
    </dd>
  </dl>
</form>
