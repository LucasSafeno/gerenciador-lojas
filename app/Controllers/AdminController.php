<?php

namespace App\Controllers;

use App\Models\Lojas;
use App\Models\Usuarios;

class AdminController
{
  public function index()
  {
    redirectNotLogin();
    $data = [
      'titulo' => 'Dashboard',
      'usuario' => $_SESSION['usuario'] ?? null, //? Verifica se o usuário está logado
    ];
    view('admin/dashboard', $data);
  } //? index

  public function lojas()
  {
    redirectNotLogin();

    $lojas = Lojas::getAll(); //? Busca todas as lojas do banco de dados

    $data = [
      'titulo' => 'Lojas',
      'usuario' => $_SESSION['usuario'] ?? null, //? Verifica se o usuário está logado
      'lojas' => $lojas, //? Passa as lojas para a view
    ];
    view('admin/lojas/listar', $data);
  } //? lojas

  public  function buscarAtendentes()
  {
    $termo = $_GET['termo'] ?? '';
    $atendentesDisponiveis =  Usuarios::buscarAtendentesDisponiveis($termo);
    header('Content-Type: application/json'); // Certifique-se de que este cabeçalho está presente
    echo json_encode($atendentesDisponiveis);
  } //? buscarAtendentes()

  public function salvar()
  {
    $nomeLoja = filter_input(INPUT_POST, "nome", FILTER_DEFAULT);
    $atendenteId = filter_input(INPUT_POST, "atendenteId", FILTER_DEFAULT);
    $status = filter_input(INPUT_POST, "status", FILTER_DEFAULT);

    if (Lojas::cadastrarLoja($nomeLoja, $atendenteId, $status)) {
      $_SESSION['msg_type'] = "success";
      $_SESSION['msg'] = "Loja cadastrada com sucesso";
      redirect("/admin/lojas");
    } else {
      $_SESSION['msg_type'] = "alert";
      $_SESSION['msg'] = "Erro ao cadastrar Loja";
      redirect("/admin/lojas");
    }
  } //?salvar

  public function excluirLoja(int $id)
  {

    // Não precisa de $_GET['id'] aqui, o $id já é o parâmetro da rota
    if (Lojas::excluirLoja($id)) {
      $_SESSION['success'] = "Loja excluída com sucesso!"; // Padronizado para 'success'
    } else {
      $_SESSION['error'] = "Erro ao excluir Loja."; // Padronizado para 'error'
    }
    redirect("/admin/lojas");
  } //? excluirLoja
}//! AdminController
