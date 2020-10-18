function validaCodigo() {

    var codigo = document.form.codigo;

    if (codigo.value == "" || codigo.value > 999999 || codigo == 0) {
        alert("O código deve estar entre '1' e '999999' !!!");
        return false;
    } else {
        return true;
    }

}

/* Checagem do campo de nome de arquivo */
function validaArquivo() {

    var nomeArquivo = document.form.nomeArquivo;

    if (nomeArquivo.value == "") {
        alert("Preencha o Nome do Arquivo sem espaço e caracteres!");
        return false;
    } else {
        return true;
    }

}

/* Checagem do campo de mensagem */
function validaMensagem() {

    var mensagem = document.form.mensagem;

    if (mensagem.value == "") {
        alert("Preencha a mensagem o sem espaço e caracteres!");
        return false;
    } else {
        return true;
    }

}

/* Validação do formulário */
function validacao() {
    var segundos = 3;
    var recarregar = document.getElementById("recarregar");
    if(validaCodigo() && validaArquivo() && validaMensagem()){
        aviso.innerHTML = "Formulário enviado com sucesso!";
        setInterval(function () {
            recarregar.innerHTML = "Recarregando página em " + segundos + ".";
            segundos--;
        }, 800);
        
        setTimeout(function () {
            window.location.href = "./index.php";
        }, 3000);
        return true;
    }else{
        return false;
    }

    

}