<?php
  require_once '../vendor/autoload.php';

  //Make object of Google API Client for call Google API
  $google_client = new Google_Client();

  //Set the OAuth 2.0 Client ID
  $google_client->setClientId('1063021838171-62kq3t7tmuril0ffnhq95ps79vlddbcs.apps.googleusercontent.com');

  //Set the OAuth 2.0 Client Secret key
  $google_client->setClientSecret('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');

  //Set the OAuth 2.0 Redirect URI
  $google_client->setRedirectUri('http://mvc-task.com/userControl');

  // to get the email and profile
  $google_client->addScope('email');

  $google_client->addScope('profile');
?>