<?php if(isset($_SESSION['userPersonalPosts'])) { ?>
  <?php foreach($_SESSION['userPersonalPosts'] as $rowWise) { ?>
    <div class="card-display">
      <div><p><?php echo $rowWise['postComment']; ?></p></div>
      <div><img src="<?php echo $rowWise['postImage']; ?>"></div>
      <div class="bot-icons d-flex justify-content-around">
        <a href="#"><span class="bi bi-heart"></span></a>
        <a href="#"><span class="bi bi-chat"></span></a>
        <a href="#"><span class="bi bi-share"></span></a>
      </div>
    </div>
  <?php } ?>
<?php } ?>
