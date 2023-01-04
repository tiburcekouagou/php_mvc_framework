<?php

namespace Core;

/**
 * Controlleur Frontal
 * PHP version 8.1
 */
 class Router {
    /**
     * Routes de l'application
     * (Table des routes)
     *
     * @var array
     */
    private $routes = [];

    /**
     * Paramètres de la route actuelle
     *
     * @var array
     */
    private $params = [];

    /**
     * Ajouter des routes à la table des routes
     *
     * @param string $url Route
     * @param array $params Paramètres de la route
     * @return void
     */
    public function add($url, $params = []) {
        // transformer les slashes (/) en backslashes (\)
        $route = preg_replace("/\//", "\\\/", $url);
        // transformer les {...} en regex (?<name>[a-z-])
        $route = preg_replace("/\{([a-z-]+)\}/i", "(?<\\1>[a-z-]+)", $route);
        // ajout de paramètres optionnels
        $route = preg_replace("/\{([a-z-]+):([^\}]+)\}/", "(?<\\1>\\2)", $route);
        // ajouter les délimiteurs /^$/
        $route = "/^" . $route . "$/";
        $this->routes[$route] = $params;
    }
    
    /**
     * Permet de faire correspondre la chaîne de requête
     *@param string $url La chaine de requête à faire correspondre
     * @return bool
     */
    public function match($url) {
        foreach($this->getRoutes() as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                // $params = [];
                foreach($matches as $key => $match) {
                    if (is_string($key)) {
                        $params[$key] = $match;
                    }
                }
                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    /**
     * Retourne les routes de l'application
     *
     * @return array
     */
    public function getRoutes() {
        return $this->routes;
    }

    /**
     * Retourne les paramètres de la route actuelle
     *
     * @return array
     */
    public function getParams() {
        return $this->params;
    }

    /**
     * Dispatche la route en essayant d'exécuter la méthode appropriée
     *
     * @param string $url L'URL à dispatcher
     * @return void
     */
    public function dispatch($url) {
        # retirer la chaîne de requête
        $url = $this->removeQueryStringVariables($url);
        
        if($this->match($url)) {
            $controller = $this->params["controller"];
            $controller = $this->convertToStudlyCase($controller) . "Controller";
            $controller = "App\Controllers\\" . $controller;
            
            if (class_exists($controller)) {
                $controller_object = new $controller($this->params);

                $action = $this->convertToCamelCase($this->params["action"]);
                if (is_callable([$controller_object, $action])) {
                    $controller_object->$action();
                } else {
                    echo "Méthode $action() inexistante dans le controlleur $controller";
                }
            } else {
                echo "Le controller de la classe $controller n'existe pas.";
            }
        } else {
            echo "Aucune route ne correspond à \"$url\"";
        }
    }

    /**
     * Convertis une chaine de caractères en PascalCase|StudlyCase
     *
     * @param string $str
     * @return string
     */
    private function convertToStudlyCase($str) {
        return str_replace(" ", "", ucwords(str_replace("-", " ", $str)));
    }

    /**
     * Convertis une chaîne de caractères en camelCase
     *
     * @param string $str
     * @return string
     */
    private function convertToCamelCase($str) {
        return lcfirst($this->convertToStudlyCase($str));
    }

    /**
     * Fonction qui retire la chaine de requête d'une url pour retourn la route uniquement
     * @param string $url - URL à parser
     * @return string
     */
    protected function removeQueryStringVariables($url) {
        if ($url !== '') { # si l'url n'est pas vide
            # séparer l'url en tableau de longeur 2 (nous obtenons ainsi la route 
            # à gauche, puis la chaine de requête à droite)
            $parts = explode('&', $url, 2); 

            if(strpos($parts[0], '=') === false) {
                $url = $parts[0];
            } else {
                $url = '';
            }
        }

        return $url;
    }
 }