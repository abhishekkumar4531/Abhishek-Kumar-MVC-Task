<div class="row bg-white ms-2 me-2">
  <div class="col-2 col-2-img mt-4">
    <img src="<?php echo $_SESSION['userImageAddress']; ?>" alt="" width="100" height="100">
  </div>
  <div class="col-10">
    <form action="" method="post">
      <dl class="row">
        <dd class="col-10 col-10-items">
          <textarea name="newPost" id="newPost" cols="90" rows="5" placeholder="What's in your mind!"></textarea>
        </dd>
        <dd class="col-2 custom-file-upload">
          <input type="file" name="newImage" id="newImage" class="custom-file-input form-control">
        </dd>
      </dl>
    </form>
  </div>
</div>