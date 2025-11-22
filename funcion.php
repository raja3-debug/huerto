<?php
function conexion_bd() {
    $servidor = "localhost";
    $user = "root";
    $password = "";
    $bd = "huerta_db";
    $conn = new mysqli($servidor, $user, $password, $bd);
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    return $conn;
}
?>
