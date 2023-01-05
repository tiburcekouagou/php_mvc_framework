<?php

namespace App\Controllers;

use Core\View;
use App\Models\Post;


class PostsController extends \Core\Controller {
    public function index() {
        // appel de la méthode getAll du modèle pour récupérer
        // toutes les données de la table posts
        $posts = Post::getAll();

        View::render("Posts/index.phtml", [
            "posts" => $posts
        ]);
    }

    public function addNew() {
        echo "Hello depuis la fonction addNew() du controlleur PostsControlleur";
    }

    public function show() {
        echo "Hello depuis la fonction show() du controlleur PostControlleur";
    }
}
