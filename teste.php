<?php
require "vendor/autoload.php";

use App\Database\Database;

$database = new Database();
$pdo = $database->getPDO();

$senhaHash = password_hash('123', PASSWORD_DEFAULT);

$sql = "INSERT INTO lojas (nome, atendenteId, telefone, status) VALUES (:nome, :atendenteId, :telefone, :status)";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':nome', 'Loja 3');
$stmt->bindValue(':atendenteId', 1);
$stmt->bindValue(':telefone', '123456789');
$stmt->bindValue(':status', 'ativo');
if ($stmt->execute()) {
  echo "Loja inserida com sucesso!";
} else {
  echo "Erro ao inserir loja: " . implode(", ", $stmt->errorInfo());
}
