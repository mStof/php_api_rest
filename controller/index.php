<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

  function controller ($state) {
    require_once '../model/model.php';
    $name = $_GET['name'] ?? "";
    $number = $_GET['number'] ?? "";
    $email = $_GET['email'] ?? "";
    $model = new userModel($name, $number, $email);
    
    switch ($state) {
      case "delete":
        return $model->deleteData();
      case "insert":
        return $model->insertData();
      case "select":
         return $model->selectData($number);
      default:
    }
    
  }
  $result = controller(isset($_GET['action']) ? $_GET['action'] : "select" );
  echo json_encode($result);
echo "<p>Hello</p>"


?>  

