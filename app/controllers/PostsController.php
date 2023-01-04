<?php

namespace App\Controllers;

use Core\View;


class PostsController extends \Core\Controller
{
    public function index()
    {
        View::render("Posts/index.phtml", [
            "posts" => [
                "Titre de l'article 1",
                "Titre de l'article 2",
                "Titre de l'article 3"
            ]
        ]);
    }

    public function addNew()
    {
        echo "Hello depuis la fonction addNew() du controlleur PostsControlleur";
    }

    public function show() {
        echo "Hello depuis la fonction show() du controlleur PostControlleur";
    }
}
