<?php

namespace App\Routes;

use App\Core\Router;
use App\Controllers\Contact as ContactController;
use App\Controllers\Home as HomeController;

class Web
{
  protected Router $router;

  public function __construct(Router $router)
  {
    $this->router = $router;
  }

  public function run()
  {
    $this->router->get('/', [HomeController::class, 'index']);

    $this->router->get('/contact', [ContactController::class, 'index']);
  }
}
