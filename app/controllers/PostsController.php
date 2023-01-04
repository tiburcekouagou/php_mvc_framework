<?php

namespace App\Controllers;

class PostsController
{
    public function index()
    {
        echo "Hello depuis la fonction index() du controlleur PostsControlleur";
    }

    public function addNew()
    {
        echo "Hello depuis la fonction addNew() du controlleur PostsControlleur";
    }

    public function show() {
        echo "Hello depuis la fonction show() du controlleur PostControlleur";
    }
}
