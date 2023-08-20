/*document.addEventListener("DOMContentLoaded", function () {
    var selector = document.getElementById("seleccion_div");
    selector.addEventListener("change", function () {
        let valor = this.value;
        console.log(valor);
    });
});*/

let boton = document.getElementById("boton");
boton.addEventListener("click", function () {
    marcarTodosRadio();
    var nombre = document.getElementById("nombre");

    document.getElementById("hemograma").value = nombre.value;

    nombre.value = "";
});

function calcularSuma() {
    const contenido = document.querySelectorAll(".contenidos input");

    const numero = [];
    var suma = 0;
    contenido.forEach((element) => {
        if (element.value !== "") {
            suma += parseInt(element.value);
        }
    });
    console.log(suma);
}

function marcarTodosRadio() {
    const grupo_radio = document.querySelectorAll(".contenido_radios input");

    grupo_radio.forEach((element) => {
        if (element.value == 2) {
            element.checked = true;
        }
    });

    let nuevo_input = document.createElement("input");
    nuevo_input.type = "checkbox";
    nuevo_input.value = "50";

    let contenido = document.querySelector("contenido_radios");
    console.log(contenido);
    contenido.appendChild(nuevo_input);
}
const seleccion = document.getElementById("aptitud");

seleccion.addEventListener("change", function () {
    document.getElementById("hemograma").value = this.value;
    //marcarTodosRadio();
    calcularSuma();
});

const todo_brigada = document.querySelectorAll(".grup");

let numeros_radios = [];
todo_brigada.forEach((element) => {
    numeros_radios.push(parseInt(element.value));
});

let nueva_seccion = [];
numeros_radios.forEach((valor) => {
    if (valor === 2) {
        nueva_seccion.push("Creyente");
    } else if (valor === 5) {
        nueva_seccion.push("Excelente");
    } else {
        nueva_seccion.push("jajaj");
    }
});
