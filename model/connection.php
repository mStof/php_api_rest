<?php

class Conection {
    public function connect() {
      $con = new mysqli("sql300.infinityfree.com", "if0_39604736", "6i5mPuy7VbEP", "if0_39604736_test");
      if($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
      }
      return $con;
    }
}

