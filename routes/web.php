<?php

$router = new Core\Router();

$router->add("", ["controller" => "Home", "action" => "index"]);
$router->add("posts", ["controller" => "Posts", "action" => "index"]);
$router->add("posts/show", ["controller" => "Posts", "action" => "show"]);
$router->add("{controller}/{action}");
$router->add("admin/{controller}/{action}");
$router->add("{controller}/{id:\d+}/{action}");