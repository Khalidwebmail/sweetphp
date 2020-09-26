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

    public function __construct()
    {
        $this->getUrl();
    }

    private function getUrl()
    {
        var_dump($_GET['url']);
    }
}