<div>
  <form action="http://mvc-task.com/userControl/resetPassword" method="post">
    <dl>
      <dt>Your Name</dt>
      <dd>
        <input type="text" name="userName" id="userName" readonly
        value="<?php if(isset($GLOBALS['userName'])) { echo $GLOBALS['userName']; } ?>"
        >
      </dd>
      <dt>Enter OTP</dt>
      <dd>
        <input type="text" name="otp" id="otp" required placeholder="Enter OTP"
        value="<?php //if(isset($_POST['otp'])) { echo $_POST['otp']; } ?>"
        >
      </dd>
      <dd class="error-msg"></dd>
      <dt>Enter New Password</dt>
      <dd>
        <input type="password" name="newPassword" id="pwd" required onblur="checkPasswordStatus()" placeholder="Enter New Password"
        value="<?php //if(isset($_POST['newPassword'])) { echo $_POST['newPassword']; } ?>"
        >
      </dd>
      <dd id="pwd_success" class="success-msg"></dd>
      <dd id="pwd_status" class="error-msg"></dd>
      <dt>Confirm Your Password</dt>
      <dd>
        <input type="password" name="cnfPassword" id="cnfPwd" required onblur="confirmPassword()" placeholder="Confirm Password"
        value="<?php //if(isset($_POST['cnfPassword'])) { echo $_POST['cnfPassword']; } ?>"
        >
      </dd>
      <dd id="cnfPwd_status" class="error-msg"></dd>
      <dd>
        <button name="resetPwd" id="submitBtn">Changed Password</button>
      </dd>
    </dl>
  </form>
</div>
