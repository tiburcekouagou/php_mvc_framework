<?php

namespace Core;

/**
 * View
 * PHP version 5.4
 */
class View {

  /**
   * Retourne une vue
   * @param string $view - la vue à retourner (ex: "Home/index.php")
   * @param array $args - les paramètres à passer à la vue
   * 
   * @return void
   */
  public static function render($view, $args = []) {
    // envoyer les arguments dans la table des symbols
    extract($args, EXTR_SKIP);

    $file = "../app/Views/$view";

    if (is_readable($file)) {
      require $file;
    } else {
      echo "$file non trouvé";
    }
  }
}