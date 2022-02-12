<?php
namespace App;
use Components\Route\Route;

require_once('./vendor/autoload.php');
require_once('./components/functions.php');

$oApp = new App();
$oApp->setController(new Controller\ControllerBase($oApp));
$oApp->setRoute(Route::getInstance());
$oApp->init();