<?php 
namespace App\core;
class Request {


  public function getPath(){
    $_path = $_SERVER['REQUEST_URI'] ?? '/';
    //ensuite on regarde la position du ?
    $position = strpos($_path, '?');
    if ($position === false){
      return $_path;
    }

    return substr($_path, 0, $position);
  }

  public function getMethod(){
      $theMethod = strtolower($_SERVER['REQUEST_METHOD']);
      return $theMethod;
      
  }
  public function isGet(){
    return $this->getMethod() === 'get';
  }
  public function isPost(){
    return $this->getMethod() === 'post';
  }

  public function getBodyContent(){

    $body = [];
    if ($this->getMethod() === 'get') {
      foreach ($_GET as $key => $value) {
        $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
      }
    }
    if ($this->getMethod() === 'post') {
      foreach ($_GET as $key => $value) {
        $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
      }
    }
    return $body;
  }
}