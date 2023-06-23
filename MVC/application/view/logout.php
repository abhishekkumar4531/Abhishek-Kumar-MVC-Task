<?php

  session_unset();
  session_destroy();

  //echo "Session destroy";
  header("location: /userControl");

?>
