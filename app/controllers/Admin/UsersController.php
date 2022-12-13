<?php

namespace App\Controllers\Admin;

class UsersController {
  public function index() {
    echo "<p>Paramètres de la chaîne de requête <pre>" .
      htmlspecialchars(print_r($_GET, true))
      . "</pre></p>";
  }
}
