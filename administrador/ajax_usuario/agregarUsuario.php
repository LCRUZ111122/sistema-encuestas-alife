<?php

if (isset($_POST['id_usuario']) && isset($_POST['nombres']) && isset($_POST['apellidos']) && isset($_POST['email'])) {
    // Incluir archivo de conexión a base de datos
    include("../../conexion.php");

    // Obtener valores
    $id_usuario  = $_POST['id_usuario'];
    $titulo      = $_POST['nombres'];
    $descripcion = $_POST['apellidos'];
    $fecha_final = $_POST['email'];

    $query = "INSERT INTO usuarios (id_usuario, nombres, apellidos, email)
              VALUES ('$id_usuario', '$nombres', '$apellidos', '$email')";

    $resultado = $connection->query($query);

}
