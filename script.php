<?php 
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php   
        if(isset( $_POST["guardar"])){
               //isset verifica si una variable está definida y no es null

                // Recuperar los valores del formulario y guardarlos en variables
                $claveEmpleado = $_POST['clave_empleado'];
                $nombreEmpleado = $_POST['nombre_emp'];
                $apellidoPaterno = $_POST['a_paterno'];
                $apellidoMaterno = $_POST['a_materno'];
                $idPuesto = $_POST['id_puesto'];
                $fechaIngreso = $_POST['fecha_ingreso']; 
                $fechaBaja = $_POST['fecha_baja'];
                $status = $_POST['status'];

        }

        $sql = "INSERT INTO empleados (clave_empleado,nombre_emp,a_paterno,a_materno,id_puesto,fecha_ingreso,fecha_baja,status)
        VALUES('$claveEmpleado','$nombreEmpleado','$apellidoPaterno','$apellidoMaterno','$idPuesto','$fechaIngreso','$fechaBaja','$status')";
        
   
        $resultado = $conexion -> query($sql);

        if($resultado) {
            echo "consulta exitosa";
        }else {
            echo "consulta fallida";
        }

        

    
    ?>
    
</body>
</html>