<?php

class CadastroCategoria extends Conexao {

    public function __construct() {
        parent::__construct();
    }

    public function cadastroCategoriaLista($categoria) {
        $query = "INSERT INTO categoria (nome_categoria) VALUES ('$categoria')";
        $resultado = $this->execute($query);
        return $resultado;
    }

    public function cadastroCategoriaProduto($prod, $cat) {
        $query = "INSERT INTO categorias_produto (produto, categoria) VALUES ('$prod', '$cat')";
        $result = $this->execute($query);
    }

    public function cadastroCategoria($nome) {
        $query = "INSERT INTO categoria (nome_categoria) VALUES ('$nome')";
        $result = $this->execute($query);
        if (!$result) {
            echo"<script>alert('Erro ao cadastrar!');</script>";
        } else {
            echo"<script>alert('Sucesso! Cadastro efetuado.');</script>";
            header("Location: ?pg=Categorias");
        }
    }

}
