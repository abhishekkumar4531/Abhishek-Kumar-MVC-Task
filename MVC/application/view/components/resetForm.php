<div>
  <form action="http://mvc-task.com/userControl/resetPassword" method="post">
    <dl>
      <dt>Your Name</dt>
      <dd>
        <input type="text" name="userName" id="userName" readonly
        value="<?php if(isset($GLOBALS['userName'])){echo $GLOBALS['userName'];} ?>"
        >
      </dd>
      <dt>Enter OTP</dt>
      <dd>
        <input type="text" name="otp" id="otp" required>
      </dd>
      <dt>Enter New Password</dt>
      <dd>
        <input type="text" name="newPassword" id="newPassword">
      </dd>
      <dt>Confirm Your Password</dt>
      <dd>
        <input type="text" name="cnfPassword" id="cnfPassword">
      </dd>
      <dd>
        <button name="resetPwd" id="resetPwd">Changed Password</button>
      </dd>
    </dl>
  </form>
</div>
