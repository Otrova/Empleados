<?php include("db.php") ?>
<?php include("includes/header.php") ?>

<div class = "container p-4"> 
    
    <div class = "row"> 
    
        <div class = "col-md-4"> 

            <?php if (isset ($_SESSION ['message'])) { ?>
                <div class="alert alert-<?= $_SESSION ['message_type'];?> alert-dismissible fade show" role="alert">
                <?= $_SESSION ['message'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden = "true" >&times;</span>
                </button> 
                </div>
            <?php session_unset(); } ?>
            
            <div class = "card card-body"> 
                
                <form action = "save_empleados.php" method = "POST"> 
                   
                    <div class = "form-group"> 
                        <input type = "text" name = "nombres" class = "form-control" placeholder = "Nombres" autofocus>
                    </div>
                    
                    <div class = "form-group"> 
                        <input type = "text" name = "apellidos" class = "form-control" placeholder = "Apellidos" autofocus>
                    </div>
                    
                    <div class = "form-group"> 
                        <input type = "text" name = "edad" class = "form-control" placeholder = "Edad" autofocus>
                    </div>
                    
                    <div class = "form-group"> 
                        <input type = "text" name = "cedula" class = "form-control" placeholder = "Cedula" autofocus>
                    </div>
                
                    <input type = "subnit" class = "btn btn-success btn-block" name = "save_empleados" value = "GUARDAR EMPLEADO">

                </form>
           
            </div>

        </div>

        </div class = "col-md-8">
                
                <table class = "table table bordered"> 
                    
                    <thead> 
                        <tr> 
                            <th>NOMBRES</th>
                            <th>APELLIDOS</th>
                            <th>EDAD</th>
                            <th>FECHA INGRESO</th>
                            <th>CEDULA</th>
                            <th>ACCIONES</th>
                        </tr>
                    </thead>

                    <tbody> 
                        <?php
                        
                        $query = "SELECT * FROM empleados";
                        $result_empleados = mysqli_query ($conn, $query);

                        while ($row = mysqli_fetch_array ($result_empleados)) { ?>
                            <tr>
                                <td> <?php echo $row ['nombres'] ?> </td>
                                <td> <?php echo $row ['apellidos'] ?> </td>
                                <td> <?php echo $row ['edad'] ?> </td>
                                <td> <?php echo $row ['fecha_ingreso'] ?> </td>
                                <td> <?php echo $row ['cedula'] ?> </td>
                                <td>
                                    <a href = "edit_empleados.php?id_empleado = <?php echo $row ['id_empleado']?>" class = "btn btn-secondary">EDITAR</a>
                                    <a href = "delete_empleados.php?id_empleado = <?php echo $row ['id_empleado']?>" class = "btn btn-danger">ELIMINAR</a>
                                </td>
                            </tr>
                        <?php } ?>

                    </tbody>

                </table>

        </div>
    
    </div>
    
</div>

<?php include("includes/footer.php") ?>
 