<?php

// classe qui nous permettra d'autoloader les classes
spl_autoload_register(function ($className) {
    $root = dirname(__DIR__);
    $file = $root . "/" . str_replace("/\\/", "/", $className) . ".php";
    if (is_readable($file)) {
        require $file;
    }
});
echo "<pre>";
$router = new Core\Router();
$url = $_SERVER["QUERY_STRING"];
echo "La chaine de requête est \"$url\"";

$router->add("", ["controller" => "Home", "action" => "index"]);
$router->add("posts", ["controller" => "Posts", "action" => "index"]);
$router->add("posts/show", ["controller" => "Posts", "action" => "show"]);
$router->add("{controller}/{action}");
$router->add("{controller}/{id:\d+}/{action}");
$router->add("admin/{controller}/{action}", ["namespace" => "Admin"]);

var_dump($router->getRoutes());


$router->dispatch($url);
