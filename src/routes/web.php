<?php

namespace App\Routes;

use App\Core\Router;
use App\Controllers\Auth as AuthController;
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

    $this->router->post('/contact', [ContactController::class, 'store']);

    $this->router->get('/login', [AuthController::class, 'showLogin']);

    $this->router->post('/login', [AuthController::class, 'login']);

    $this->router->get('/signup', [AuthController::class, 'showSignup']);

    $this->router->post('/signup', [AuthController::class, 'signup']);
  }
}
