<?php

include("../../conexion.php");

if (isset($_POST)) {
    // Obtener valores
    $id_usuario    = $_POST['id_usuario'];
    $nombres         = $_POST['nombres'];
    $apellidos   = $_POST['apellidos'];
    $email    = $_POST['email'];

    // Modificar producto
    $query = "
        UPDATE usuarios SET
        nombres      = '$nombres',
        apellidos = '$apellidos',
        email = '$email' 
        WHERE id_usuario   = '$id_usuario'
    ";
    if (!$result = mysqli_query($connection, $query)) {
        exit(mysqli_error($connection));
    }
}