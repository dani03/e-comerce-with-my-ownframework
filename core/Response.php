<?php 
namespace App\core;
class Response {

  public function statusCode(int $code){

    http_response_code($code);

  }
}