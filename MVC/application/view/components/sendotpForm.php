<div>
  <form action="/userControl/resetPwd" method="post">
    <dl>
      <dt>Enter Your Registered Email</dt>
      <dd>
      <input type="text" name="user_email" id="email" placeholder="Enter User-Email" required onblur="checkEmailStatus()"
      value = "<?php if(isset($_POST['user_email'])){echo $_POST['user_email'];} ?>"
      >
      </dd>
      <dd id="email_success" class="success-msg"></dd>
      <dd id="email_status" class="error-msg"></dd>
      <dd class="error-msg">
        <?php
          if(isset($GLOBALS['userEmailErrorStatus']) && $GLOBALS['userEmailErrorStatus']) {
            echo "Please Enter Valid User-Email";
          }
        ?>
      </dd>
      <dd>
        <button id="submitBtn" name="sendOtp">Send OTP</button>
      </dd>
    </dl>
  </form>
</div>
