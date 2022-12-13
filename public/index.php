<?php

require "../core/Router.php";
require "../app/controllers/HomeController.php";
require "../app/controllers/PostsController.php";

$router = new Router();
$url = $_SERVER["QUERY_STRING"];
echo "La chaine de requête est \"$url\"";

$router->add("", ["controller" => "Home", "action" => "index"]);
$router->add("posts", ["controller" => "Posts", "action" => "index"]);
$router->add("posts/show", ["controller" => "Posts", "action" => "show"]);
$router->add("{controller}/{action}");
$router->add("admin/{controller}/{action}");
$router->add("{controller}/{id:\d+}/{action}");

var_dump($router->getRoutes());


$router->dispatch($url);