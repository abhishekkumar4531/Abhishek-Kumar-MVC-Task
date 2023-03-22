<form action="http://mvc-task.com/userControl/userRegistration" method="post" enctype="multipart/form-data">
  <dl>
    <dt><label for="first_name">Enter your first name</label></dt>
    <dd>
      <input type="text" name="first_name" id="first_name" required onblur="checkFname()" placeholder="Enter your first name"
      value="<?php if(isset($_POST['first_name'])){echo $_POST['first_name'];} ?>"
      >
    </dd>
    <dd id="invalid_fname" class="error-msg"></dd>
    <dd class="error-msg">
      <?php if(isset($GLOBALS['firstNameError']) && !$GLOBALS['firstNameError']) {
        echo "Invalid syntax of first name!!!";
      }
      ?>
    </dd>
    <dt><label for="last_name">Enter your last name</label></dt>
    <dd>
      <input type="text" name="last_name" id="last_name" required onblur="checkLname()" placeholder="Enter your last name"
      value="<?php if(isset($_POST['last_name'])){echo $_POST['last_name'];} ?>"
      >
    </dd>
    <dd id="invalid_lname" class="error-msg"></dd>
    <dd class="error-msg">
      <?php if(isset($GLOBALS['lastNameError']) && !$GLOBALS['lastNameError']) {
        echo "Invalid syntax of last name!!!";
      }
      ?>
    </dd>
    <dt><label for="pwd">Enter your password</label></dt>
    <dd>
      <input type="password" name="pwd" id="pwd" required onblur="checkPasswordStatus()" placeholder="Enter your password"
      value="<?php if(isset($_POST['pwd'])){echo $_POST['pwd'];} ?>"
      >
    </dd>
    <dd id="pwd_success" class="success-msg"></dd>
    <dd id="pwd_status" class="error-msg"></dd>
    <dd class="error-msg">
      <?php if(isset($GLOBALS['passwordError']) && !$GLOBALS['passwordError']) {
        echo "Invalid syntax of password!!!";
      }
      ?>
    </dd>
    <dt><label for="mobile">Enter your mobile</label></dt>
    <dd>
      <input type="text" name="mobile" id="mobile" required onblur="checkPhoneNo()" placeholder="Enter your mobile no"
      value="<?php if(isset($_POST['mobile'])){echo $_POST['mobile'];} ?>"
      >
    </dd>
    <dd id="invalid_mobile" class="error-msg"></dd>
    <dd class="error-msg">
      <?php if(isset($GLOBALS['mobileError']) && !$GLOBALS['mobileError']) {
        echo "Invalid syntax of mobile!!!";
      }
      ?>
    </dd>
    <dt><label for="email">Enter your email</label></dt>
    <dd>
      <input type="text" name="email" id="email" required onblur="checkEmailStatus()" placeholder="Enter your email"
      value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>"
      >
    </dd>
    <dd id="email_success" class="success-msg"></dd>
    <dd id="email_status" class="error-msg"></dd>
    <dd class="error-msg">
      <?php if(isset($GLOBALS['DuplicateErrorMsg']) && $GLOBALS['DuplicateErrorMsg']){echo "Please Enter Unique Email-Address!!!";} ?>
    </dd>
    <dd class="error-msg">
      <?php if(isset($GLOBALS['emailError']) && !$GLOBALS['emailError']) {
        echo "Invalid syntax of email!!!";
      }
      ?>
    </dd>
    <dt>Upload your img</dt>
    <dd>
      <input type="file" name="user_img" id="user_img" required>
    </dd>
    <dd class="error-msg">
      <?php if(isset($GLOBALS['imageError']) && $GLOBALS['imageError']) {
        echo "Invalid image type!!!";
      }
      ?>
    </dd>

    <dd>
      <button name="submitBtn" id="submitBtn">Registered</button>
    </dd>
    <dd>
      <a href="http://mvc-task.com/userControl">Exiting user?</a>
    </dd>
  </dl>
</form>
