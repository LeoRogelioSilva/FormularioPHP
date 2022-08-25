function getRandomInt(min, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min)) + min;
}

function liberar_envio() {
    if (document.getElementById("termo").checked == true) {
        document.getElementById("enviar").style.display = "inline";
    } else {
        document.getElementById("enviar").style.display = "none";
    }
};



function gera_cpf() {
    var number_cpf = [];
    var soma = 0;
    var cpf = "";
    for (let i = 0; i < 9; i++) {
        number_cpf[i] = getRandomInt(0, 9);
        soma += (i + 1) * number_cpf[i];
    }
    number_cpf[9] = soma % 11 == 10 ? 9 : soma % 11;
    soma = 0;
    for (let i = 0; i <= 9; i++) {
        soma += (i) * number_cpf[i];
    }
    number_cpf[10] = soma % 11 == 10 ? 9 : soma % 11;
    for (let i = 0; i < 11; i++) {
        cpf += String(number_cpf[i]);
    }
    document.getElementById("cpf_gerado").style.display = "inline";
    document.getElementById("cpf_gerado").value = cpf;
}

function copiarTexto(){
    var texto = document.getElementById('textoCopiar')
    console.log(texto);
    x = texto.value.replace(/\D/g,'');
    texto.value = x;
    console.log(texto);
    texto.select();
    document.execCommand('copy');
}