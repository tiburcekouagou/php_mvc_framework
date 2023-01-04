<?php

namespace App\Controllers;

class HomeController extends \Core\Controller {
    public function indexAction() {
        echo "Hello depuis la fonction index() du controlleur HomeControlleur";
    }
}