<?php

namespace App\Database;

class Database
{
  protected static $pdo;
  public function getPDO()
  {
    try {
      if (!self::$pdo) {

        self::$pdo = new \PDO("mysql:host=" . HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        self::$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        self::$pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);

        return self::$pdo;
      }
    } catch (\PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
      die();
    }

    return self::$pdo;
  }
}
