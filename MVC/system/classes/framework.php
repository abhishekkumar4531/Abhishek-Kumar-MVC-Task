<?php

  class framework
  {
    public function view($fileName){
      if(file_exists("../application/view/". $fileName .".php")){
        require_once "../application/view/$fileName.php";
      }
      else{
        echo "File name : ". $fileName ." not exist";
      }
    }
  }

?>