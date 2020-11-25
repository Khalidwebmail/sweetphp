<?php

class HomeController extends Controller
{
    public function index()
    {
        $value = ['title' => 'This is welcome page'];
        return $this->view('welcome', $value);
    }
}