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
    public function add($url, $params) {
        $this->routes[$url] = $params;
    }
    
    /**
     * Permet de faire correspondre la chaîne de requête
     *@param string $url La chaine de requête à faire correspondre
     * @return boolean
     */
    public function match($url) {
        foreach($this->getRoutes() as $route => $param) {
            if ($route === $url) {
                $this->params[$url] = $param;
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