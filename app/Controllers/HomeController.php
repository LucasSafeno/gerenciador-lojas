<?php

namespace App\Controllers;

use App\Models\Usuarios;

class HomeController
{
  public function index()
  {

    $data = [
      'titulo' => 'Bem-vindo ao AtualTech',
    ];
    view('home', $data);
  } //? index()

  public function autenticar()
  {
    $autenticado = Usuarios::auth();

    if ($autenticado) {
      //? Se o usuário estiver autenticado, redireciona para a página de dashboard
      header('Location: /admin/dashboard');
      exit;
    } else {
      //? Se não estiver autenticado, redireciona para a página de login
      $_SESSION['error'] = 'Usuário ou senha inválidos';
      header('Location: /');
      exit;
    }
  } //? autenticar()
}//! HomeController
