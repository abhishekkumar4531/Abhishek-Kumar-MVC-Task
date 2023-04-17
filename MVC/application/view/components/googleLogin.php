<?php
  require "../config/googleConfig.php";
  $loginUrl = $google_client->createAuthUrl();

  echo "<a href='". $loginUrl ."'>Login with gmail!</a>";
?>
