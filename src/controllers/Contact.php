<?php

namespace App\Controllers;

class Contact extends Controller
{

  public function index()
  {
    $this->render('contact/index');
  }

  public function store() {}
}
