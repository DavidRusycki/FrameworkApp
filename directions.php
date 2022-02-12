<?php
use Components\Route\Route;
use App\App;
use App\Controller\ControllerConsulta;

/**
 * Arquivo usado para definir as rotas da aplicação.
 */

Route::getInstance()->define([
    Route::add('/frameworkApp/', [new ControllerConsulta(App::getInstance(), '1 esse é o prieiro'), 'iniciaConsulta']),
    Route::add('/frameworkApp/inicial', [new ControllerConsulta(App::getInstance(), '2 esse não é o prieiro'), 'iniciaConsulta'])
]);