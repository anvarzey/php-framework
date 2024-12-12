<?php

namespace App\Controllers;

use App\Core\Application;

class Controller
{
  public function render(string $path, array $params = [], string $layout = 'main')
  {
    $layoutContent = $this->layoutContent($layout);
    $viewContent = $this->viewContent($path, $params);

    echo str_replace('{{content}}', $viewContent, $layoutContent);
  }

  public function renderView($view, $params)
  {
    $layoutContent = $this->layoutContent();
    $viewContent = $this->viewContent($view, $params);

    return str_replace('{{content}}', $viewContent, $layoutContent);
  }

  protected function layoutContent($layout = '')
  {
    if (!strlen($layout)) {
      $layout = 'main';
    }

    $rootPath = Application::$ROOT_DIR;

    ob_start();

    include_once "{$rootPath}/views/layouts/{$layout}.php";

    return ob_get_clean();
  }

  protected function viewContent($view, $params)
  {
    $rootPath = Application::$ROOT_DIR;

    foreach ($params as $key => $value) {
      $$key = $value;
    }


    ob_start();

    include_once "{$rootPath}/views/{$view}.php";

    return ob_get_clean();
  }
}
