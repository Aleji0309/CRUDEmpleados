
<?php 

    include 'db.php';    

    
    function read($conexion){ // Función para leer los valores a la base de datos 

        if(true){
            $sql = "SELECT *  FROM empleados";
        }

        $resultado = $conexion->query($sql);

        // Crear arreglo vacio para luego llenarlo
        $empleados = [];

        // Agrega los datos al arreglo vacio 
        while ($fila = $resultado->fetch_assoc()) {
            $empleados[] = $fila;
          
        }

        header('Content-Type: application/json');
        echo json_encode($empleados);
     }
    
    function create($conexion) { // Función para insertar nuevos valores a la base de datos 

        if (isset($_POST['clave_empleado']) && isset($_POST['nombre_emp']) && isset($_POST['a_paterno']) 
            && isset($_POST['a_materno']) && isset($_POST['id_puesto']) && isset($_POST['fecha_ingreso']) 
            && isset($_POST['fecha_baja']) && isset($_POST['status'])) {
    
            // Recuperar los valores del formulario
            $claveEmpleado = $_POST['clave_empleado'];
            $nombreEmpleado = $_POST['nombre_emp'];
            $apellidoPaterno = $_POST['a_paterno'];
            $apellidoMaterno = $_POST['a_materno'];
            $idPuesto = $_POST['id_puesto'];
            $fechaIngreso = $_POST['fecha_ingreso']; 
            $fechaBaja = $_POST['fecha_baja'];
            $status = $_POST['status'];
    
            $sql = "INSERT INTO empleados (clave_empleado, nombre_emp, a_paterno, a_materno, id_puesto, fecha_ingreso, fecha_baja, status)
                    VALUES ('$claveEmpleado', '$nombreEmpleado', '$apellidoPaterno', '$apellidoMaterno', '$idPuesto', '$fechaIngreso', '$fechaBaja', '$status')";
    
            $resultado = $conexion->query($sql);
    
            if ($resultado) {
                echo "Consulta exitosa.";
            } else {
                echo "Consulta fallida: " . $conexion->error;
            }
        }
    }


     function update($conexion) { // Función para acutalizar los datos de un empleado
        if (isset($_POST['id_empleado'])) {
    
            // Primero recuperamos los datos del formulario
            $idEmpleado = $_POST['id_empleado'];
            $claveEmpleado = $_POST['clave_empleado'];
            $nombreEmpleado = $_POST['nombre_emp'];
            $apellidoPaterno = $_POST['a_paterno'];
            $apellidoMaterno = $_POST['a_materno'];
            $idPuesto = $_POST['id_puesto'];
            $fechaIngreso = $_POST['fecha_ingreso'];
            $fechaBaja = $_POST['fecha_baja'];
            $status = $_POST['status'];
    
            // Ahora hacemos la consulta
            $sql = "UPDATE empleados 
                    SET clave_empleado = '$claveEmpleado',
                        nombre_emp = '$nombreEmpleado',
                        a_paterno = '$apellidoPaterno',
                        a_materno = '$apellidoMaterno',
                        id_puesto = '$idPuesto',
                        fecha_ingreso = '$fechaIngreso',
                        fecha_baja = '$fechaBaja',
                        status = '$status'
                    WHERE id_empleado = '$idEmpleado'";
    
            $resultado = $conexion->query($sql);
    
            if ($resultado) {
                echo "Registro eliminar correctamente.";
            } else {
                echo "Error al elminar: " . $conexion->error;
            }
        }
    }
    

     function delete($conexion){ // Función para eliminar un registro
        if(isset($_POST['id_empleado'])){
            $idEmpleado = $_POST['id_empleado'];

            // Consultar para eliminar registros
            $sql = "DELETE FROM empleados
                WHERE id_empleado = '$idEmpleado'";
                 $resultado = $conexion->query($sql);

                 if ($resultado) {
                     echo "Registro actualizado correctamente.";
                 } else {
                     echo "Error al actualizar: " . $conexion->error;
                 }
         
        }
       
     }

    //update($conexion);
    delete($conexion);
    read($conexion);
    //create($conexion);
?>
    
