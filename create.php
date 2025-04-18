<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Tranajadores</title>
</head>
<body>

    <h1>Registro de Empleados</h1>

    <form action="show.php" method="POST" >

        <label for="clave empleado">Clave Empleado</label>
        <input type="number" name="clave_empleado"><br>

        <label for="nombre">Nombre Empleado</label>
        <input type="text" name="nombre_emp"><br>

        <label for="apellido paterno">Apellido Paterno</label>
        <input type="text" name="a_paterno"><br>

        <label for="apellido materno">Apellido Materno</label>
        <input type="text" name="a_materno"><br>
        
        <label for="id puesto">ID Puesto</label>
        <input type="number" name="id_puesto"><br>

        <label for="fecha ingreso">Fecha Ingreso</label>
        <input type="date" name="fecha_ingreso"><br>

        <label for="fecha baja">Fecha Baja</label>
        <input type="date" name="fecha_baja"><br>

        <label for="estado">Status</label>
        <input type="text" name="status"><br>

        <button type="submit" name="guardar" >Guardar</button>

    </form>
    
</body>
</html>

