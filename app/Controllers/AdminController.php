<?php

namespace App\Controllers;

use App\Models\Lojas;
use App\Models\Usuarios;

class AdminController
{
  public function index()
  {
    redirectNotLogin();
    $data = [
      'titulo' => 'Dashboard',
      'usuario' => $_SESSION['usuario'] ?? null, //? Verifica se o usuário está logado
    ];
    view('admin/dashboard', $data);
  } //? index

  public function lojas()
  {
    redirectNotLogin();

    $lojas = Lojas::getAll(); //? Busca todas as lojas do banco de dados

    $data = [
      'titulo' => 'Lojas',
      'usuario' => $_SESSION['usuario'] ?? null, //? Verifica se o usuário está logado
      'lojas' => $lojas, //? Passa as lojas para a view
    ];
    view('admin/lojas/listar', $data);
  } //? lojas
}
