<?php
namespace App\controllers;

use App\core\Application;
use App\core\controller;

class HomeController extends controller {

  public  function index(){
    $parametres = [
      'name' => 'passy'
    ];
    // return Application::$app->router->view('home', $parametres);
   return $this->render('home', $parametres);
  }
}