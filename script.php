<?php 
    include 'db.php';

    // Funcion para mostrar  los registros
    function mostrarEmpleadosHTML($conexion){
        $sql = "SELECT * FROM empleados";

        $resultado = $conexion -> query($sql);
        $html = "";

        // Recorrer el objeti con un ciclo
        while($fila = $resultado-> fetch_assoc()){ // Devuelve arreglo asociativo y retorba falso cuando no hay más elementos
            $html .= "<tr>";
            $html .= "<td>" .$fila['id_empleado'] ."</td>";
            $html .= "<td>" .$fila['clave_empleado'] ."</td>";
            $html .= "<td>" .$fila['nombre_emp'] ."</td>";
            $html .= "<td>" .$fila['a_materno'] ."</td>";
            $html .= "<td>" .$fila['a_paterno'] ."</td>";
            $html .= "<td>" .$fila['id_puesto'] ."</td>";
            $html .= "<td>" .$fila['fecha_ingreso'] ."</td>";
            $html .= "<td>" .$fila['fecha_baja'] ."</td>";
            $html .= "<td>" .$fila['status'] ."</td>";
        }

        return $html;

    }


    

?>