document.addEventListener('DOMContentLoaded', function () {
  var modalAdicionarLoja = document.getElementById('modalAdicionarLoja');
  var btnAbrirModal = document.getElementById('abrirModalAdicionarLoja');
  var spanFecharModal = document.getElementsByClassName('fechar-modal')[0];

  // Evento para abrir o modal
  if (btnAbrirModal) {
    btnAbrirModal.onclick = function () {
      if (modalAdicionarLoja) {
        modalAdicionarLoja.style.display = 'block';
      }
    };
  }

  // Evento para fechar o modal ao clicar no 'x'
  if (spanFecharModal) {
    spanFecharModal.onclick = function () {
      if (modalAdicionarLoja) {
        modalAdicionarLoja.style.display = 'none';
      }
    };
  }

  // Evento para fechar o modal ao clicar fora dele
  window.onclick = function (event) {
    if (modalAdicionarLoja) {
      if (event.target == modalAdicionarLoja) {
        modalAdicionarLoja.style.display = 'none';
      }
    }
  };
});
