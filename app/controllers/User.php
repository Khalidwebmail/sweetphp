<?php


class User extends Controller
{
    public function index()
    {
        return $this->view('admin/users/index');
    }
}