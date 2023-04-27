<?php
// Validar consulta
if (isset($_POST['id_usuario']) && isset($_POST['id_usuario']) != "") {
    // Incluir archivo de conexión a base de datos
    include("../../conexion.php");

    // Obtener id_encuesta
    $id_usuario = $_POST['id_usuario'];

    // Eliminar encuesta
    $query = "DELETE FROM usuarios WHERE id_usuario = '$id_usuario'";
    $resultado = $connection->query($query);
}
