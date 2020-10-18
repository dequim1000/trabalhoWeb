<?php

#Classe feita para criação dos formulários de Criação e Edição de Arquivos
class Forms{

    private $imprimeFormulario;

    #Construtor
    public function __construct(){
        #Criação do Formulário e criando campos para ser substituidos no futuro pelos INPUT
        $this->imprimeFormulario = '<form name="form" id ="form" method="POST" action="classes/gerenciaUsuario.php" target="criado">
                                    <div class="form-group">
                                        <label for="labelCodigo">Digite o Código</label>
                                        {iptCod}
                                    </div>
                                    

                                    <div class="form-group">
                                        <label for="labelNome">Digite o Nome do Arquivo</label>
                                        {iptNome}
                                    </div>
                                    

                                    <div class="form-group">
                                        <label for="labelConteudo">Digite o Conteudo do Arquivo</label>
                                        {iptMsg}
                                    </div>
                                    

                                    <br/>
                                    <div class="form-group-botao">
                                        {botaoCriar}
                                        {botaoCancelar}
                                    </div>
                                    </form>';
    }

    #Construção do formulario de CRIAÇÃO substituindo tags especificas.
    public function construirCadastro(){
        #Criação e alocação das variaveis
        $iptCod = '<input type="number" min=0 max="999999" class="form-control" id="codigo" name="codigo">';
        $iptNome = '<input type="text" class="form-control" id="nome-arquivo" name="nomeArquivo">';
        $iptMsg = '<textarea class="form-control" id="mensagem" name="mensagem" rows="3"></textarea>';
        $botaoCriar ='<button type="submit" class="btn btn-primary" id="btnCriar" onclick="validacao();">Criar</button>';
        #Alimentando varaiveis com inputs
        $this->imprimeFormulario = str_replace('{iptCod}', $iptCod, $this->imprimeFormulario);
        $this->imprimeFormulario = str_replace('{iptNome}', $iptNome, $this->imprimeFormulario);
        $this->imprimeFormulario = str_replace('{iptMsg}', $iptMsg, $this->imprimeFormulario);
        $this->imprimeFormulario = str_replace('{botaoCriar}', $botaoCriar, $this->imprimeFormulario);
        $this->imprimeFormulario = str_replace('{botaoCancelar}', '', $this->imprimeFormulario);
        #imprime o formulario vazio, pronto para a inserção de dados
        return $this->imprimeFormulario;

    }

    #Construção do formulario de EDIÇÃO substituindo tags especificas.
    public function editarArquivo($directory){
        #Criação e alocação das variaveis
        $cod = str_replace('./usuarios/', '', dirname($directory));
        $arquivo = str_replace('.txt', '', basename($directory));
        $mensagem = file_get_contents($directory, FILE_TEXT);
        #Alimentando varaiveis com inputs
        $iptCod = '<input type="number" min=0 class="form-control" id="codigo" name="codigo" value="' . $cod . '"/>';
        $iptNome = '<input type="text" class="form-control" id="nomeArquivo" name="nomeArquivo" value="' . $arquivo . '"/>';
        $iptMsg = '<textarea class="form-control" id="mensagem" name="mensagem" rows="3">' . $mensagem . '</textarea>';
        $botaoCriar ='<button type="submit" class="btn btn-primary" id="btnCriar" onclick="validacao();">Salvar</button>';
        $botaoCancelar ='<button type="submit" class="btn btn-warning" id="btnCancelar" onclick=location.href="listaArquivo.php">Cancelar</button>';
        #Igualando valores da variavel para mostrar no formulário para a edição
        $this->imprimeFormulario = str_replace('{iptCod}', $iptCod, $this->imprimeFormulario);
        $this->imprimeFormulario = str_replace('{iptNome}', $iptNome, $this->imprimeFormulario);
        $this->imprimeFormulario = str_replace('{iptMsg}', $iptMsg, $this->imprimeFormulario);
        $this->imprimeFormulario = str_replace('{botaoCriar}', $botaoCriar, $this->imprimeFormulario);
        $this->imprimeFormulario = str_replace('{botaoCancelar}', $botaoCancelar, $this->imprimeFormulario);
         #imprime o formulario vazio, pronto para a inserção e alteração de dados
        return $this->imprimeFormulario;

    }

}

?>