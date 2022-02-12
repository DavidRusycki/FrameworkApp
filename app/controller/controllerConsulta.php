<?php
namespace App\Controller;

class ControllerConsulta 
{

    private string $texto;

    public function __construct($s) 
    {
        $this->texto = $s;
    }

    /**
     * Inicia a consulta.
     */
    public function iniciaConsulta() 
    {
        echo $this->texto;
    }

}
