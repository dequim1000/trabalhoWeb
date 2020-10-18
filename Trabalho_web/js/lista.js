
/*Função para Deletar o Arquivo, passando como parametro a URL do arquivo para a Classe */
function deletarArquivo(caminhoArquivo) {
console.log("Passo1");
    if (confirm("Deseja Deletar o Arquivo!")) {
        $.ajax({
            url: "classes/gerenciaUsuario.php",
            type: "post",
            data: { diretorioDel: caminhoArquivo },
            success: function sucesso() {
                alert("Arquivo apagado com sucesso!");
            },
            error: function erro() {
                alert("Erro ao apagar arquivo!")
            },
        });

        window.location.reload(1);

    } else {
        alert("Exclusão cancelada!");
    }

}

/* Visualização de arquivos */

function visualizarArquivo(caminhoArquivo, nomeArquivo) {

    var exibir_arquivo = document.getElementById("mostraArquivo");
    var nome_arquivo = document.getElementById("nameArquivo");
    var conteudo_arquivo = document.getElementById("mensagemArquivo");

    var ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function () {
        nome_arquivo.innerHTML = nomeArquivo;
        conteudo_arquivo.innerHTML = ajax.responseText;
    }
    ajax.open("POST", caminhoArquivo);
    ajax.send(null);

    exibir_arquivo.style.display = "block";

}

function closeArquivo() {

    var exibirArquivo = document.getElementById("mostraArquivo");
    var nomeArquivo = document.getElementById("nameArquivo");
    var conteudoArquivo = document.getElementById("mensagemArquivo");

    nomeArquivo.innerHTML = "";
    conteudoArquivo.innerHTML = "";
    exibirArquivo.style.display = "none";

}