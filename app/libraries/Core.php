<?php

/**
 * Core class
 * Create url and load controller
 * URL pattern - /controller/method/?params
 * @property $controller load current controller
 * @property $method load current method
 * @property $params contain given data with view
 * but it is optional
 */
class Core {
    private $controller = "Home";
    private $method = "index";
    private $params = [];

    public function __construct()
    {
        $this->getUrl();
    }
    
    /**
     * getUrl
     *
     * @return void
     */
    private function getUrl()
    {
        echo $_GET["url"];
    }
}