document.addEventListener('DOMContentLoaded', function () {
  var modalAdicionarLoja = document.getElementById('modalAdicionarLoja');
  var btnAbrirModal = document.getElementById('abrirModalAdicionarLoja');
  var spanFecharModal = document.getElementsByClassName('fechar-modal')[0];
  var nomeAtendenteInput = document.getElementById('nome_atendente');
  var listaAtendentes = document.getElementById('lista_atendentes');
  var atendenteSelecionadoIdInput = document.getElementById(
    'atendente_selecionado_id'
  );

  // Função para buscar atendentes
  function buscarAtendentes(termo) {
    if (termo.length < 1) {
      // Não busca se o termo for muito curto
      listaAtendentes.style.display = 'none';
      return;
    }

    fetch('/admin/buscar-atendentes?termo=' + termo)
      .then((response) => response.json())
      .then((data) => {
        listaAtendentes.innerHTML = ''; // Limpa a lista
        data.forEach((atendente) => {
          var li = document.createElement('li');
          li.textContent = atendente.firstName + ' ' + atendente.lastName;
          li.dataset.atendenteId = atendente.id;
          li.style.cursor = 'pointer';
          li.onclick = function () {
            nomeAtendenteInput.value = this.textContent;
            atendenteSelecionadoIdInput.value = this.dataset.atendenteId;
            listaAtendentes.style.display = 'none'; // Esconde a lista após a seleção
          };
          listaAtendentes.appendChild(li);
        });
        if (data.length > 0 && termo.length > 0) {
          listaAtendentes.style.display = 'block';
        } else {
          listaAtendentes.style.display = 'none';
        }
      });
  }

  // Evento para abrir o modal
  if (btnAbrirModal) {
    btnAbrirModal.onclick = function () {
      if (modalAdicionarLoja) {
        modalAdicionarLoja.style.display = 'block';
        nomeAtendenteInput.value = ''; // Limpa o campo ao abrir
        atendenteSelecionadoIdInput.value = ''; // Limpa o ID selecionado
        buscarAtendentes(''); // Carrega todos os atendentes disponíveis inicialmente (opcional)
      }
    };
  }

  // Evento para fechar o modal ao clicar no 'x'
  if (spanFecharModal) {
    spanFecharModal.onclick = function () {
      if (modalAdicionarLoja) {
        modalAdicionarLoja.style.display = 'none';
        listaAtendentes.style.display = 'none';
      }
    };
  }

  // Evento para fechar o modal ao clicar fora dele
  window.onclick = function (event) {
    if (event.target == modalAdicionarLoja) {
      modalAdicionarLoja.style.display = 'none';
      listaAtendentes.style.display = 'none';
    }
  };

  // Evento para buscar atendentes ao digitar no input
  if (nomeAtendenteInput) {
    nomeAtendenteInput.addEventListener('input', function () {
      buscarAtendentes(this.value);
    });

    // Esconde a lista quando o input perde o foco (com um pequeno delay para permitir cliques)
    nomeAtendenteInput.addEventListener('blur', function () {
      setTimeout(function () {
        listaAtendentes.style.display = 'none';
      }, 200);
    });

    // Mostra a lista novamente ao focar no input
    nomeAtendenteInput.addEventListener('focus', function () {
      if (this.value.length > 0 && listaAtendentes.children.length > 0) {
        listaAtendentes.style.display = 'block';
      }
    });
  }
});
