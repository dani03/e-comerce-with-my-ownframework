<?php
namespace App\core;


class Application {

  public Router $router;
  public Request $request;
  public Response $response;
  public static $ROOT_DIRECTORY;
  public static Application $app;

  public function __construct($rootPath)
  {
    self::$ROOT_DIRECTORY = $rootPath;
    $this->request = new Request();
    $this->response = new Response();
    self::$app = $this;
    $this->router = new Router($this->request, $this->response);
  }

  public function run(){
    echo $this->router->resolve();
  }
}