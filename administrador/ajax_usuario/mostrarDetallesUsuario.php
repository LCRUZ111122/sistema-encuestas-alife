<?php

include("../../conexion.php");

if (isset($_POST['id_usuario']) && isset($_POST['id_usuario']) != "") {
    // Obtener id_usuario
    $id_usuario = $_POST['id_usuario'];

    // Obtener detalles de la encuesta
    $query = "SELECT * FROM usuarios WHERE id_usuario = '$id_usuario'" ;
    if (!$result = mysqli_query($connection, $query)) {
        exit(mysqli_error($connection));
    }
    $response = array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $response = $row;
        }
    }
    else {
        $response['status'] = 200;
        $response['message'] = "Información no encontrada!";
    }
    // display JSON data
    echo json_encode($response) ;
}
else {
    $response['status'] = 200;
    $response['message'] = "Consulta Invalida!";
}