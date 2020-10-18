<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/listaArquivo.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/lista.js"></script>
    <title>Lista Arquivo</title>
</head>
<body>  
<section class="conteudo">

    <article id="clientes">

        <div class="container-sm">
            
            <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Código</th>
                            <th scope="col">Nome do Arquivo</th>
                            <th scope="col">Operações</th>
                            <th scope="col">
                            <th scope="col">
                            <th scope="col">
                                <div class="btnVoltar">
                                <a href="index.php"><button type="button" class="btn btn-outline-primary btn-Voltar" data-toggle="tooltip" data-placement="right" title="Voltar Para o Formulário">Voltar</button></a>
                                </div>
                            </th>
                            </th>
                            </th>
                        </tr>
                    </thead>
                    
                    <tbody>

                        <?php
                            include_once('classes/listaUsuario.php');
                            $lista = new listaUsuario('./usuarios/');
                            echo $lista->varrerPastas();
                        ?>

                    </tbody>
            </table>
            
        </div>
        <div class="mostraArquivo" id="mostraArquivo">
                <h2 class="nameArquivo" id="nameArquivo"></h2>
                    <div class="arquivo" id="arquivo">
                        <p class="mensagemArquivo" id="mensagemArquivo"></p>
                    </div>
                <a href="#" class="btn btn-danger btnFechar" onclick="closeArquivo()">Fechar</a>
        </div>
    </article>
</section>
</body>
</html>



