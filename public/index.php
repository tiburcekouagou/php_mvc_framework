<?php

require "../core/Router.php";

$router = new Router();
$url = $_SERVER["QUERY_STRING"];
echo "La chaine de requête est \"$url\"";

$router->add("", ["controller" => "Home", "action" => "index"]);
$router->add("posts", ["controller" => "Posts", "action" => "index"]);
$router->add("posts/show", ["controller" => "Posts", "action" => "show"]);

var_dump($router->getRoutes());


if ($router->match($url)) {
    var_dump($router->getParams());
} else {
    echo "Aucune route correspondant à \"$url\"";
}