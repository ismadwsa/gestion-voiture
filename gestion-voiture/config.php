<?php
// Script de connexion à la base de donnée
$servername = "sql-server.k8s-3i34ktdy";
$username = "gestioncarman";
$password = "davidmarie2016";

try {
    $conn = new PDO("mysql:host=$servername;dbname=voiturecarman", $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
