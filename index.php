<?php 
include 'db.php';
include 'script.php';
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Empleados</title>
</head>
<body>
    <h1>Empleados Registrados</h1>

    <table border='1' cellpadding = "10" >
        <tr>
            <th>ID</th>
            <th>Clave</th>
            <th>Nombre</th>
            <th>Apellido Materno</th>
            <th>Apellido Paterno</th>
            <th>Puesto</th>
            <th>Ingreso</th>
            <th>Baja</th>
            <th>Status</th>
        </tr>

        

        <?= mostrarEmpleadosHTML($conexion) ?> <!-- Llamar a la función -->
    </table>

    <button>Mostrar Registros</button>
</body>
</html>