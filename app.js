// Declarar las variables
const btnMostrar = document.getElementById("btn-mostrar");
const btnMostrarFormulario = document.getElementById("btn-agregar");
const btnActualizarFormulario = document.getElementById("btn-actualizar");
const btnEliminarFormulario = document.getElementById("btn-eliminar");
const divMostrar = document.getElementById("resultado");
const contenedorFormulario = document.getElementById("formulario-contenedor");
const form = document.getElementById("form-agregar");

const idContenedor = document.getElementById("id-contenedor");
const btnGuardar =  document.getElementById("id-guardar");
const btnActualizar =  document.getElementById("id-actualizar");
const btnEliminar = document.getElementById("id-eliminar");


// Event Listener

// Evento para mostrar los datos de la base
btnMostrar.addEventListener("click", () => {
  fetch("script.php")
    .then((resultado) => resultado.json())
    .then((data) => {
      // Paso 1: Abrir tabla y encabezado
      let contenido = `
        <table border="2">
          <thead>
            <tr>
              <th>ID Empleado</th>
              <th>Clave Empleado</th>
              <th>Nombre</th>
              <th>Apellido Paterno</th>
              <th>Apellido Materno</th>
              <th>ID Puesto</th>
              <th>Fecha Ingreso</th>
              <th>Fecha Baja</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
      `;

      // Paso 2: Recorrer los datos y agregar filas
      data.forEach((element) => {
        contenido += `
          <tr>
            <td>${element.id_empleado}</td>
            <td>${element.clave_empleado}</td>
            <td>${element.nombre_emp}</td>
            <td>${element.a_paterno}</td>
            <td>${element.a_materno}</td>
            <td>${element.id_puesto}</td>
            <td>${element.fecha_ingreso}</td>
            <td>${element.fecha_baja}</td>
            <td>${element.status}</td>

          </tr>
        `;
      });

      // Paso 3: Cerrar la tabla
      contenido += `
          </tbody>
        </table>
      `;

      // Mostrar el contenido en el div
      divMostrar.innerHTML = contenido;
    });
});

// Evento para crear nuevos datos en la base 
btnMostrarFormulario.addEventListener("click", () => {
    contenedorFormulario.style.display = "block"; 
    btnActualizar .style.display = "none"; 
});

form.addEventListener("submit", (e) => {
  e.preventDefault();

  const formData = new FormData(form);
  let accion = btnGuardar.style.display !== "none" ? "guardar" : "actualizar";
  formData.append(accion, true); // esto asegura que se envíe la acción

  fetch("script.php", {
    method: "POST",
    body: formData,
  })
    .then((res) => res.text())
    .then((respuesta) => {
      console.log("Respuesta del servidor:", respuesta);
    });
});


// Evento para Actualizar un registro de la base de datos
btnActualizarFormulario.addEventListener("click" , () => {
  console.log('test');
  idContenedor.style.display = "block"; 
  contenedorFormulario.style.display = "block"; 
  btnGuardar.style.display = "none"; 
} );


// Evento para Rliminar un registro de la base de datos
btnEliminarFormulario.addEventListener( "click", () => {
  console.log('eliminar desde consola');
  idContenedor.style.display = "block"; 
  contenedorFormulario.style.display = "block"; 
} );