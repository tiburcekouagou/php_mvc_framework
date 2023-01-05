<?php

namespace Core;

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
    echo "<h1>Fatal error</h1>";
    echo "<p>Uncaught exception: '" . get_class($exception) . "'</p>";
    echo "<p>Message: '" . $exception->getMessage() . "'</p>";
    echo "<p>Stack trace:<pre>" . $exception->getTraceAsString() . "</pre></p>";
    echo "<p>Trown in '" . $exception->getLine() . "'</p>";
  }
}
