<?php

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
        // ajouter les délimiteurs /^$/
        $route = "/^" . $route . "$/";
        $this->routes[$route] = $params;
    }
    
    /**
     * Permet de faire correspondre la chaîne de requête
     *@param string $url La chaine de requête à faire correspondre
     * @return boolean
     */
    public function match($url) {
        foreach($this->getRoutes() as $route => $param) {
            if (preg_match($route, $url, $matches)) {
                $params = [];
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

    public function getParams() {
        return $this->params;
    }
 }