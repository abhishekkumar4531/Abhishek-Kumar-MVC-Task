<?php

  class Framework {

    public function view($fileName) {
      if(file_exists("../application/view/". $fileName .".php")) {
        require_once "../application/view/$fileName.php";
      }
      else {
        echo "<script>alert('Error!!!');</script>";
        $this->view("login");
      }
    }

  }

?>
