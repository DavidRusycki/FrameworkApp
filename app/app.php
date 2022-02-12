<?php
namespace App;
use Components\FacadeDb\Manager;
/**
 * Classe que representa a aplicação.
 * @author David Rusycki
 * @since 11/02/2022
 */
class App 
{

    private static $instance;
    private $Controller;
    private \Components\Route\Route $Route;
    private $DbManagers = [];

    public function __construct() 
    {
        self::$instance = $this;
    }

    public function init() 
    {
        $this->getController()->redirect();
    }

    /**
     * Retorna a instância do app.
     * @return self;
     */
    public static function getInstance() 
    {
        if (empty(self::$instance)) {
            self::$instance = new Self();
        }
        return self::$instance;
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

    /**
     * Get the value of DbManagers
     */ 
    public function getDbManagers()
    {
        return $this->DbManagers;
    }

    /**
     * Set the value of DbManagers
     *
     * @return  self
     */ 
    public function setDbManagers($DbManagers)
    {
        $this->DbManagers = $DbManagers;

        return $this;
    }

    /**
     * Adiciona uma gerenciador de banco de dados.
     */
    public function addDbManager($oManager) 
    {
        $this->DbManagers[] = $oManager;
        return $this;
    }

    /**
     * Aceita como valores os valores definidos na classe \Manager
     * @param int $iType - Tipo do banco de dados.
     * @return Manager
     */
    public function getDbManager(int $iType) 
    {
        $xRetorno = null;
        foreach($this->getDbManagers() as $oManager) {
            if ($oManager->getType() == $iType) {
                $xRetorno = $oManager;
                break;
            }
        }
        return $xRetorno;
    }

}