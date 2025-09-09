<?php

class Conection {
    public function connect() {
      $con = new mysqli("mysql-cp7h.railway.internal", "root", "VVXATdKixIImPGMIOuXeuhkoaACtOgqY", "railway");
      if($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
      }
      return $con;
    }
}
// public __construct(
//     ?string $hostname = null,
//     ?string $username = null,
//     #[\SensitiveParameter] ?string $password = null,
//     ?string $database = null,
//     ?int $port = null,
//     ?string $socket = null
// )





