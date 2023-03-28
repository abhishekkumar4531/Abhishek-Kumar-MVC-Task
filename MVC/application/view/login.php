<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User-Login</title>
  <?php include "components/header.php" ?>
</head>
<body class="parent-tag">
  <?php include "components/navbar.php" ?>
  <div class="container">
    <div class="form-check form-switch">
      <label for="switchToDark">Switch to Dark Mode</label>
      <input type="checkbox" type="checkbox" onchange="darkMode()" role="switch" name="switchToDark" id="switchToDark" class="form-check-input">
    </div>
    <div class="form-content">
      <div class="form-field">
        <h1>User Log-in Page</h1>
        <?php include "components/loginForm.php" ?>
      </div>
    </div>
  </div>
</body>
</html>
