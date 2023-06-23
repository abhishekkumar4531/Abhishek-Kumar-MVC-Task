<?php
  require_once '../../vendor/autoload.php';

  //Make object of Google API Client for call Google API
  $google_client = new Google_Client();

  //Set the OAuth 2.0 Client ID
  $google_client->setClientId('963839829638-me8sbbv7eb6okdvl3ei36qfhvn7ml6kl.apps.googleusercontent.com');

  //Set the OAuth 2.0 Client Secret key
  $google_client->setClientSecret('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');

  //Set the OAuth 2.0 Redirect URI
  $google_client->setRedirectUri("http://mvc-task.com/userControl/loginWithGoogle/");

  // to get the email and profile
  $google_client->addScope('email');

  $google_client->addScope('profile');
?>
