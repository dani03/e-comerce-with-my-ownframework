<?php


namespace App\controllers;

use App\core\Application;
use App\core\controller;
use App\core\Request;

class ContactController extends controller
{

  public  function index(){
  
    // return Application::$app->router->view('contact');
   return $this->render('contact');
  }

    public  function create(Request $request){ //handle
      dd($_POST);
        return $this->render('contact');

    }
}