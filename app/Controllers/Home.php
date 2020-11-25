<?php

class Home extends Controller
{
    public function index()
    {
        $value = ['title' => 'This is welcome page'];
        // var_dump($value);
        // exit;
        return $this->view('welcome', $value);
    }
}