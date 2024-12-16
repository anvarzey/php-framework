<?php

namespace App\Controllers;

use App\Core\Application;
use App\Core\Request;
use App\Core\Validator;

class Auth extends Controller
{

  public function login(Request $request)
  {
    $data = $request->getBody();

    $loginSchema = [
      'email' => ['required', 'string', 'email'],
      'password' => ['required', 'string'],
    ];

    $validator = new Validator();


    $result = $validator->validate($data, $loginSchema);

    if ($result['success'] === true) {
      // -------- Login logic --------

    } else {
      $dataWithErrors = [];

      foreach ($data as $field => $value) {
        $dataWithErrors[$field] = [
          'value' => $value,
          'errors' => $result['errors'][$field] ?? []
        ];
      }

      $this->render('auth/login/show', $dataWithErrors, 'auth');
    }
  }

  public function showLogin()
  {
    $this->render('auth/login/show', [], 'auth');
  }

  public function signup(Request $request)
  {
    $validator = new Validator();

    $data = $request->getBody();

    $signupSchema = [
      'name' => ['required', 'string', 'minLength:2', 'maxLength'],
      'email' => ['required', 'email'],
      'password' => ['required', 'minLength:8', 'maxLength:30'],
      'confirmPassword' => ['required', 'passwordsMatch:password']
    ];

    $result = $validator->validate($data, $signupSchema);

    if ($result['success'] === true) {
      // -------- Signup logic --------

    } else {
      $dataWithErrors = [];

      foreach ($data as $field => $value) {
        $dataWithErrors[$field] = [
          'value' => $value,
          'errors' => $result['errors'][$field] ?? []
        ];
      }

      $this->render('auth/signup/show', $dataWithErrors, 'auth');
    }
  }

  public function showSignup()
  {

    $this->render('auth/signup/show', [], 'auth');
  }
}
