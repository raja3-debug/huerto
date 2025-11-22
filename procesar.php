<?php
include "funcion.php";
if(isset($_POST["confirmar"])){
    $conn=conexion_bd();
    $nombre = trim(filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING)); 
    $tipo = trim(filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_STRING));
    $dias_cosecha = filter_input(INPUT_POST, 'dias_cosecha', FILTER_VALIDATE_INT);
   
    if (empty($nombre) || empty($tipo) || $dias_cosecha === false || $dias_cosecha === null) {
        echo "Complete todos los campos correctamente";
    } else {
        $sql = "INSERT INTO cultivo (nombre, tipo, dias_cosecha) VALUES ('$nombre', '$tipo', '$dias_cosecha')";
        if (mysqli_query($conn, $sql)) {
        echo "Cultivo creado correctamente";
        } else {
            echo "Error al crear el cultivo: " . $conn->error;
        }
        if(isset($conn)){
            $conn->close();
        }
    }
    

}

?>
