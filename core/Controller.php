<?php

namespace Core;

/**
 * Controlleur de base
 * PHP version 5.4
 */
abstract class Controller {
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
}