<?php 
namespace App\core;

class Router {

    protected array $routes = [];
    public Request $request;
    public Response $response;


      public function get($chemin, $callback){
              $this->routes['get'][$chemin] = $callback;
      }

      public function post($chemin, $callback){
        $this->routes['post'][$chemin] = $callback;
      }

      public function __construct(Request $request, Response $response)
      {
        $this->request = $request;
        $this->response = $response;
      }


      public function resolve(){
        $path =  $this->request->getPath();
        $method = $this->request->getMethod();
        //on passe ensuite le chemin et la methode 
        
        $callback = $this->routes[$method][$path] ?? false;

        if ($callback === false) {
          $this->response->statusCode(404);
          return $this->view('notfound');
          
        }

        if(is_string($callback)){
          //si c'est une string on retourne la vue
         return $this->view($callback);
        }
        if (is_array($callback)){
          $callback[0] = new $callback[0];
        }
        // dd($callback);
        return call_user_func($callback, $this->request);
      }

      public function view($laview, $params = []){ //renderView
        $originalView = strtolower($laview);
        $layout = $this->layoutContenu();

        $viewContent = $this->renderOnlyView($laview, $params);
        //ensuite on remplace la view par la un caractere precis par la vu qu'on veut
        return str_replace("{{content}}", $viewContent, $layout);
        
      }

      protected function layoutContenu(){
        // dd(Application::$ROOT_DIRECTORY);
        ob_start();
        include_once Application::$ROOT_DIRECTORY."/views/layouts/main.blade.php";
       return ob_get_clean();
      }
      protected function renderOnlyView($view, $params){
        foreach ($params as $key => $value) {
          //ici on ve
          $$key = $value;
        }
        ob_start();
        include_once(Application::$ROOT_DIRECTORY."/views/$view.blade.php");
       return ob_get_clean();
      }
}