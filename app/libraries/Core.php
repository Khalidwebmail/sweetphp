<?php
  /* 
   *  APP CORE CLASS
   *  Creates URL & Loads Core Controller
   *  URL Format - /controller/method/param1/param2
   */
  class Core {
    // Set Defaults
    private $controller = 'Home'; // Default controller
    private $method = 'index'; // Default method
    private $params = []; // Set initial empty params array
    private $url;

    public function __construct(){
      $this->url = $this->getUrl();
      // Look in controllers folder for controller
      $this->getController();

      // Check if second part of url is set (method)
      $this->getMethod();
    }

    // Construct URL From $_GET['url']
    private function getUrl()
    {
        if(isset($_GET['url'])){
          $this->url = rtrim($_GET['url'], '/');
          $this->url = filter_var($this->url, FILTER_SANITIZE_URL);
          $this->url = explode('/', $this->url);
          return $this->url;
        }
    }

    private function getController()
    {
        if(isset($this->url[0]))
        {
            if(file_exists('../app/controllers/'.ucwords($this->url[0]).'.php')) {
                // If exists, set as controller
                $this->controller = ucwords($this->url[0]);
                // Unset 0 index
                unset($this->url[0]);
            }
        }

        // Require the current controller
        require_once('../app/controllers/' . $this->controller . '.php');

        // Instantiate the current controller
        $this->controller = new $this->controller;
    }

    private function getMethod()
    {
        if(isset($this->url[1]))
        {
            // Check if method/function exists in current controller class
            if(method_exists($this->controller, $this->url[1])){
                // Set current method if it exsists
                $this->method = $this->url[1];
                // Unset 1 index
                unset($this->url[1]);
            }
        }

        // Get params - Any values left over in url are params
        $this->params = $this->url ? array_values($this->url) : [];

        // Call a callback with an array of parameters
        call_user_func_array([$this->controller, $this->method], $this->params);
    }
  }