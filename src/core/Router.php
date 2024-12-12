<?php

namespace App\Core;

class Router
{

  public Request $request;
  public Response $response;
  protected array $routes = [];

  public function __construct(Request $request, Response $response)
  {
    $this->request = $request;
    $this->response = $response;
  }

  public function get($path, $callback)
  {

    $this->routes['get'][$path] = $callback;
  }

  public function post($path, $callback)
  {

    $this->routes['post'][$path] = $callback;
  }

  public function put($path, $callback)
  {

    $this->routes['put'][$path] = $callback;
  }

  public function patch($path, $callback)
  {

    $this->routes['patch'][$path] = $callback;
  }

  public function delete($path, $callback)
  {

    $this->routes['delete'][$path] = $callback;
  }

  public function resolve()
  {
    $path = $this->request->getPath();
    $method = $this->request->getMethod();

    $callback = $this->routes[$method][$path] ?? false;

    if ($callback === false) {
      $this->response->setStatusCode(404);

      echo 'Page not found';

      die();
    }

    if (is_array($callback)) {
      $controller = new $callback[0];

      call_user_func([$controller, $callback[1]], $this->request, $this->response);
    } else {
      echo call_user_func($callback, $this->request, $this->response);
    }

    exit();
  }
}
