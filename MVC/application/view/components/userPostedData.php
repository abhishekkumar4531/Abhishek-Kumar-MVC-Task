<?php
  if(isset($_SESSION['userPostedData'])){
    //print_r($_SESSION['userPostedData']);
    foreach($_SESSION['userPostedData'] as $rowWise) {
      echo "<div class='card-display'>";
      echo "<div><p>". $rowWise['postComment'] ."</p></div>";
      echo "<div><img src='". $rowWise['postImage'] ."'></div>";
      echo "<div>Like || Comment || Share</div>";
      echo "</div>";
    }
  }
?>
