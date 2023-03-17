<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home-Page</title>
  <?php include "components/header.php" ?>
</head>
<body class="parent-tag">
  <?php include "components/navbar.php" ?>
  <div class="container">
    <div class="home-page">
      <h5>Welcome back <?php if(isset($_SESSION['logged_in'])) {echo $_SESSION['userFirstName'];}?></h5>
      <?php include "components/userPostForm.php" ?>
      <div class="m-2">
        <?php include "components/defaultHome.php" ?>
      </div>
      <div class="user-post-container">
        <div class="post-display">
          <?php include "components/userPostedData.php" ?>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
