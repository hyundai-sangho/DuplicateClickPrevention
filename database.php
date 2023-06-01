<?php

/* php dotenv 사용을 위해 vendor 폴더 내부의 autoload.php require 함. */
require_once "vendor/autoload.php";

/* php dotenv 사용법 */
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
class Database
{
  private $host;
  private $user;
  private $password;
  private $dbname;
  private $conn;

  public function __construct()
  {
    $this->host = $_ENV['DB_HOST'];
    $this->user = $_ENV['DB_USER'];
    $this->password = $_ENV['DB_PASSWORD'];
    $this->dbname = $_ENV['DB_NAME'];
  }

  public function connection()
  {
    try {
      $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->password);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      echo '연결 에러: ' . $e->getMessage();
    }

    return $this->conn;
  }

  public function getTodoName()
  {
    $sql = "SELECT * FROM todo";

    $stmt = $this->connection()->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
  }


  public function todoInsert($todoName)
  {
    $sql = "INSERT INTO todo (name) VALUES (:todoName)";
    $stmt = $this->connection()->prepare($sql);
    $stmt->bindParam(':todoName', $todoName);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }

  public function countViews($views, $id)
  {
    $sql = "UPDATE todo SET views = :views + 1 WHERE id = :id";
    $stmt = $this->connection()->prepare($sql);
    $stmt->bindParam(':views', $views);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
      return "true";
    } else {
      return "false";
    }
  }
}




?>
