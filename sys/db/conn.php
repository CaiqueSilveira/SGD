<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_sgd";

  //Conecta-se ao banco de dados MySQL
  $mysqli = new mysqli($servername, $username, $password, $dbname);
  mysqli_set_charset($mysqli,"utf8");

  if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());

?>