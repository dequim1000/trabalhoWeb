<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/index.css">
    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
    <title>Formulário</title>
</head>


<body>
    <div class="main">
        <div class="name-form">
            <h1>DECK'S FORM</h1>
        </div>
        
        <div class="form-div">
                <?php
                    include_once('classes/forms.php');
                    $formularioUsuario = new Forms();
                    if (isset($_GET['caminhoArquivo']) && !empty($_GET['caminhoArquivo'])) {
                        echo ($formularioUsuario->editarArquivo($_GET['caminhoArquivo']));
                    } else {
                        echo ($formularioUsuario->construirCadastro());
                    }
                ?>
            <iframe name="criado" frameBorder="0">
                    Navegador não compatível!
            </iframe>
        </div>
        <div class="texto-vizu">
            <p>Clique Abaixo para verificar os arquivos criados</p>
        </div>
        <div class="div-vizu">
            <a href="listaArquivo.php"><button type="button" class="btn btn-outline-success vizu">Vizualizar Arquivos</button></a>
        </div>
        <p id="aviso" class="aviso"></p>
        <p id="recarregar" class="aviso"></p>
    </div>
</body>
</html>