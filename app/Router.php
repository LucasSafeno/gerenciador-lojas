<?php

namespace App;

class Router
{

  protected static $routes = [];

  public static function add($method, $path, $routes)
  {
    $path = trim($path, '/');
    self::$routes[$method][$path] = $routes;
  } //? add()

  public static function get($path, $callback)
  {
    self::add('GET', $path, $callback);
  } //? get()

  public static function post($path, $callback)
  {
    self::add('POST', $path, $callback);
  } //? post()

  public static function dispatch()
  {
    $uri = $_SERVER['REQUEST_URI'];
    $method = $_SERVER['REQUEST_METHOD'];

    $uri = trim($uri, '/');

    if (isset(self::$routes[$method][$uri])) {
      $callback = self::$routes[$method][$uri];
      self::executeCallback($callback);
      return;
    }

    // Verifica rotas com parâmetros
    foreach (self::$routes[$method] as $route => $callback) {
      $pattern = preg_replace_callback('/\{([a-zA-Z0-9_]+)\}/', function ($match) {
        return '(?P<' . $match[1] . '>[^/]+)';
      }, $route);
      $pattern = '#^' . $pattern . '$#';

      if (preg_match($pattern, $uri, $matches)) {
        $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);
        self::executeCallback($callback, array_values($params));
        return;
      }
    }

    // Rota não encontrada
    view('404', [
      'titulo' => 'Página não encontrada',
      'mensagem' => 'A página que você está procurando não existe ou foi movida.'
    ], false);
  }


  public static function executeCallback($callback, $params = [])
  {
    if (is_callable($callback)) {
      call_user_func_array($callback, $params);
    } elseif (is_array($callback) && count($callback) === 2) {
      $controllerName = $callback[0];
      $methodName = $callback[1];

      // Verifica se o controller existe
      if (class_exists($controllerName)) {
        $controller = new $controllerName;
        if (method_exists($controller, $methodName)) {
          call_user_func_array([$controller, $methodName], $params);
          return;
        } else {
          http_response_code(404);
          echo "Método não encontrado: {$methodName} no controller {$controllerName}";
          return;
        }
      } else {
        echo "Controller não encontrado: {$controllerName}";
        return;
      }
    } else {
      echo "Callback inválido uri : {$callback}";
      return;
    }
  } //? executeCallback

}
