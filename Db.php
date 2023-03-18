<?php
class Db {
  private $host = 'localhost';
  private $user = 'root';
  private $pass = '';
  private $db_name = 'test';

  protected function connect() {
    return mysqli_connect($this->host, $this->user, $this->pass, $this->db_name);
  }
}

class User extends Db {
  public function __construct() {
    $connection = $this->connect();
    mysqli_query($connection, "
    CREATE TABLE IF NOT EXISTS user (
      id INT AUTO_INCREMENT PRIMARY KEY,
      name VARCHAR(100),
      last_name VARCHAR(100)
    );
    ");
  }

  private function redirect($url, $code=301) {
    header('location:'.$url, true, $code);
  }

  public function insert($name, $last_name) {
    $connection = $this->connect();
    mysqli_query($connection, "INSERT INTO user(name, last_name) VALUES ('$name', '$last_name');");
    $this->redirect('./');
  }

  public function get_all() {
    $connection = $this->connect();
    $result = mysqli_query($connection, "SELECT * FROM user;");
    return $result;
  }

  public function update($id, $name, $last_name) {
    $connection = $this->connect();
    mysqli_query($connection, "
      UPDATE user
      SET
        name = '$name',
        last_name = '$last_name'
      WHERE
        id = $id;
    ");

    $this->redirect('./');
  } 

  public function remove($id) {
    $connection = $this->connect();
    mysqli_query($connection, "DELETE FROM user WHERE id = $id;");
    $this->redirect('./');
  }
}