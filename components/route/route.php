<?php
namespace Components\Route;
use Exception;
/**
 * Classe de rotas.
 * @author David Rusycki
 * @since 11/02/2022
 */
class Route  
{
    
    private static self $instance;
    private array $rotas = [];

    private string $path;
    private object $controller;
    private string $method;
    private string $url;

    /**
     * Construtor da classe.
     */
    public function __construct(string $sString = null, array $aInfos = null) {
        if (!empty($sString) && !empty($aInfos)) {
            if ($this->validaInfos($aInfos)) {
                $this->setPath($sString)->setController(reset($aInfos))->setMethod(end($aInfos));
            }
        }
    }

    /**
     * Valida as informações passadas.
     */
    private function validaInfos($aInfos) {
        if (!is_object(reset($aInfos)) || !is_string(end($aInfos)) || !method_exists(reset($aInfos), end($aInfos)) || !count($aInfos) == 2) {
            throw new Exception('Verifique as informações de rota.');
        }
        return true;
    }

    /**
     * Realiza o carregamento das rotas.
     */
    public function loadRoutes() 
    {
        require_once('.\directions.php');
    }

    /**
     * Retorna uma instancia da classe.
     */
    public static function getInstance() : self
    {
        if (empty(self::$instance)) {
            self::$instance = new self();
            self::$instance->loadRoutes();
        }
        return self::$instance;
    }

    /**
     * Seta as rotas.
     * @param array $aArray - Lista de rotas
     */
    public function define($aArray) {
        $this->setRotas($aArray);
    }

    /**
     * Adiciona uma rota.
     * Deve-se passar como segundo parametro um array contendo o controller da rota e o método a ser chamado neste.
     * @param string $sString - Caminho / Rota
     * @param array $aInfos - Array contendo o controller e método a ser chamado caso a rota seja esta.
     */
    public static function add(string $sString, array $aInfos) : self {
        return new self($sString, $aInfos);
    }

    /**
     * Realiza o processamento para encontrar o controller através da URL indicada.
     */
    public function goToRoute() : bool
    {
        $bFound = false;
        foreach($this->getRotas() as $oRoute) {
            if ($oRoute->getPath() == $this->getCleanUrl($this->getUrl())) {
                $bFound = true;
                $oSubject = $oRoute->getController();
                $sMethod = $oRoute->getMethod();
                break;
            }
        }

        if ($bFound) {
            $oSubject->{$sMethod}();
        }
        else {
            echo '404 Not Found';
        }

        return true;
    }

    /**
     * Retorna a url sem os parametros GET
     */
    private function getCleanUrl($sUrl) {
        $aExplode = explode('?', $sUrl);
        return reset($aExplode);
    }

    /**
     * Get the value of path
     */ 
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set the value of path
     *
     * @return  self
     */ 
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get the value of controller
     */ 
    public function getController()
    {
        return $this->controller;
    }

    /**
     * Set the value of controller
     *
     * @return  self
     */ 
    public function setController($controller)
    {
        $this->controller = $controller;

        return $this;
    }

    /**
     * Get the value of method
     */ 
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * Set the value of method
     *
     * @return  self
     */ 
    public function setMethod($method)
    {
        $this->method = $method;

        return $this;
    }

    /**
     * Get the value of rotas
     */ 
    public function getRotas()
    {
        return $this->rotas;
    }

    /**
     * Set the value of rotas
     *
     * @return  self
     */ 
    public function setRotas(array $rotas)
    {
        $this->rotas = $rotas;

        return $this;
    }

    /**
     * Get the value of url
     */ 
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set the value of url
     *
     * @return  self
     */ 
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

}

