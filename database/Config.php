<?php

namespace Database;

/**
 * Configurqtion de l'application
 * 
 * PHP version 5.4
 */
class Config {
  /**
   * Nom du serveur
   * @var string
   */
  const DB_HOST = 'localhost';
  /**
   * Nom de la BDD
   * @var string
   */
  const DB_NAME = 'php_mvc_framework';
  /**
   * Username de la BDD
   * @var string
   */
  const DB_USER = 'root';
  /**
   * Mot de la passe de la BDD
   * @var string
   */
  const DB_PASSWORD = 'root';
  /**
   * Afficher ou cacher les erreurs
   * si l'application est en production, définir SHOW_ERRORS = false
   * si l'application est en local, définir SHOW_ERRORS = true
   * @var bool
   */
  const SHOW_ERRORS = false;
}
