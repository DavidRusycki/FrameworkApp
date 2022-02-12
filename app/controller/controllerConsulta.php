<?php
namespace App\Controller;
use Components\FacadeDb\Postgres;
use Components\FacadeDb\Manager;
use App\App;

class ControllerConsulta 
{

    private string $texto;
    private App $App;

    public function __construct($oApp, $s) 
    {
        $this->App = $oApp;
        $this->texto = $s;
    }

    /**
     * Inicia a consulta.
     */
    public function iniciaConsulta() 
    {
        echo $this->texto;
        var_dump($this->getPostgres()->select('select * from tbcidade', Manager::OBJECT));
    }

    public function getPostgres() 
    {
        return $this->getApp()->getDbManager(Manager::POSTGRES);
    }

    /**
     * Get the value of oApp
     */ 
    public function getApp() : App
    {
        return $this->App;
    }

    /**
     * Set the value of oApp
     *
     * @return  self
     */ 
    public function setApp(App $oApp)
    {
        $this->App = $oApp;

        return $this;
    }

}
