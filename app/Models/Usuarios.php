<?php

namespace App\Models;

use App\Database\Database;

class Usuarios
{
  protected $pdo;

  public static function getAll()
  {
    $database = new Database();
    $pdo = $database->getPDO();

    $sql = "SELECT * FROM usuarios";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    return $result = $stmt->fetchAll(\PDO::FETCH_OBJ);
  } //? getAll()

  public static function auth()
  {
    $database = new Database();
    $pdo = $database->getPDO();

    if (!isset($_POST['email']) || !isset($_POST['password'])) {
      return false; //? Se não tiver email ou senha, retorna falso
    }
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
      return false; //? Se o email não for válido, retorna falso
    }
    if (empty($_POST['email']) || empty($_POST['password'])) {
      return false; //? Se o email ou senha estiverem vazios, retorna falso
    }

    $sql = "SELECT * FROM usuarios WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':email', $_POST['email']);

    $stmt->execute();

    $user = $stmt->fetch();

    if ($user && password_verify($_POST['password'], $user->password)) {
      $_SESSION['usuario'] = $user;
      return true;
    } else {
      return false;
    }
  } //? auth()

  public static function getCargo(int $id)
  {
    $database = new Database();
    $pdo = $database->getPDO();

    $sql = "SELECT
              c.cargo
            FROM
              usuarios u
            JOIN
              cargo c ON u.cargoId = c.id
            WHERE
              u.id = :id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
    $stmt->execute();

    $result = $stmt->fetch(\PDO::FETCH_OBJ);
    if ($result) {
      return $result->cargo;
    } else {
      return 'Sem cargo';
    }
  } //? getCargo()

  public static function getInfoUser(int $atendenteId)
  {
    $database = new Database;
    $pdo = $database->getPDO();

    $sql = "
          SELECT u.firstName, u.lastName
          FROM usuarios u
          WHERE u.id = :atendenteId
      ";

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':atendenteId', $atendenteId, \PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetch(\PDO::FETCH_OBJ);
  } //? getInfoUser

}
