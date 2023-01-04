<?php

namespace App\Controllers;

use Core\View;

class HomeController extends \Core\Controller {
    public function indexAction() {
        echo "Hello depuis la fonction index() du controlleur HomeControlleur";
        View::render("Home/index.php");
    }

}