<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CRUD Empleados</title>
</head>
<body>

    <h1>CRUD de Empleados</h1>

    <div id="resultado"></div>
    

    <!-- Botones para cada acción -->
    <button id="btn-mostrar">Mostrar Empleados</button>
    <button id="btn-agregar">Agregar Empleado</button>
    <button id="btn-actualizar">Actualizar Empleado</button>
    <button id="btn-eliminar">Eliminar Empleado</button>



    <!-- Formulario para Agregar Nuevos Empleados -->

    <div id="formulario-contenedor" style="display: none;">
    <form id="form-agregar" method="POST">

    <!-- Campo se habilita sólo si el usuario va a actualizar un registro -->
        <div id="id-contenedor" style="display: none;">
        <label for="id_empleado">Id del Empleado a modificar</label>
        <input type="number" name="id_empleado"><br>
        </div>

    <!-- Campo se habilita sólo si el usuario va a actualizar un registro -->

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

        <button id="id-guardar" type="submit" name="guardar" >Guardar</button>
        <button id="id-actualizar" type="submit" name="actualizar" >Actualizar</button>
        <button id="id-eliminar"  type="submit" name="eliminar" >Eliminar</button>


    </form>
    </div>
  
    <script src="app.js"></script>

</body>
</html>
