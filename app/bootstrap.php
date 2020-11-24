<?php

  // Load Core file
  require_once "Config/config.php";

  spl_autoload_register(function ($class) {
    require_once 'Libraries/'. $class . '.php';
  });
