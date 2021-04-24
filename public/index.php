<?php

use App\controllers\AuthController;
use App\controllers\ContactController;
use App\controllers\HomeController;
use App\core\Router;
use App\core\Application;

require_once __DIR__. "/../vendor/autoload.php";

$app = new Application(dirname(__DIR__));

$app->router->get('/', [HomeController::class, 'index']);
$app->router->get('/contact', [ContactController::class , 'index']);
$app->router->post('/contact', [ContactController::class, 'create']);

//connexion 
$app->router->get('/login', [AuthController::class, 'login']);
$app->router->post('/login', [AuthController::class, 'login']);
$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'register']);
$app->run();