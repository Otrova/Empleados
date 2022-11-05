<?php 

    include ("db.php");

    if (isset ($_GET ['id_empleado'])) {
        $id = $_GET ['id_empleados'];
        $query = "DELETE FROM empleados WHERE id_empleados = $id_empleados";
        $result = mysqli_query ($conn, $query);

        if (!$result) {
            die("OPERACION FALLIDA!")
        }

        $_SESSION ['message'] = 'El empleado ha sido eliminado exitosamente';
        $_SESSION ['message_type'] = 'success';
        header ("Location : index.php");

    }

?>