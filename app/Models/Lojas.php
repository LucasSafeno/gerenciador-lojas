<?php

namespace App\Models;

use App\Database\Database;

class Lojas
{
  public static function getAll()
  {

    $database = new Database();
    $pdo = $database->getPDO();

    $sql = "SELECT * FROM lojas";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $result = $stmt->fetchAll();

    if ($result) {
      return $result;
    } else {
      return [];
    }
  } //? getAll()
}
