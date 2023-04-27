<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "alifeencuestas";

// Creamos la conexión
$connection = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($connection,"utf8");

// Verificamos la conexión
if ($connection->connect_error) {
    die("Conexión fallida: " . $connection->connect_error);
} else {
	// echo "Conexión exitosa";
}