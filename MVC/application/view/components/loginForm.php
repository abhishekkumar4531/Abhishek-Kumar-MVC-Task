<form action="http://mvc-task.com/userControl/userLogin" method="post">
  <dl>
    <dt>Enter User-Email</dt>
    <dd>
      <input type="text" name="useremail" id="email" placeholder="Enter User-Email" required onblur="checkEmailStatus()"
      value = "<?php if(isset($_POST['useremail'])){echo $_POST['useremail'];} ?>"
      >
    </dd>
    <dd>
      <span id="email_status"></span>
    </dd>
    <dd class="error-msg">
      <?php
        if(isset($GLOBALS['emailErrorStatus']) && $GLOBALS['emailErrorStatus']) {
          echo "Please Enter Valid User-Email";
        }
      ?>
    </dd>
    <dt>Enter User-Password</dt>
    <dd>
      <input type="text" name="userpassword" id="pwd" placeholder="Enter User-Password" required onblur="checkPasswordStatus()"
      value = "<?php if(isset($_POST['userpassword'])){echo $_POST['userpassword'];} ?>"
      >
    </dd>
    <dd>
      <span id="pwd_status"></span>
    </dd>
    <dd class="error-msg">
    <?php
      if(isset($GLOBALS['pwdErrorStatus']) && $GLOBALS['pwdErrorStatus']) {
        echo "Please Enter Valid User-Password";
      }
    ?>
    </dd>
    <dd>
      <a href="/reset">Reset password!</a>
    </dd>

    <dd>
      <button name="submitLogin" id="submitBtn">Login</button>
    </dd>
    <dd>
      <a href="http://mvc-task.com/userControl/userSignup">New user?</a>
    </dd>
  </dl>
</form>