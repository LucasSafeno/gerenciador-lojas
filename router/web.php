<?php

use App\Router;

use App\Controllers\HomeController;
use App\Controllers\AdminController;
use App\Controllers\LojasController;

Router::get('/', [HomeController::class, 'index']);
Router::post('/autenticar', [HomeController::class, 'autenticar']);

//Admin
Router::get('/admin/dashboard', [AdminController::class, 'index']);

// Lojas  - Admin
Router::get('/admin/lojas', [AdminController::class, 'lojas']);
Router::post('/admin/lojas/salvar', [AdminController::class, 'salvar']);
Router::post('/admin/lojas/excluir/{id}', [AdminController::class, 'excluirLoja']);
Router::get('/admin/buscar-atendentes/', [AdminController::class, 'buscarAtendentes']);


//Logout
Router::get('/logout', function () {
  unset($_SESSION['usuario']);
  header('Location: /');
  exit;
});
