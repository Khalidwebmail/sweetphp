<?php

class Page{

    public function __construct()
    {
        echo "page loaded";
    }

    public function about($id)
    {
        print "This given id is". $id;
    }
}