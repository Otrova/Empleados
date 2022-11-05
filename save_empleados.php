<?php

include ("db.php");

if (isset ($ POST ['save_empleados'])) {
    $nombres = $_POST ['nombres'];
    $apellidos = $_POST ['apellidos'];
    $edad = $_POST ['edad'];
    $cedula = $_POST ['cedula'];

    $query = "INSERT INTO empleados (nombres, apellidos, edad, cedula) VALUES ('$nombres', '$apellidos', '$edad', '$cedula')";
    $result = mysqli_query ($conn, $query);

    if (!$result) {
        die("OPERACION FALLIDA"); 
    }

    $_SESSION ['message'] = 'DATOS GUARDADOS';
    $_SESSION ['message-type'] = 'success';


    header ("Location: index.php");

}

?>