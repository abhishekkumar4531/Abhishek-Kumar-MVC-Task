<div class="post-container">
  <div class="post-container-display">
    <div class="current-user-picture">
      <img src="<?php echo $_SESSION['userImageAddress']; ?>" alt="" width="100" height="100">
    </div>
    <div class="post-container-content">
      <form action="/afterLogin/postData" method="post" enctype="multipart/form-data">
        <div class="upload-container">
          <div class="upload-container-textarea">
            <textarea name="newPost" id="newPost" cols="90" rows="5" placeholder="What's in your mind!" required></textarea>
          </div>
          <div class="upload-container-button">
          <!-- <input type="file" name="newImage" id="newImage" class="custom-file-input form-control w-50" required> -->
            <div>
              <input type="file" name="newImage" id="newImage" class="custom-file-input form-control w-50" required>
            </div>
            <div>
              <button name="uploaded">POST</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
