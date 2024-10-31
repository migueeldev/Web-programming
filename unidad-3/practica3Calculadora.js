var valor1 = null;
var valor2 = null;

function suma(){
    valor1 = document.getElementById("num1").value;
    valor2 = document.getElementById("num2").value;
    let sumafinal = parseInt(valor1) + parseInt(valor2);
    alert("El resultado es " + sumafinal);
    
}

function multi(){
    valor1 = document.getElementById("num1").value;
    valor2 = document.getElementById("num2").value;
    let prod = parseInt(valor1) * parseInt(valor2);
    alert("El resultado es " + prod);
}

function restar(){
    valor1 = document.getElementById("num1").value;
    valor2 = document.getElementById("num2").value;
    let resta = parseInt(valor1) - parseInt(valor2);
    alert("El resultado es " + resta);
}

function dividir(){
    valor1 = document.getElementById("num1").value;
    valor2 = document.getElementById("num2").value;
    let division = parseInt(valor1) / parseInt(valor2);
    alert("El resultado es " + division);
}
