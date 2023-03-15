<form action="http://mvc-task.com/userControl/editUserProfile" method="post" enctype="multipart/form-data">
    <dl>
      <dd class="dd-img">
        <img src="<?php echo $_SESSION['userImageAddress']; ?>" alt="" width="100" height="100">
      </dd>
      <dt><label for="first_name">Your full name</label></dt>
      <dd>
        <input type="text" name="first_name" id="first_name" required onblur="checkFname()" placeholder="Enter your first name"
        value="<?php if(isset($_SESSION['userFirstName']) && isset($_SESSION['userLastName'])){echo $_SESSION['userFirstName'] ." ". $_SESSION['userLastName'];} ?>"
        >
      </dd>
      <dd>
        <span id="invalid_fname"></span>
      </dd>
      <!-- <dt><label for="last_name">Enter your last name</label></dt>
      <dd>
        <input type="text" name="last_name" id="last_name" required onblur="checkLname()" placeholder="Enter your last name"
        value="<?php //if(isset($_SESSION['userLastName'])){echo $_SESSION['userLastName'];} ?>"
        >
      </dd>
      <dd>
        <span id="invalid_lname"></span>
      </dd> -->
      <!-- <dt><label for="pwd">Enter your password</label></dt>
      <dd>
        <input type="text" name="pwd" id="pwd" required onblur="checkPasswordStatus()" placeholder="Enter your password"
        value="<?php //if(isset($_SESSION['userPassword'])){echo $_SESSION['userPassword'];} ?>"
        >
      </dd>
      <dd>
        <span id="pwd_status"></span>
      </dd> -->
      <dt><label for="mobile">Your mobile</label></dt>
      <dd>
        <input type="text" name="mobile" id="mobile" required onblur="checkPhoneNo()" placeholder="Enter your mobile no"
        value="<?php if(isset($_SESSION['userMobile'])){echo $_SESSION['userMobile'];} ?>"
        >
      </dd>
      <dd>
        <span id="invalid_mobile"></span>
      </dd>
      <dt><label for="email">Your email</label></dt>
      <dd>
        <input type="text" name="email" id="email" required onblur="checkEmailStatus()" placeholder="Enter your email"
        value="<?php if(isset($_SESSION['logged_in'])){echo $_SESSION['logged_in'];} ?>"
        >
      </dd>
      <dd>
        <span id="email_status"></span>
      </dd>
      <dd>
        <span class="error_msg"><?php if(isset($_SESSION['DuplicateErrorMsg']) && $_SESSION['DuplicateErrorMsg']){echo "Please Enter Unique Email-Address!!!";} ?></span>
      </dd>

      <dd>
        <button name="submitBtn" id="changeProfile">Submit</button>
      </dd>
      <dd>
        <a href="http://mvc-task.com/userControl">Go to back</a>
      </dd>
    </dl>
  </form>