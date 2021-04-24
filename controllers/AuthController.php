<?php
namespace App\controllers;
use App\core\controller;
use App\core\Request;

class AuthController extends controller {


  public function login(){
    
    return $this->render('login');
  }

  public function register(Request $request){
   
    
    if($request->isPost()){
      
      return "ici je vais recuperer les data";
    }

    return $this->render('register');
  }
}
