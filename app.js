// Declarar las variables
const btnMostrar = document.getElementById("btn-mostrar");

// Event Listeners
btnMostrar.addEventListener("click", () => {
  console.log("test");
  fetch("mensaje.txt")
    .then((response) => response.text())
    .then((texto) => {
      console.log(texto);
      document.body.innerHTML += `<p>${texto}</p>`;
    });

    fetch('script.php')
    .then((resultado) => resultado.text())
    .then((data) => console.log(data))

//   fetch("http://example.com/movies.json")
//     .then((response) => response.json())
//     .then((data) => console.log(data));
});
