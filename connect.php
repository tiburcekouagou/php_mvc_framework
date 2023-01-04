<?php

/**
 * Vérifier que les détails de connection à la BDD sont OK
 * 
 * ### Script temporaire qui sera supprimer avant de mettre en live !
 * 
 */

 /**
  * Données de connection à la BDD
  */
$host = "localhost";
$db_name = "php_mvc_framework";
$user = "root";
$password = "";

try {
  /**
   * Créer une connection à la BDD
   */
  $conn = new \PDO("mysql:host=$host;dnname=$db_name;", $user, $password);
  if ($conn) {
    echo "Connection OK !";
  }
} catch(\PDOException $e) {
  echo $e->getMessage();
  exit();
}


/**
 * Vérifier que la connection est ok
 */