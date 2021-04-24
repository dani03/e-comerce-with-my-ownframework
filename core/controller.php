<?php
namespace App\core;
use App\core\Application;

class controller {

  public function render($view, $parametres = []){
    return Application::$app->router->view($view, $parametres);

  }
}