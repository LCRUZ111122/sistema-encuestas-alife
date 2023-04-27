<?php

include("../../conexion.php");

if (isset($_POST)) {
    // Obtener valores
    $id_encuesta    = $_POST['id_usuario'];
    $titulo         = $_POST['nombres'];
    $descripcion    = $_POST['apellidos'];
    $fecha_final    = $_POST['email'];

    // Modificar producto
    $query = "
        UPDATE usuarios SET
        titulo      = '$nombres',
        descripcion = '$apellidos',
        fecha_final = '$email' 
        WHERE id_encuesta   = '$id_usuario'
    ";
    if (!$result = mysqli_query($connection, $query)) {
        exit(mysqli_error($connection));
    }
}