//Funcion para validar solo letras//


function sololetras(e) {

    if (event.charCode >= 65 && event.charCode <= 90 || event.charCode >= 97 && event.charCode <= 122 || event.charCode <= 32) {
        return true;
    }
    return false;
}

//funcion para validar solo numeros
function solonumeros(event) {

    if (event.charCode >= 48 && event.charCode <= 57) {
        return true;
    }
    return false;
}

//ocultar un div
function ocultar() {
    document.getElementById('ocultar').style.display = "none";
}