<?

    include ("db.php");

    if (isset ($_GET ['id_empleados'])) {
        $id = $_GET ['id_empleados'];
        $query = "SELECT * FROM empleados WHERE id_empleados = $id_empleados";
        $result = mysqli_query ($conn, $query);
        if (mysqli_num_rows ($result) == 1) {
            $row = mysqli_fetch_array ($result);
            $nombres = $row ['nombres'];
            $apellidos = $row ['apellidos'];
            $edad = $row ['edad'];
            $cedula = $row ['cedula'];
        }
    }

    if (isset($_POST['guardar'])) {

        $id = $_GET['id_empleados'];
        $nombres = $_POST['nombres'];
        $apellidos = $_POST['apellidos'];
        $edad = $_POST['edad'];
        $cedula = $_POST['cedula'];

        $query = "UPDATE empleados set nombres = '$nombres', apellidos = '$apellidos', edad = '$edad', cedula = '$cedula' WHERE id_empleados = '$id_empleados'"
        mysqli_query($conn, $query);

        $_SESSION['message'] = 'Empleado actualizado exitosamente';
        $_SESSION['message_type'] = 'success';

        header("Location: index.php");
    }

?>
<?php include ("includes/header.php")?>

<div class = "container p-4"> 

    <div class = "row">
        
        <div class = "col-md-4 mx-auto">
            
            <div class = "card card-body">
                
                <form action = "edit_empleados.php?id_empleados= <?php echo $_GET ['id_empleados']; ?>" method = "POST">
                    
                    <div class = "form-group">
                        <input type = "text" name = "nombres" value = "<?php echo $nombres;?>" class = "form-control" placeholder = "Actualiza los nombres">
                    </div>

                    <div class = "form-group">
                        <input type = "text" name = "apellidos" value = "<?php echo $apellidos;?>" class = "form-control" placeholder = "Actualiza los apellidos">
                    </div>

                    <div class = "form-group">
                        <input type = "text" name = "edad" value = "<?php echo $edad;?>" class = "form-control" placeholder = "Actualiza la edad">
                    </div>

                    <div class = "form-group">
                        <input type = "text" name = "cedula" value = "<?php echo $cedula;?>" class = "form-control" placeholder = "Actualiza la cedula">
                    </div>

                    <button class = "btn - btn-success" name = "guardar">
                        GUARDAR
                    </button>
                    
                </form>

            </div>

       </div>

    </div>

</div>

<?php include ("includes/footer.php")?>