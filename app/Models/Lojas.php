<?php

namespace App\Models;

use App\Database\Database;
use PDO;

class Lojas
{
  public static function getAll()
  {
    $database = new Database();
    $pdo = $database->getPDO();

    $sql = "SELECT * FROM lojas";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_OBJ); // Use FETCH_OBJ para consistência

    return $result ? $result : [];
  }

  public static function cadastrarLoja(string $nomeLoja, int $atendenteId, string $status) // Agora aceita um array
  {
    $database = new Database();
    $pdo = $database->getPDO();

    $sql =  "INSERT INTO lojas (nome, atendenteId, status) VALUES (:nomeLoja, :atendenteId, :status)";

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":nomeLoja", $nomeLoja);
    $stmt->bindValue(":atendenteId", $atendenteId);
    $stmt->bindValue(":status", $status);

    if ($stmt->execute()) {
      return true;
    } else {
      return false;
    }
  } //?cadastrarLoja

  public static function excluirLoja(int $id)
  {
    $database = new Database();
    $pdo = $database->getPDO();

    $sql = "DELETE FROM lojas WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT); // Especifique o tipo para segurança

    try {
      return $stmt->execute();
    } catch (\PDOException $e) {
      error_log("Erro ao excluir loja: " . $e->getMessage());
      return false;
    }
  } //? excluir loja

}//! Lojas
