// Declarar las variables
const btnMostrar = document.getElementById("btn-mostrar");
const divMostrar = document.getElementById("resultado");


// Event Listeners
btnMostrar.addEventListener("click", () => {

    fetch('script.php')
    .then((resultado) => resultado.json())
    .then((data) =>  data.forEach(element => {

        
    document.getElementById('resultado').innerHTML = `

    <table border="2">
    <tbody>
    <tr><td>celda en la hilera 0, columna 0</td>
        <td>celda en la hilera 0, columna 1</td>
    </tr>
    </tbody>
    </table>

    ` 

;
       
    }));  

});
