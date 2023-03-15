<?php

  class rout
	{
    public $controller = "userControl";
    public $method = "index";
    public $params = [];
    public $check = false;

    function __construct() {
      $url = $this->getUrl();
      if(!empty($url)){
        if(file_exists("../application/controller/". $url[0] .".php")) {
          $this->controller = $url[0];
          unset($url[0]);
          $this->check = true;
        }
        /*else{
          echo $url[0] ." File not exits<br>";
        }*/
      }
      require_once "../application/controller/". $this->controller .".php";
      $this->controller = new $this->controller();

      if($this->check) {
        if(isset($url[1]) && !empty($url)) {
          if(method_exists($this->controller, $url[1])) {
            $this->method = $url[1];
            unset($url[1]);
          }
          /*else{
            echo "<br>Method not exits";
          }*/
        }

        if(isset($url)) {
          $this->params = $url;
        }
        else {
          $this->params = [];
        }
      }

      call_user_func_array([$this->controller, $this->method], $this->params);
		}

    function getUrl() {
      if (isset($_SERVER["REQUEST_URI"])) {
        $url = $_SERVER["REQUEST_URI"];
        $url = rtrim($url);
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode("/", substr($url, 1));
      }
      return $url;
    }

	}

?>