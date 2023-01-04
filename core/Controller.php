<?php

namespace Core;

/**
 * Controlleur de base
 * PHP version 5.4
 */
abstract class Controller
{
        /**
         * Les paramètres de la route correspondante
         * @var array
         */
        protected $route_params = [];

        /**
         * Constructeur de la classe
         * @param array $route_params
         */
        public function __construct($route_params)
        {
                $this->route_params = $route_params;
        }

        /**
         * Méthode magique s'exécutant quand une méthode est
         * inexistante ou inaccessible
         * 
         * @param string $name - le nom de la méthode que l'on veut appeler
         * @param mixed $args - les arguments de la méthode
         * 
         * @return void
         */
        public function __call($name, $args)
        {
                $method = $name . "Action";

                if (method_exists($this, $method)) {
                        if ($this->before() !== false) {
                                call_user_func_array([$this, $method], $args);
                                $this->after();
                        }
                } else {
                        echo "La méthode $method est inexistante dans le controlleur " . get_class($this);
                }
        }

        /**
         * Filtre before. S'exécute avant chaque méthode
         * 
         * @return bool
         */
        protected function before()
        {
                echo "### before### ";
                return true;
        }

        /**
         * Filtre after. S'exécute après chaque méthode
         * 
         * @return bool
         */
        protected function after()
        {
                echo "### after### ";
                return true;
        }
}
