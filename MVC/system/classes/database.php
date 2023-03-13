<?php

  class database
  {
    public $user = USER;
    public $host = HOST;
    public $db = DATABASE;
    public $pwd = PASSWORD;
    public $conn;
    public $result;

    function __construct(){
      $this->conn = new mysqli($this->host, $this->user, $this->pwd, $this->db);
    }
    function sendRequest($get){
      // if(empty($params)){
      //   $this->result = $this->conn->prepare($get);
      //   return $this->result->execute();
      // }
      // else{
      //   $this->result = $this->conn->prepare($get);
      //   return $this->result->execute($params);
      // }
      //$this->result = $this->conn->prepare($get);
      $this->result = $this->conn->query($get);
    }
  }

?>