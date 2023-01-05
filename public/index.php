<?php

// classe qui nous permettra d'autoloader les classes
spl_autoload_register(function ($className) {
    $root = dirname(__DIR__);
    $file = $root . "/" . str_replace("/\\/", "/", $className) . ".php";
    if (is_readable($file)) {
        require $file;
    }
});

/**
 * Gestion des erreurs et des exceptions
 */
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');

/**
 * Chargement des routes
 */
require dirname(__DIR__) . "/routes/web.php";

// url de la requête
$url = $_SERVER["QUERY_STRING"];

$router->dispatch($url);
