<?php
$servername = "localhost";
$username = "root";
$password = "123456";

$conn = new PDO("mysql:host=$servername;dbname=restaurante_bd", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>