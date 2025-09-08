<?php

class Conection {
    public function connect() {
      $con = new mysqli("mysql.railway.internal", "root", "AaKdPcRRYSeIkjwQVLgkIphdyULKRsJJ", "railway");
      if($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
      }
      return $con;
    }
}


