<?php

// classe qui nous permettra d'autoloader les classes
spl_autoload_register(function ($className) {
    $root = dirname(__DIR__);
    $file = $root . "/" . str_replace("/\\/", "/", $className) . ".php";
    if(is_readable($file)) {
        require $file;
    }
});

require dirname(__DIR__) . "/routes/web.php";

// url de la requête
$url = $_SERVER["QUERY_STRING"];

$router->dispatch($url);
