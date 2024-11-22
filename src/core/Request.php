<?php

namespace App\Core;

class Request
{
  public function getPath()
  {
    $path = $_SERVER['REQUEST_URI'] ?? '/';

    $queryMark = strpos($path, '?');

    if ($queryMark === false) {
      return $path;
    }

    return substr($path, 0, $queryMark);
  }

  public function getMethod()
  {
    return strtolower($_SERVER['REQUEST_METHOD']);
  }
}
