<?php
function redirect(string $url)
{
  header("Location:{$url}");
  exit;
} //? redirect()

function redirectNotLogin()
{

  if (!isset($_SESSION['usuario']) || empty($_SESSION['usuario'])) {
    redirect('/');
    exit();
  }
  if ($_SESSION['usuario']->cargoId === 1) {
    redirect('https://www.google.com');
    exit();
  }
  if ($_SESSION['usuario']->cargoId === 2) {
    redirect('https://www.youtube.com');
    exit();
  }
} //? redirectNotLogin()
