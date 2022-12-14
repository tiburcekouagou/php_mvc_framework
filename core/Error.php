<?php

namespace Core;

use Config\Config;

/**
 * Gestionnaire d'erreur et d'exception
 * 
 * PHP version 5.4
 */
class Error {
  /**
   * Gestionnaire d'erreur. Convertis toutes les erreurs en Exception en envoyant une ErrorException
   * @param int $level Niveau de l'erreur
   * @param string $message Message d'erreur
   * @param string $file Nom du fichier d'où provient l'exception
   * @param int $line Numéro de la ligne dans le fichier
   * @throws \ErrorException
   * @return void
   */
  public static function errorHandler($level, $message, $file, $line) {
    if (error_reporting() !== 0) {
      throw new \ErrorException($message, 0, $level, $file, $line);
    }
  }

  /**
   * Gestion d'exception.
   * @param \Exception $exception L'exception
   * @return void
   */
  public static function exceptionHandler($exception) {
    // Le code d'erreur est soit 404 (not found) ou 500 (general error)
    $code = $exception->getCode();
    if ($code !== 404) {
      $code = 500;
    }
    http_response_code($code);

    if (Config::ENVIRONMENT === 'local') {
      echo "<h1>Fatal error</h1>";
      echo "<p>Uncaught exception: '" . get_class($exception) . "'</p>";
      echo "<p>Message: '" . $exception->getMessage() . "'</p>";
      echo "<p>Stack trace:<pre>" . $exception->getTraceAsString() . "</pre></p>";
      echo "<p>Trown in '" . $exception->getLine() . "'</p>";
    } else {
      $log = dirname(__DIR__) . "/logs/" . date("Y-m-d") . ".txt";
      ini_set("error_log", $log);

      $message = "Fatal error";
      $message .= " with message '" . $exception->getMessage() . "'";
      $message .= "\nStack trace: " . $exception->getTraceAsString();
      $message .= "\nThrown in '" . $exception->getFile() . "'on line " . $exception->getLine();

      error_log($message);
      // echo "<h1>Une erreur est survenue</h1>";
      if ($code === 404) {
        // echo "<h1>Page non trouvée</h1>";
        View::render("errors/404.phtml");
      } else {
        // echo "<h1>Une erreur est survenue</h1>";
        View::render("errors/500.phtml");
      }
    }
  }
}
