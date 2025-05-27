<?php

function view(string $view, array $data = [], bool $useLayout = true)
{


  $viewPath = dirname(__FILE__, 2) . '/app/Views/' . $view . '.php';


  if (file_exists($viewPath)) {
    // extrai os dados para variaveis locais dentro da view
    extract($data);
    if ($useLayout) {
      $content = $viewPath;
      require __DIR__ . '/../app/Views/templates/master.php';
    } else {
      require $viewPath;
    }
  } else {
    die("View não encontrada: {$viewPath}");
  }
}
