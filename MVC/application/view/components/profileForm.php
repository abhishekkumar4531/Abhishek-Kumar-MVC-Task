<form action="http://mvc-task.com/afterLogin/editUserProfile" method="post" enctype="multipart/form-data">
  <dl>
    <dd class="dd-img">
      <img src="<?php echo $_SESSION['userImageAddress']; ?>" alt="" width="100" height="100">
    </dd>
    <dt><label for="user_img">Update Your Profile-Image</label></dt>
    <dd>
      <input type="file" name="user_img" id="user_img">
    </dd>
    <dt><label for="user_bio">Edit/Add Your Bio</label></dt>
    <dd>
      <textarea name="user_bio" id="user_bio" cols="41" rows="3" placeholder="Add Your Bio" required
      ><?php if(isset($_SESSION['userBio'])){echo $_SESSION['userBio'];} ?></textarea>
    </dd>
    <dt><label for="first_name">Your First-Name</label></dt>
    <dd>
      <input type="text" name="first_name" id="first_name" required onblur="checkFname()"
      value="<?php if(isset($_SESSION['userFirstName']) && isset($_SESSION['userLastName'])){echo $_SESSION['userFirstName'];} ?>"
      >
    </dd>
    <dd id="invalid_fname" class="error-msg"></dd>
    <dt><label for="last_name">Your Last-Name</label></dt>
    <dd>
      <input type="text" name="last_name" id="last_name" required onblur="checkLname()"
      value="<?php if(isset($_SESSION['userLastName'])){echo $_SESSION['userLastName'];} ?>"
      >
    </dd>
    <dd id="invalid_lname" class="error-msg"></dd>
    <!-- <dt><label for="pwd">Enter your password</label></dt>
    <dd>
      <input type="text" name="pwd" id="pwd" required onblur="checkPasswordStatus()" placeholder="Enter your password"
      value="<?php //if(isset($_SESSION['userPassword'])){echo $_SESSION['userPassword'];} ?>"
      >
    </dd>
    <dd>
      <span id="pwd_status"></span>
    </dd> -->
    <dt><label for="mobile">Your Mobile-Number</label></dt>
    <dd>
      <input type="text" name="mobile" id="mobile" required onblur="checkPhoneNo()"
      value="<?php if(isset($_SESSION['userMobile'])){echo $_SESSION['userMobile'];} ?>"
      >
    </dd>
    <dd id="invalid_mobile" class="error-msg"></dd>
    <dt><label for="email">Your Email-Address</label></dt>
    <dd>
      <input type="text" name="email" id="email" required onblur="checkEmailStatus()" readonly
      value="<?php if(isset($_SESSION['logged_in'])){echo $_SESSION['logged_in'];} ?>"
      >
    </dd>
    <!-- <dd id="email_success" class="success-msg"></dd>
    <dd id="email_status" class="error-msg"></dd>
    <dd class="error_msg">
      <?php
        //if(isset($_SESSION['DuplicateErrorMsg']) && $_SESSION['DuplicateErrorMsg']){echo "Please Enter Unique Email-Address!!!";}
      ?>
    </dd> -->

    <dd>
      <button name="update" id="submitBtn">Submit</button>
    </dd>
    <dd>
      <a href="http://mvc-task.com/afterLogin">Go to back</a>
    </dd>
  </dl>
</form>
