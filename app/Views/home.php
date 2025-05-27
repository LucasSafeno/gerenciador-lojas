<div class="form">
  <form action="/autenticar" method="post">
    <input type="email" name="email" id="email" placeholder="Digite seu e-mail" required>
    <input type="password" name="password" id="password" placeholder="Digite sua senha" required>

    <button type="submit">Entrar</button>
    <?php if (isset($_SESSION['error'])): ?>
      <p class="error"><?= $_SESSION['error'];
                        unset($_SESSION['error']); ?></p>
    <?php endif; ?>
  </form>
</div>
