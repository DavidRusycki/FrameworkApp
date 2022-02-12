<?php
namespace App;
/**
 * Classe que representa a aplicação.
 * @author David Rusycki
 * @since 11/02/2022
 */
class App 
{

    private $Controller;
    private \Components\Route\Route $Route;

    public function init() 
    {
        $this->getController()->redirect();
    }

    /**
     * Get the value of Controller
     */ 
    public function getController()
    {
        return $this->Controller;
    }

    /**
     * Set the value of Controller
     *
     * @return  self
     */ 
    public function setController($Controller)
    {
        $this->Controller = $Controller;

        return $this;
    }

    /**
     * Get the value of Route
     */ 
    public function getRoute()
    {
        return $this->Route;
    }

    /**
     * Set the value of Route
     *
     * @return  self
     */ 
    public function setRoute($Route)
    {
        $this->Route = $Route;

        return $this;
    }

}