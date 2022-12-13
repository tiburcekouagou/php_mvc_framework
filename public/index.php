<?php

require "../core/Router.php";

$router = new Router();
$url = $_SERVER["QUERY_STRING"];
echo "La chaine de requête est \"$url\"";