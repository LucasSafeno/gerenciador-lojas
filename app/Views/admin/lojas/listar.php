<h2>Lojas</h2>

<div class="listar">
  <a href="#"> + Adicionar Loja</a>
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
            <a href="#"> Excluir</a>
          </td>

        </tbody>
      <?php endforeach; ?>
    </tr>
  </table>
</div>
