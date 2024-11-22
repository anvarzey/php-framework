<?php

namespace App\Controllers;

class Contact extends Controller
{

  public function index()
  {
    $params = [
      'name' => 'Pollito'
    ];

    $this->render('contact/index.php', $params);
  }
}
