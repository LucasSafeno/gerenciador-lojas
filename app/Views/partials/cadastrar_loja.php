<div id="modalAdicionarLoja" class="modal">
  <div class="modal-conteudo">
    <span class="fechar-modal">&times;</span>
    <h3>Adicionar Nova Loja</h3>
    <form action="/admin/lojas/salvar" method="post">
      <div>
        <label for="nome">Nome da Loja:</label>
        <input type="text" id="nome" name="nome" required>
      </div>
      <div>
        <label for="nome_atendente">Nome do Atendente:</label>
        <input type="text" id="nome_atendente" name="nome_atendente" autocomplete="off" required>
        <ul id="lista_atendentes">
        </ul>
        <input type="hidden" id="atendente_selecionado_id" name="atendenteId"> <small>Selecione um atendente da lista.</small>
      </div>
      <div>
        <label for="status">Status:</label>
        <select id="status" name="status">
          <option value="Ativa">Ativa</option>
          <option value="Inativa">Inativa</option>
        </select>
      </div>
      <button type="submit">Salvar Loja</button>
    </form>
  </div>
</div>

<style>
  /* Estilos básicos para o modal */
  .modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.4);
  }

  .modal-conteudo {
    background-color: #fefefe;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    border-radius: 8px;
    position: relative;
  }

  .fechar-modal {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
  }

  .fechar-modal:hover,
  .fechar-modal:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
  }

  .modal-conteudo h3 {
    margin-top: 0;
  }

  .modal-conteudo div {
    margin-bottom: 10px;
  }

  .modal-conteudo label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
  }

  .modal-conteudo input[type=text],
  .modal-conteudo input[type=number],
  .modal-conteudo select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
  }

  .modal-conteudo button[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 1em;
  }

  .modal-conteudo button[type=submit]:hover {
    background-color: #45a049;
  }

  #lista_atendentes {
    list-style-type: none;
    padding: 0;
    margin: 0;
    border: 1px solid #ccc;
    background-color: white;
    width: 100%;
    box-sizing: border-box;
    position: absolute;
    z-index: 2;
    display: none;
  }

  #lista_atendentes li {
    padding: 8px;
    cursor: pointer;
  }

  #lista_atendentes li:hover {
    background-color: #f0f0f0;
  }
</style>
