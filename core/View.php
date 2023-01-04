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
   * @return void
   */
  public static function render($view) {
    $file = "../app/Views/$view";
    
    if (is_readable($file)) {
      require $file;
    } else {
      echo "$file non trouvé";
    }
  }
}