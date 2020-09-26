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
        $this->controller = new $this->controller();

        $this->getMethod();

        $this->params = $this->url ? array_values($this->url) : [];
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    private function getMethod()
    {
        if(isset($this->url[1]))
        {
            if(method_exists($this->controller, $this->url[1]))
            {
                $this->method = $this->url[1];
                unset($this->url[1]);
            }
        }
    }
}

$init = new Core();