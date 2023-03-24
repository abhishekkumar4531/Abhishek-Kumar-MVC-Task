<?php if(isset($_SESSION['userPostedData'])) { ?>
  <?php foreach($_SESSION['userPostedData'] as $rowWise) { ?>
    <div class="card-display">
      <div class="post_by_user">
        <div>
          <a href="http://mvc-task.com/afterLogin/profiles/<?php echo $rowWise['UserId']; ?>">
            <img src="<?php echo $rowWise['ImageAddress']; ?>">
          </a>
          <a href="http://mvc-task.com/afterLogin/profiles/<?php echo $rowWise['UserId']; ?>">
            <h6><?php echo $rowWise['UserName']; ?></h6>
          </a>
        </div>
      </div>
      <div><p><?php echo $rowWise['PostComment']; ?></p></div>
      <div><img src="<?php echo $rowWise['PostImage']; ?>"></div>
      <div class="bot-icons d-flex justify-content-around">
        <a href="#"><span class="bi bi-heart"></span></a>
        <a href="#"><span class="bi bi-chat"></span></a>
        <a href="#"><span class="bi bi-share"></span></a>
      </div>
    </div>
  <?php } ?>
<?php } ?>
