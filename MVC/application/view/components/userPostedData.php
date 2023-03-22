<?php if(isset($_SESSION['userPostedData'])){?>
  <?php foreach($_SESSION['userPostedData'] as $rowWise) { ?>
    <div class="card-display">
      <div><p><?php echo $rowWise['PostComment']; ?></p></div>
      <div><img src="<?php echo $rowWise['PostImage']; ?>"></div>
      <div class="bot-icons d-flex justify-content-around">
        <span class="bi bi-heart"></span>
        <span class="bi bi-chat"></span>
        <span class="bi bi-share"></span>
      </div>
    </div>
  <?php } ?>
<?php } ?>
