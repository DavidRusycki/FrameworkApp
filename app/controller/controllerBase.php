<?php
namespace App\Controller;
/**
 * Classe de controller base.
 * @author David Rusycki
 * @since 11/02/2022
 */
class ControllerBase implements interfaceController
{

    private \App\App $App;

    /**
     * Construtor da classe.
     */
    public function __construct(\App\App $oApp = null) 
    {
        $this->setApp($oApp);
    }

    /**
     * Realiza o redirecionamento de acordo com as rotas da aplicação.
     */
    public function redirect() 
    {
        $this->getApp()->getRoute()->setUrl($_SERVER["REQUEST_URI"]);
        $this->getApp()->getRoute()->goToRoute();
    }

    /**
     * Get the value of App
     */ 
    public function getApp()
    {
        return $this->App;
    }

    /**
     * Set the value of App
     *
     * @return  self
     */ 
    public function setApp($App)
    {
        $this->App = $App;

        return $this;
    }
}