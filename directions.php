<?php
use Components\Route\Route;

/**
 * Arquivo usado para definir as rotas da aplicação.
 */

Route::getInstance()->define([
    Route::add('/frameworkApp/', [new App\Controller\ControllerConsulta('1 esse é o prieiro'), 'iniciaConsulta']),
    Route::add('/frameworkApp/inicial', [new App\Controller\ControllerConsulta('2 esse não é o prieiro'), 'iniciaConsulta'])
]);