<?php

namespace App\Core;

include_once 'helpers.php';

class Application
{
  public Router $router;
  public Request $request;
  public Response $response;
  public static string $ROOT_DIR;

  public function __construct($rootPath)
  {
    self::$ROOT_DIR = $rootPath;
    $this->request = new Request();
    $this->response = new Response();

    $this->router = new Router($this->request, $this->response);
  }

  public function run()
  {

    $this->router->resolve();
  }
}
