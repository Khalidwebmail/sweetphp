<?php

trait LoadView
{
    public function view($view, $data=[])
    {
        if(file_exists("../app/Views/".$view.".php"))
        {
            require_once "../app/Views/".$view.".php";
        }
        else{
            die("This view does not exist");
        }
    }
}