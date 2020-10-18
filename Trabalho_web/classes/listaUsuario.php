
<?php

#Cria a classe responsável por listar todos os arquivos dos usuarios existentes
class listaUsuario{

    private $listaUsuario = "";

    public function __construct($directory){
        $this->listaUsuario = $directory;
    }

    #Verifica se um diretório está vazio
    private function directoryNull($directory){
        if (!is_readable($directory)) {
            return NULL;
        }
        return (count(scandir($directory)) == 2);
    }

    #Cria uma tabela de arquivos contidos no diretório especificado no construtor da classe
    public function varrerPastas(){

        $tabela = ""; 
        
        $directoryRaiz = opendir($this->listaUsuario); 

        if ($directoryRaiz) {
            while ($pastas = readdir($directoryRaiz)) { 
                if ($pastas != '.' && $pastas != '..') {
                    if ($this->directoryNull($this->listaUsuario . $pastas)) { 
                        rmdir($this->listaUsuario . $pastas);
                        continue;
                    }else{
                        $tabela .= $this->listarArquivos($this->listaUsuario . $pastas);
                    }
                }
            }
            closedir($directoryRaiz);
            return $tabela;
        } else {
            return 'Erro ao criar tabela de arquivos!';
        }

    }

    #Lista todos os arquivos presentes na pasta recebida e retorna uma linha de uma tabela
    public function listarArquivos($directory){

        $linhaTabela = ""; #Cria a linha de retorno para a tabela
        $numeroRows = 0; 

        $listaUsuario = opendir($directory); #Abre a pasta do usuario

        if ($listaUsuario) {
            while ($arquivosUsuario = readdir($listaUsuario)) { #Lê o arquivo do usuario
                if ($arquivosUsuario != '.' && $arquivosUsuario != '..') {

                    $urlArquivo = $directory . '/' . $arquivosUsuario; #Cria a URL para download e edição do arquivo
                    $delecaoArquivo = '.' . $directory . '/' . $arquivosUsuario; #Cria a URL para a deleção do arquivo

                    if($numeroRows != 0){
                        $linhaTabela .= '<tr>';
                    }
                    $linhaTabela .= '<th scope="row" class="nome-arquivo">' . str_replace('.txt', '', basename($arquivosUsuario)) . '</th>';
                    $linhaTabela .= '<td>' . '<a href="#" class="btn btn-info" id="btnVizualizar" data-toggle="tooltip" data-placement="right" title="Vizualizar o Arquivo" onclick= visualizarArquivo("' . $urlArquivo . '","' . str_replace('.txt', '', basename($arquivosUsuario)) . '")>Vizualizar</a>' . '</td>';
                    $linhaTabela .= '<td>' . '<a href="index.php?caminhoArquivo=' . $urlArquivo . '"><button type="button" class="btn btn-warning" id="btnEditar" data-toggle="tooltip" data-placement="right" title="Editar o Arquivo">Editar</button></a>' . '</td>';
                    $linhaTabela .= '<td>' . '<a download="' . $arquivosUsuario . '" href="' . $urlArquivo . '"><button type="button" class="btn btn-success" data-toggle="tooltip" data-placement="right" title="Fazer o Download do Arquivo">Download</button></a>' . '</td>';
                    $linhaTabela .= '<td>' . '<a href="#" ><button type="button" class="btn btn-danger" id="btnExcluir" data-toggle="tooltip" data-placement="right" title="Excluir o Arquivo" onclick= deletarArquivo("' . $delecaoArquivo . '")>Excluir</button></a>' . '</td>';
                    if($numeroRows != 0){
                        $linhaTabela .= '</tr>';
                    }
                    $numeroRows++;

                }
            }
            closedir($listaUsuario);
            if($numeroRows == 1){ #Personaliza a tabela com retorno de acordo com o número de arquivos dentro da pasta
                return '<tr>' . '<th>' . basename($directory) . '</th>' . $linhaTabela . '</tr>';
            }else{
                return '<tr>' . '<th scope="row" rowspan="' . $numeroRows .'">' . basename($directory) . '</th>' . $linhaTabela . '</tr>';
            }
        }else{
            return 'Erro ao ler pasta de usuario!';
        }
        
    }

}

?>