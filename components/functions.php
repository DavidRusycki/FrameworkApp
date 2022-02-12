<?php

/**
 * Arquivo de funções do sistema.
 */

function get($sParam) 
{
    return $_GET[$sParam] ?: null;
}