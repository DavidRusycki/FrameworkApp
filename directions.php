<?php
use Components\Route\Route;

/**
 * Arquivo usado para definir as rotas da aplicação.
 */

Route::getInstance()->define([
    Route::add('inicial/', [new App\Controller\ControllerConsulta(), 'iniciaConsulta'])
]);