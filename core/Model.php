<?php

namespace Core;

use PDO;
use Database\Config;

abstract class Model {
  protected static function getDB() {
    static $db = null;

    if ($db === null) {
      $dsn = "mysql:host=" . Config::DB_HOST . ";dbname=" . Config::DB_NAME . ";charset=utf8;";
      $db = new PDO($dsn, Config::DB_USER, Config::DB_PASSWORD);

      // Lever une exception quand elle survient
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      return $db;
    }
  }
}
