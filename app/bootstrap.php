<?php

  // Load Core file
  require_once "Config/config.php";

  spl_autoload_register(function ($className) {
      require_once 'Libraries/'. $className . '.php';
  });
