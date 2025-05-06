<?php 
include 'db.php';    

function read($conexion) {
    $sql = "SELECT * FROM empleados";
    $resultado = $conexion->query($sql);

    $empleados = [];

    while ($fila = $resultado->fetch_assoc()) {
        $empleados[] = $fila;
    }

    header('Content-Type: application/json');
    echo json_encode($empleados);
    exit; // Evita que se imprima algo más
}

function create($conexion) {
    if (
        isset($_POST['clave_empleado']) && 
        isset($_POST['nombre_emp']) && 
        isset($_POST['a_paterno']) && 
        isset($_POST['a_materno']) && 
        isset($_POST['id_puesto']) && 
        isset($_POST['fecha_ingreso']) && 
        isset($_POST['fecha_baja']) && 
        isset($_POST['status']) 
    ) {
        $claveEmpleado = $_POST['clave_empleado'];
        $nombreEmpleado = $_POST['nombre_emp'];
        $apellidoPaterno = $_POST['a_paterno'];
        $apellidoMaterno = $_POST['a_materno'];
        $idPuesto = $_POST['id_puesto'];
        $fechaIngreso = $_POST['fecha_ingreso']; 
        $fechaBaja = $_POST['fecha_baja'];
        $status = $_POST['status'];

        $sql = "INSERT INTO empleados 
                (clave_empleado, nombre_emp, a_paterno, a_materno, id_puesto, fecha_ingreso, fecha_baja, status)
                VALUES 
                ('$claveEmpleado', '$nombreEmpleado', '$apellidoPaterno', '$apellidoMaterno', '$idPuesto', '$fechaIngreso', '$fechaBaja', '$status')";

        $resultado = $conexion->query($sql);

        if ($resultado) {
            echo "Nuevo Registro Insertado";
        } else {
            echo "Registro NO Insertado: " . $conexion->error;
        }
        exit;
    }
}

function update($conexion) {
    if (isset($_POST['id_empleado'])) {
        $idEmpleado = $_POST['id_empleado'];
        $claveEmpleado = $_POST['clave_empleado'];
        $nombreEmpleado = $_POST['nombre_emp'];
        $apellidoPaterno = $_POST['a_paterno'];
        $apellidoMaterno = $_POST['a_materno'];
        $idPuesto = $_POST['id_puesto'];
        $fechaIngreso = $_POST['fecha_ingreso'];
        $fechaBaja = $_POST['fecha_baja'];
        $status = $_POST['status'];

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
            echo "Registro actualizado correctamente.";
        } else {
            echo "Error al actualizar: " . $conexion->error;
        }
        exit;
    }
}

function delete($conexion) {
    if (isset($_POST['id_empleado'])) {
        $idEmpleado = $_POST['id_empleado'];

        $sql_verificar = "SELECT id_empleado FROM empleados WHERE id_empleado = '$idEmpleado'";
        $resultado_verificar = $conexion->query($sql_verificar);

        if ($resultado_verificar->num_rows > 0) {
            $sql = "DELETE FROM empleados WHERE id_empleado = '$idEmpleado'";
            $resultado = $conexion->query($sql);

            if ($resultado) {
                echo "Registro eliminado correctamente.";
            } else {
                echo "Error al eliminar: " . $conexion->error;
            }
        } else {
            echo "El ID ingresado no existe.";
        }
        exit;
    }
}

// Lógica para determinar qué función ejecutar
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['guardar'])) {
        create($conexion);
    } elseif (isset($_POST['actualizar'])) {
        update($conexion);
    } elseif (isset($_POST['eliminar'])) {
        delete($conexion);
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    read($conexion);
}
?>
