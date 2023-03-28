<?php if(isset($GLOBALS['userInfo'])) { ?>
  <div class="user-identity">
    <div>
      <img src="<?php echo $GLOBALS['userInfo']['UserImg']; ?>" width="180" height="180">
    </div>
    <div>
      <h3><?php echo $GLOBALS['userInfo']['FirstName'] ." ". $GLOBALS['userInfo']['LastName']; ?></h3>
    </div>
  </div>
<?php } ?>

<div class="post-display">
  <?php if(isset($GLOBALS['userPosts'])) { ?>
    <?php foreach($GLOBALS['userPosts'] as $rowWise) { ?>
      <div class="card-display">
        <div><p><?php echo $rowWise['PostComment']; ?></p></div>
        <div>
          <?php
            if($rowWise['PostType'] == "video/wmv" || $rowWise['PostType'] == "video/avi" || $rowWise['PostType'] == "video/mpeg" ||
            $rowWise['PostType'] == "video/mpg" || $rowWise['PostType'] == "video/mp4") { ?>
              <video width="100%" height="100%" controls>
                <source src="http://mvc-task.com/assets/videos/<?php echo $rowWise['PostName']; ?>" type="video/mp4">
              </video>
          <?php } else { ?>
            <img src="http://mvc-task.com/assets/uploads/<?php echo $rowWise['PostName']; ?>">
          <?php } ?>
        </div>
        <div class="bot-icons d-flex justify-content-around">
          <a href="#"><span class="bi bi-heart"></span></a>
          <a href="#"><span class="bi bi-chat"></span></a>
          <a href="#"><span class="bi bi-share"></span></a>
        </div>
      </div>
    <?php } ?>
  <?php } ?>
</div>
