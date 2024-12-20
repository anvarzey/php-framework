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

  public function getBody()
  {
    $body = [];

    if ($this->getMethod() === 'get') {
      foreach ($_GET as $key => $value) {
        $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
      }
    }

    if ($this->getMethod() === 'post') {
      foreach ($_POST as $key => $value) {
        $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
      }
    }

    return $body;
  }
}
