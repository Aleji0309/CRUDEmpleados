
<?php 

    include 'db.php';    
    
    function create($conexion){

        if(true) {
        //if(isset( $_POST['clave_empleado']) and isset(($_POST['nombre_emp']))  and isset(($_POST['a_paterno'])) ){
            //isset verifica si una variable está definida y no es null

             // Recuperar los valores del formulario y guardarlos en variables
            //  $claveEmpleado = $_POST['clave_empleado'];
            //  $nombreEmpleado = $_POST['nombre_emp'];
            //  $apellidoPaterno = $_POST['a_paterno'];
            //  $apellidoMaterno = $_POST['a_materno'];
            //  $idPuesto = $_POST['id_puesto'];
            //  $fechaIngreso = $_POST['fecha_ingreso']; 
            //  $fechaBaja = $_POST['fecha_baja'];
            //  $status = $_POST['status'];

             $claveEmpleado = '333333333';
             $nombreEmpleado = 'Joana';
             $apellidoPaterno = 'Gonzales';
             $apellidoMaterno = 'Ramirez';
             $idPuesto = 10;
             $fechaIngreso = '2024-04-08'; 
             $fechaBaja = '2025-04-08'; 
             $status = 1;


             $sql = "INSERT INTO empleados (clave_empleado,nombre_emp,a_paterno,a_materno,id_puesto,fecha_ingreso,fecha_baja,status)
                     VALUES('$claveEmpleado','$nombreEmpleado','$apellidoPaterno','$apellidoMaterno','$idPuesto','$fechaIngreso','$fechaBaja','$status')";

                     
            $resultado = $conexion->query($sql);

            if($resultado) {
                echo "consulta exitosa";
            }else {
                echo "consulta fallida";
            }
        }

     } 
    
    

     function read($conexion){

        if(true){
            $sql = "SELECT *  FROM empleados";
        }

        $resultado = $conexion->query($sql);

        // Imprimie la información de los titulos
        echo "<pre>";  
        echo str_pad("ID", 5);
        echo str_pad("Clave", 10);
        echo str_pad("Nombre", 15);
        echo str_pad("A. Paterno", 15);
        echo str_pad("A. Materno", 15);
        echo str_pad("Puesto", 10);
        echo str_pad("Ingreso", 12);
        echo str_pad("Baja", 12);
        echo str_pad("Status", 8);
        echo "\n";
        echo str_repeat("-", 100) . "\n"; // línea separadora

        // Imprime la información de la base de datos
        echo "<pre>"; 
        while ($fila = $resultado->fetch_assoc()) {
            echo str_pad($fila['id_empleado'], 5);
            echo str_pad($fila['clave_empleado'], 10);
            echo str_pad($fila['nombre_emp'], 15);
            echo str_pad($fila['a_paterno'], 15);
            echo str_pad($fila['a_materno'], 15);
            echo str_pad($fila['id_puesto'], 10);
            echo str_pad($fila['fecha_ingreso'], 12);
            echo str_pad($fila['fecha_baja'], 12);
            echo str_pad($fila['status'], 8);
            echo "\n";
        }

        echo "</pre>";

     }

    read($conexion);
     //create($conexion);
?>
    
