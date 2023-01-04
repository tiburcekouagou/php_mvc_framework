<?php

namespace App\Controllers;


class PostsController extends \Core\Controller
{
    public function index()
    {
        echo "<pre>";
        echo "Hello depuis la fonction index() du controlleur PostsControlleur";
        var_dump($this->route_params);
    }

    public function addNew()
    {
        echo "Hello depuis la fonction addNew() du controlleur PostsControlleur";
    }

    public function show() {
        echo "Hello depuis la fonction show() du controlleur PostControlleur";
    }
}
