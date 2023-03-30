<?php if(isset($_SESSION['userPostedData'])) { ?>
  <?php foreach($_SESSION['userPostedData'] as $rowWise) { ?>
    <div class="card-display">
      <div class="post_by_user">
        <div>
          <a href="/afterLogin/profiles/<?php echo $rowWise['UserId']; ?>">
            <img src="/<?php echo $rowWise['ImageAddress']; ?>">
          </a>
          <a href="/afterLogin/profiles/<?php echo $rowWise['UserId']; ?>">
            <h6><?php echo $rowWise['UserName']; ?></h6>
          </a>
        </div>
      </div>
      <div><p><?php echo $rowWise['PostComment']; ?></p></div>
      <div>
        <?php
          if($rowWise['PostType'] == "video/wmv" || $rowWise['PostType'] == "video/avi" || $rowWise['PostType'] == "video/mpeg" ||
          $rowWise['PostType'] == "video/mpg" || $rowWise['PostType'] == "video/mp4") { ?>
            <video width="100%" height="100%" controls>
              <source src="/assets/videos/<?php echo $rowWise['PostName']; ?>" type="video/mp4">
            </video>
        <?php } else { ?>
          <img src="/assets/uploads/<?php echo $rowWise['PostName']; ?>">
        <?php } ?>
      </div>
      <div class="bot-icons d-flex justify-content-around">
        <a href="#"><span class="bi bi-heart"></span></a>
        <a href="#"><span class="bi bi-chat"></span></a>
        <a href="#"><span class="bi bi-share"></span></a>
      </div>
      <div class="share-icons d-flex justify-content-start">
        <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>&t=<?php echo $rowWise['PostComment']; ?>">
          <span class="bi bi-facebook"></span>
        </a>
        <a target="_blank" href="https://www.twitter.com/share?url=<?php //echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>&text=<?php echo $rowWise['PostComment']; ?>">
          <span class="bi bi-twitter"></span>
        </a>
      </div>
    </div>
  <?php } ?>
<?php } ?>
