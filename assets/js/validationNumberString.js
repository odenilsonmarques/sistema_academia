// o script abaixo permite que somente letras sejam aceitas nos campos que recebem essa funcão
function onlyLetter(e) {
    var expression;
    expression = /[0-9]/;
    if (expression.test(String.fromCharCode(e.keyCode))) {
        return false;
    } else {
        return true;
    }
}

// o script abaixo permite que somente numeros sejam aceitos nos campos que recebem essa funcão
function onlyNumber(num) {
    var er = /[^0-9.]/;
    er.lastIndex = 0;
    var campo = num;
    if (er.test(campo.value)) {
        campo.value = "";
    }
}
