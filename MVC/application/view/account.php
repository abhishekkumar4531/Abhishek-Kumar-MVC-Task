<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User-Account</title>
  <?php include "components/header.php" ?>
</head>
<body class="parent-tag">
  <?php include "components/navbar.php" ?>
  <div class="container">
    <div class="home-page">
      <div class="user-identity mt-3">
        <?php include "components/userIdentity.php" ?>
      </div>
      <div class="mt-3 mb-5">
        <?php include "components/userPostForm.php" ?>
      </div>
      <div class="user-post-container">
        <div class="post-display" id="post-display-personal">
          <?php include "components/userData.php" ?>
        </div>
      </div>
    </div>
  </div>
</body>
</html>