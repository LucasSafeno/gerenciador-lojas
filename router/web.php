<?php

use App\Router;

use App\Controllers\HomeController;
use App\Controllers\AdminController;

Router::get('/', [HomeController::class, 'index']);
Router::post('/autenticar', [HomeController::class, 'autenticar']);

//Admin
Router::get('/admin/dashboard', [AdminController::class, 'index']);

// Lojas  - Admin
Router::get('/admin/lojas', [AdminController::class, 'lojas']);


//Logout
Router::get('/logout', function () {
  unset($_SESSION['usuario']);
  header('Location: /');
  exit;
});
