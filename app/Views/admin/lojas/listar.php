<h2>Lojas</h2>

<div class="listar">
  <a href="#" id="abrirModalAdicionarLoja"> + Adicionar Loja</a>

  <?php include "../app/Views/partials/cadastrar_loja.php"; ?>
  <?php if (isset($_SESSION['msg'])): ?>
    <div class="alert alert-<?php echo $_SESSION['msg_type'] ?? 'info'; ?>">
      <?php echo $_SESSION['msg']; ?>
    </div>
    <?php unset($_SESSION['msg']); // Limpa a mensagem da sessão
    ?>
  <?php endif; ?>

  <?php
  if (empty($lojas)):
  ?>
    <div class="alert alert-danger">Não há lojas cadastradas</div>
  <?php else:  ?>


    <table border="1">
      <tr>
        <th>Nome</th>
        <th>Atendente</th>
        <th>Status</th>
        <th>Ações</th>
      </tr>
      <tr>
        <?php foreach ($lojas as $loja): ?>
          <tbody>

            <td><?= $loja->nome; ?></td>
            <td>
              <?php
              $atendente = \App\Models\Usuarios::getInfoUser($loja->atendenteId);
              if ($atendente) {
                echo $atendente->firstName . ' ' . $atendente->lastName;
              } else {
                echo 'Atendente não encontrado';
              }
              ?>
            </td>
            <td><?= ucfirst($loja->status) ?></td>
            <td>
              <a href="#"> Editar</a> |
              <form action="/admin/lojas/excluir/<?= htmlspecialchars($loja->id) ?>" method="POST" style="display:inline;">
                <button type="submit" onclick="return confirm('Tem certeza que deseja excluir esta loja?');" style="background:none; border:none; color:red; cursor:pointer; padding:0; font-size:inherit;"> Excluir</button>
              </form>
            </td>

          </tbody>
        <?php endforeach; ?>
      </tr>
    </table>
</div>

<?php endif; ?>
<script src="/js/script.js"></script>
