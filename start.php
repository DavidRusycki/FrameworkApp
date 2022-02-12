<?php
namespace App;
use Components\Route\Route;

$oApp = new App();
$oApp->setController(new Controller\ControllerBase());
$oApp->setRoute(Route::getInstance());
$oApp->init();