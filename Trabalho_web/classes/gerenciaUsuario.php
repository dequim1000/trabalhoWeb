<?php

#Classe gerenciaUsuario que irá gerenciar todas as funções do usuario
class gerenciaUsuario{

    private $directory; #Armazena o diretório onde será salvo o arquivo
    private $arquivo; #Armazena o nome do arquivo que será criado
    private $diretorioArquivo; #Armazena o caminho absoluto do arquivo a ser salvo
    private $conteudoMensagem; #Armazena a mensagem a ser salva no arquivo

#Construtor
    public function __construct($directory, $arquivo, $textoArea){
        $this->directory = $directory;
        $this->arquivo = $arquivo;
        $this->directoryArquivo = $directory . '/' . $arquivo . '.txt';
        $this->conteudoMensagem = $textoArea;
    }

#Criação da Pasta
    public function criaPasta(){
        try {
            return !is_dir($this->directory) ? mkdir($this->directory, 0777, true) : false; 
        } catch (Exception $ex) {
            echo "Erro: " . $ex;
        }
    }

#Cria arquivo
    public function criaArquivo(){
        try {
            if (!is_dir($this->directory)) {
                return $this->criaPasta() ? file_put_contents($this->directoryArquivo, $this->conteudoMensagem) : false; #Se a pasta é criada com sucesso, salva o arquivo, caso contrário retorna falso
            } else {
                return fopen($this->directoryArquivo, "w+") ? file_put_contents($this->directoryArquivo, $this->conteudoMensagem) : false; #Caso a pasta já exista, salva o arquivo, caso contrário retorna falso
            }
        } catch (Exception $ex) {
            echo "Erro: " . $ex;
        }
    }

#Deleta o arquivo -> JS
    public static function deletarArquivo($arquivo){
        return unlink($arquivo);
    }
}

#Recebe os Parametros e guarda em variaveis
try {
    if (isset($_POST['codigo']) && !empty($_POST['codigo'])) {
        $directory = '../usuarios/' . $_POST['codigo'];
        $arquivo = $_POST['nomeArquivo'];
        $texto = $_POST['mensagem'];

        #Cria uma instância da classe 'cliente'
        $usuario = new gerenciaUsuario($directory, $arquivo, $texto);
        $usuario->criaArquivo();
    }
} catch (Exception $ex) {
    echo 'Erro: ' . $ex;
}

#Checa o Post e realiza a Deleção
try {
    if (isset($_POST['diretorioDel']) && !empty($_POST['diretorioDel'])) {
        $directoryDelete = $_POST['diretorioDel'];
        gerenciaUsuario::deletarArquivo($directoryDelete);
    }
} catch (Exception $ex) {
    echo 'Erro: ' . $ex;
}



?>