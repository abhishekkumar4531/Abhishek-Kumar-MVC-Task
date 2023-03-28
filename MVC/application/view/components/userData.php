<?php if(isset($_SESSION['userPersonalPosts'])) { ?>
  <?php foreach($_SESSION['userPersonalPosts'] as $rowWise) { ?>
    <div class="card-display">
      <div><p><?php echo $rowWise['postComment']; ?></p></div>
      <div>
        <?php
          if($rowWise['postType'] == "video/wmv" || $rowWise['postType'] == "video/avi" || $rowWise['postType'] == "video/mpeg" ||
          $rowWise['postType'] == "video/mpg" || $rowWise['postType'] == "video/mp4") { ?>
            <video width="100%" height="100%" controls>
              <source src="/assets/videos/<?php echo $rowWise['postName']; ?>" type="video/mp4">
            </video>
        <?php } else { ?>
          <img src="/assets/uploads/<?php echo $rowWise['postName']; ?>">
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
