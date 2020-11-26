<?php
class Database
{
  private $usuario;
  private $servidor;
  private $senha;
  private $db;

  public function __construct()
  {
    $this->usuario = "root";
    $this->servidor = "localhost";
    $this->senha = "";
    $this->db = "PI";
  }
  public function connect()
  {
    $conn = mysqli_connect($this->servidor, $this->usuario, $this->senha, $this->db);
    return $conn;
  }
  public function query($queryString)
  {
    $conn = $this->connect();
    $result = mysqli_query($conn, $queryString);
    if ($result) {
      return $result;
    } else {
      return false;
    }
  }
}
