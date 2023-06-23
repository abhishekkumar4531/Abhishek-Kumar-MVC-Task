<?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']) { ?>
  <div>
    <div class="user-identity">
      <img src="<?php echo $_SESSION['userImageAddress']; ?>" alt="" width="180" height="180">
    </div>
    <h3>
      <?php echo $_SESSION['userFirstName'] ." ". $_SESSION['userLastName']; ?>
    </h3>
    <p>
      <?php
        if(isset($_SESSION['userBio'])) {
          echo $_SESSION['userBio'];
        }
      ?>
    </p>
  </div>
<?php } ?>
