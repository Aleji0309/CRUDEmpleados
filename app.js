// Variables de elementos
const modal = document.getElementById("miModal");
const cerrarModal = document.getElementById("cerrarModal");

const btnMostrar = document.getElementById("btn-mostrar");
const btnMostrarFormulario = document.getElementById("btn-agregar");
const btnActualizarFormulario = document.getElementById("btn-actualizar");
const btnEliminarFormulario = document.getElementById("btn-eliminar");

const divMostrar = document.getElementById("resultado");
const contenedorFormulario = document.getElementById("formulario-contenedor");
const form = document.getElementById("form-agregar");

const idContenedor = document.getElementById("id-contenedor");
const contenedorLabels = document.getElementById("contenedor-labels");
const btnGuardar = document.getElementById("id-guardar");
const btnActualizar = document.getElementById("id-actualizar");
const btnEliminar = document.getElementById("id-eliminar");

const textoModal = document.getElementById("texto-modal");
const btnCerrarModal = document.getElementById("btn-cerrar-modal");

// Mostrar empleados
btnMostrar.addEventListener("click", () => {
  fetch("script.php")
    .then((resultado) => resultado.json())
    .then((data) => {
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

      contenido += `</tbody></table>`;
      divMostrar.innerHTML = contenido;
    });
});

// Mostrar formulario para agregar
btnMostrarFormulario.addEventListener("click", () => {
  modal.style.display = "block";
  contenedorFormulario.style.display = "block";
  idContenedor.style.display = "none";
  contenedorLabels.style.display = "block";
  btnGuardar.style.display = "inline-block";
  btnActualizar.style.display = "none";
  btnEliminar.style.display = "none";
});

// Mostrar formulario para actualizar
btnActualizarFormulario.addEventListener("click", () => {
  modal.style.display = "block";
  contenedorFormulario.style.display = "block";
  idContenedor.style.display = "block";
  contenedorLabels.style.display = "block";
  btnGuardar.style.display = "none";
  btnActualizar.style.display = "inline-block";
  btnEliminar.style.display = "none";
});

// Mostrar formulario para eliminar
btnEliminarFormulario.addEventListener("click", () => {
  modal.style.display = "block";
  contenedorFormulario.style.display = "block";
  contenedorLabels.style.display = "none";
  idContenedor.style.display = "block";
  btnGuardar.style.display = "none";
  btnActualizar.style.display = "none";
  btnEliminar.style.display = "inline-block";
});

// Envío del formulario para agregar o actualizar
form.addEventListener("submit", (e) => {
  e.preventDefault();
  const formData = new FormData(form);

  if (btnGuardar.style.display !== "none") {
    formData.append("guardar", true);
  } else if (btnActualizar.style.display !== "none") {
    formData.append("actualizar", true);
  } else {
    return;
  }

  fetch("script.php", {
    method: "POST",
    body: formData,
  })
    .then((res) => res.text())
    .then((respuesta) => {
      alert(respuesta);
      form.reset();
      modal.style.display = "none";
    });
});

// Evento específico para eliminar
btnEliminar.addEventListener("click", (e) => {
  e.preventDefault();
  const formData = new FormData(form);
  const id = formData.get("id_empleado");

  if (!id) {
    textoModal.textContent = "Debes ingresar un ID";
    modal.style.display = "block";
    return;
  }

  formData.append("eliminar", true);

  fetch("script.php", {
    method: "POST",
    body: formData,
  })
    .then((res) => res.text())
    .then((respuesta) => {
      if (respuesta.includes("no existe")) {
        textoModal.textContent = "El ID ingresado no existe.";
      } else {
        textoModal.textContent = respuesta;
        form.reset();
      }
      modal.style.display = "block";
    });
});

// Cerrar modal con la X
cerrarModal.addEventListener("click", () => {
  modal.style.display = "none";
  form.reset();
});

// Cerrar si se hace clic fuera del modal
window.addEventListener("click", (event) => {
  if (event.target === modal) {
    modal.style.display = "none";
    form.reset();
  }
});
