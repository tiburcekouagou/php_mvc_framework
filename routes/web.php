<?php

/**
 * ----------------------------------------
 * Routeur
 * ----------------------------------------
 * 
 * Fichier permettant de déclarer l'ensemble des routespossibles
 * Plusieurs format sont permis pour les routes
 * 
 * Exemple 1: Déclarer littéralement une route
 * $router->add("maroute", ["controller" => "TestControlleur", "action" => "testMéthode"])
 * 
 * Cette déclaration cré une route "maroute" qui, une fois rentrée dans le navigateur, 
 * appelle la méthode "testMéthode" du controlleur "TestContrlleur"
 * 
 * 
 * Exemple 2: Déclarer un format global de route
 * $router->add("{controlleur}/{méthode}")
 * 
 * Cette déclaration cré une route qui va correspondre à toutes les routes
 * "admin/show"  : controlleur =   "AdminControlleur"  , méthode = "show"
 * "user/update" : controlleur =   "UserControlleur"   , méthode = "update"
 * "posts/add-new" : controlleur = "PostControlleur"   , méthode = "addNew"
 * 
 * 
 * Exemple 3: Passer un paramètre à la route
 * $route->add("{controlleur}/{:id}/{méthode})
 * Cette déclaration cré une route qui va correspondre à toutes les routes
* "admin/123/show"  : controlleur =   "AdminControlleur"   , paramètre id = 123, méthode = "show"
 * "user/456/update" : controlleur =   "UserControlleur"   , paramètre id = 456, méthode = "update"
 * "posts/abc/add-new" : controlleur = "PostControlleur"   , paramètre id = abc, méthode = "addNew"
 * 
 * Exemple 4: Passer un espace de nom à la route (pour imbriquer dans un dossier)
 * Pour imbriquer les controlleurs dans des dossiers (ex: Controlleur/Admin/UserControlleur.php, Controlleur/Posts/PostControlleur.php), 
 * il faut leur donner un espace de nom,
 * 
 * $router->add("admin/{controller}/{action}", ["namespace" => "Admin"]);
 * 
 * Correspond aux routes
 * "admin/user/get", "admin/user/find", "admin/contact/show"
 * NB: Pour toutes ces routes, les controlleur sont dans le dossier 'app/Controlleur/espaceDeNom'.
 * Donc pour les routes ci-dessus les controlleur UserControlleur 
 * et Contact sont dans le dossier app/Controlleur/Admin
 * 
 */

$router = new Core\Router();

$router->add("", ["controller" => "Home", "action" => "index"]);
$router->add("posts", ["controller" => "Posts", "action" => "index"]);
$router->add("posts/show", ["controller" => "Posts", "action" => "show"]);
$router->add("{controller}/{action}");
$router->add("{controller}/{id:\d+}/{action}");
$router->add("admin/{controller}/{action}", ["namespace" => "Admin"]);