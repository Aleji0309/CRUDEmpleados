<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="./styles/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>CRUD Empleados</title>
</head>
<body>

    <header class="header-empleados" >
        <a class="a-empleados" href="#">Lista de Empleados</a>
        <a class="a-empleados" href="#">Agregar Empleados</a>
    </header>

    <main class="main-container">
        <div class="tabla-contenido"  id="resultado"></div>
    </main>


    <!-- Botones para cada acción -->
    <div class="contenedor-botones">
        <button id="btn-agregar">Agregar Empleado</button>
        <button id="btn-actualizar">Actualizar Empleado</button>
        <button id="btn-eliminar">Eliminar Empleado</button>
    </div>

    <!-- Modal Emergente -->
    <div class="modal" id="miModal" style="display: none;">
        <div class="modal-content">
            <span id="cerrarModal" class="cerrar">X</span>

            <!-- Formulario CRUD -->
            <div id="formulario-contenedor" class="formulario-contenedor">
                <form id="form-agregar" method="POST">
                    
                    <!-- Solo para actualizar o eliminar -->
                    <div id="id-contenedor" style="display: none;">
                        <label for="id_empleado">ID del Empleado</label>
                        <input type="number" name="id_empleado"><br>
                    </div>

                    <div class="contenedor-labels" id="contenedor-labels">
                        <label for="clave_empleado">Clave Empleado</label>
                        <input type="number" name="clave_empleado" required><br>

                        <label for="nombre_emp">Nombre Empleado</label>
                        <input type="text" name="nombre_emp" required><br>

                        <label for="a_paterno">Apellido Paterno</label>
                        <input type="text" name="a_paterno" required><br>

                        <label for="a_materno">Apellido Materno</label>
                        <input type="text" name="a_materno" required><br>

                        <label for="id_puesto">ID Puesto</label>
                        <input type="number" name="id_puesto" required min="1" max="10"><br>

                        <label for="fecha_ingreso">Fecha Ingreso</label>
                        <input type="date" name="fecha_ingreso" required><br>

                        <label for="fecha_baja">Fecha Baja</label>
                        <input type="date" name="fecha_baja" required><br>

                        <label for="status">Estado</label>
                        <select name="status" id="status" required>
                        <option value="Activo">Activo</option>
                        <option value="Inactivo">Inactivo</option>
                        </select>
                    </div>

                    <!-- Botones de acción -->
                    <button id="id-guardar" type="submit">Guardar</button>
                    <button id="id-actualizar" type="submit">Actualizar</button>
                    <button id="id-eliminar" type="submit">Eliminar</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal para mensajes -->
    <div id="modal-mensaje" style="display: none;" class="modal">
        <div class="modal-content">
            <p id="texto-modal"></p>
            <button id="btn-cerrar-modal">Cerrar</button>
        </div>
    </div>

    <script src="app.js"></script>
</body>
</html>
