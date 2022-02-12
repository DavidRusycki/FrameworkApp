<?php
namespace App;
use Components\Route\Route;

require_once('./vendor/autoload.php');

$oApp = new App();
$oApp->setController(new Controller\ControllerBase($oApp));
$oApp->setRoute(Route::getInstance());
$oApp->init();