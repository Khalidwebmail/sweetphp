<?php

/**
 * Create URL and load controllers
 * URL pattern - /controller/mehod/params
 */
class Core
{
    private $controller = "Home";
    private $method = "index";
    private $params = [];
    private $url = null; 

    public function __construct()
    {
        $this->getUrl();
        $this->getController();

    }

    private function getUrl()
    {
        if(isset($_GET['url']))
        {
            $this->url = rtrim($_GET['url'], '/');
            $this->url = filter_var($this->url, FILTER_SANITIZE_URL);
            $this->url = explode("/", $this->url);
            return $this->url;
        }
    }

    private function getController()
    {
        if(file_exists("../app/controllers/".ucwords($this->url[0]).".php"))
        {
            $this->controller = ucwords($this->url[0]);
            unset($this->url[0]);
        }

        require_once "../app/controllers/".$this->controller.".php";
        return $this->controller = new $this->controller();
    }
}

$init = new Core();