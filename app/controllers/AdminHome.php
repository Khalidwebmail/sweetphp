<?php


class AdminHome extends Controller
{
    public function index()
    {
        return $this->view('admin/index');
    }
}