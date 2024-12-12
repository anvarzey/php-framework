<?php

namespace App\Controllers;

class Auth extends Controller
{

  public function login() {}

  public function showLogin()
  {
    $this->render('auth/login/show', [], 'auth');
  }

  public function signup() {}

  public function showSignup()
  {

    $this->render('auth/signup/show', [], 'auth');
  }
}
