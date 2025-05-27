<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php

          use App\Models\Usuarios;

          echo $titulo ?? 'AtualTech' ?></title>
  <link rel="stylesheet" href="/css/style.css">

</head>

<body>
  <header>
    <?php if (isset($_SESSION['usuario'])): ?>
      <div class="logadowith">
        <p>Você está logado como <?= \App\Models\Usuarios::getCargo($_SESSION['usuario']->id) ?> </p>
      </div>
    <?php endif; ?>

    <h1><?= $_ENV['TITLE'] ?></h1>
    <nav>
      <?php if (!isset($_SESSION['usuario'])): ?>
        <a href="/suporte">Suporte</a> | <a href="https://www.atualtech.online" target="_blank">AtualTech</a>
      <?php else: ?>
        <a href="/admin/dashboard">Dashboard</a> | <a href="/admin/lojas">Lojas</a> | <a href="/funcionarios">Funcionários</a> | <a href="#">Relatórios</a> |<a href="/suporte">Suporte</a> | <a href="/logout">Sair </a>
      <?php endif; ?>
    </nav>
  </header>

  <div class="container">
    <?php if (isset($content)) : ?>
      <?php require $content; ?>
    <?php else : ?>
      <p>Conteúdo não definido.</p>
    <?php endif; ?>
  </div>

  <footer>
    <p>&copy; <?php echo date('Y'); ?> <?= $_ENV['TITLE'] ?></p>
  </footer>
</body>

</html>
