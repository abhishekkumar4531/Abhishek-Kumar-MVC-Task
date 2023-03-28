<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User-Profile</title>
  <?php include "components/header.php" ?>
</head>
<body class="parent-tag" onload="darkModeLoad()">
  <?php include "components/navbar.php" ?>
  <div class="container">
    <div class="form-content">
      <div class="form-field profile-form">
        <h1>User Profile</h1>
        <?php include "components/profileForm.php" ?>
      </div>
    </div>
  </div>
</body>
</html>
