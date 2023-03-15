<form action="http://mvc-task.com/userControl/userRegistration" method="post" enctype="multipart/form-data">
    <dl>
      <dt><label for="first_name">Enter your first name</label></dt>
      <dd>
        <input type="text" name="first_name" id="first_name" required onblur="checkFname()" placeholder="Enter your first name"
        value="<?php if(isset($_POST['first_name'])){echo $_POST['first_name'];} ?>"
        >
      </dd>
      <dd>
        <span id="invalid_fname"></span>
      </dd>
      <dt><label for="last_name">Enter your last name</label></dt>
      <dd>
        <input type="text" name="last_name" id="last_name" required onblur="checkLname()" placeholder="Enter your last name"
        value="<?php if(isset($_POST['last_name'])){echo $_POST['last_name'];} ?>"
        >
      </dd>
      <dd>
        <span id="invalid_lname"></span>
      </dd>
      <dt><label for="pwd">Enter your password</label></dt>
      <dd>
        <input type="text" name="pwd" id="pwd" required onblur="checkPasswordStatus()" placeholder="Enter your password"
        value="<?php if(isset($_POST['userPassword'])){echo $_POST['userPassword'];} ?>"
        >
      </dd>
      <dd>
        <span id="pwd_status"></span>
      </dd>
      <dt><label for="mobile">Enter your mobile</label></dt>
      <dd>
        <input type="text" name="mobile" id="mobile" required onblur="checkPhoneNo()" placeholder="Enter your mobile no"
        value="<?php if(isset($_POST['userMobile'])){echo $_POST['userMobile'];} ?>"
        >
      </dd>
      <dd>
        <span id="invalid_mobile"></span>
      </dd>
      <dt><label for="email">Enter your email</label></dt>
      <dd>
        <input type="text" name="email" id="email" required onblur="checkEmailStatus()" placeholder="Enter your email"
        value="<?php if(isset($_POST['userEmail'])){echo $_POST['userEmail'];} ?>"
        >
      </dd>
      <dd>
        <span id="email_status"></span>
      </dd>
      <dd>
        <span class="error_msg"><?php if(isset($GLOBALS['DuplicateErrorMsg']) && $GLOBALS['DuplicateErrorMsg']){echo "Please Enter Unique Email-Address!!!";} ?></span>
      </dd>
      <dt>Upload your img</dt>
      <dd>
        <input type="file" name="user_img" id="user_img" required>
      </dd>

      <dd>
        <button name="submitBtn" id="submitBtn">Registered</button>
      </dd>
      <dd>
        <a href="http://mvc-task.com/userControl">Exiting user?</a>
      </dd>
    </dl>
  </form>