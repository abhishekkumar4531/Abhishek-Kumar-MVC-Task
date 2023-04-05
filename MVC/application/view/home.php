<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home-Page</title>
  <?php include "components/header.php" ?>
  <script src="assets/js/loadMore.js"></script>
</head>
<body class="parent-tag" onload="darkModeLoad();loadCookieStatus();">
  <?php include "components/navbar.php" ?>
  <div class="container">
    <div class="home-page">
      <h5>Welcome back <?php if(isset($_SESSION['logged_in'])) {echo $_SESSION['userFirstName'];}?></h5>
      <?php include "components/userPostForm.php" ?>
      <div class="m-2">
        <?php include "components/defaultHome.php" ?>
      </div>
      <div class="user-post-container">
        <div class="post-display" id="post-display">
          <!-- <?php //include "components/userPostedData.php" ?> -->
        </div>
      </div>
      <div>
        <div class="text-center p-2">
          <button class="w-25 p-3" name="loadBtn" id="loadMore">Load More</button>
        </div>
      </div>
    </div>
    <div class="fixed-position">
      <ul class="share-icons">
        <li>
          <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>">
            <span class="bi bi-facebook"></span>
          </a>
        </li>
        <li>
          <a target="_blank" href="https://www.twitter.com/share?url=<?php //echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>">
            <span class="bi bi-twitter"></span>
          </a>
        </li>
      </ul>
    </div>
  </div>
  <div class="cookie-policy">
    <?php include "components/cookies-policy.php" ?>
  </div>
</body>
</html>
