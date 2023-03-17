<div class="post-container">
  <div class="">
    <img src="<?php echo $_SESSION['userImageAddress']; ?>" alt="" width="100" height="100">
  </div>
  <div class="">
    <form action="http://mvc-task.com/afterLogin/postData" method="post" enctype="multipart/form-data">
      <dl class="upload-container">
        <dd class="">
          <textarea name="newPost" id="newPost" cols="90" rows="5" placeholder="What's in your mind!" required></textarea>
        </dd>
        <dd class="">
          <input type="file" name="newImage" id="newImage" class="custom-file-input form-control">
          <button name="uploaded">POST</button>
        </dd>
      </dl>
    </form>
  </div>
</div>