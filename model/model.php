<?php
class userModel {
  private string $name;
  private string $number;
  private string $email;
  
  public function __construct($name = "", $number = "", $email = null) {
    $this->name = $name;
    $this->number = $number;
    $this->email = $email;
  }

  public function selectData($number = null) {
    require_once 'connection.php';
    $con = new Conection();
    $con = $con->connect();

    $sql = $number ? "SELECT * FROM user WHERE `number` = '$number'" : "SELECT * FROM user";
    $result = $con->query($sql);
    if (!$result->num_rows) return false;
    $rows = $result->fetch_all();
    $fields = $result->fetch_fields();
    $data = [];

    for ($i=0; $i < count($rows); $i++) {
      $arr = [];

      for ($q = 0; $q < count($fields); $q++) $arr[$fields[$q]->name] = $rows[$i][$q];

      array_push($data, $arr);
    }

    // print_r($data);

    $con->close();
    $result->close();
    return $data;
  }

  public function insertData() {
    require_once 'connection.php';
    $con = new Conection();
    $conn = $con->connect();

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO user (name, number, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $this->name, $this->number, $this->email);
    if(!$stmt->execute()) {
      return false;
    }
    $stmt->close();
    $conn->close();
    return true;
  }

  public function deleteData() {
    require_once 'connection.php';
    $con = new Conection();
    $conn = $con->connect();

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    if (!$this->number) return false;
    $sql = "DELETE FROM user WHERE number = $this->number";

    if ($conn->query($sql)) {
      return true;
    } else {
      return false;
    }
  }
}


?>


