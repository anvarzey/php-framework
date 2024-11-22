<?php

namespace App\Controllers;

class Controller
{
  public function render(string $path, array $params = [])
  {
    foreach ($params as $key => $value) {
      $$key = $value;
    }

    include_once(__DIR__ . "/../views/$path");
  }
}
