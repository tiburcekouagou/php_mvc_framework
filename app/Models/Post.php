<?php

namespace App\Models;

use Core\Model;


class Post extends Model
{
  /**
   * Récupérer tous les articles dans la BDD
   * @return mixed
   */
  public static function getAll()
  {
    $host = "localhost";
    $db_name = "php_mvc_framework";
    $username = "root";
    $password = "";

    try {
      $db = new \PDO("mysql:host=$host;dbname=$db_name;charset=utf8;", $username, $password);
      $stmt = $db->query('SELECT id, title, content FROM posts ORDER BY created_at');
      $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);

      return $results;
    } catch(\PDOException $e) {
      echo $e->getMessage();
    }
  }
}