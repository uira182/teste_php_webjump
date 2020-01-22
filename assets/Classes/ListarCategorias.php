<?php

class ListarCategorias extends Conexao {

    public function __construct() {
        parent::__construct();
    }

    protected function listarCategorias() {
        $query = "SELECT * FROM categoria ORDER BY nome_categoria ASC";
        $resultado = $this->getAll($query);
        return $resultado;
    }

    public function listarCategoriaProduto($produto) {
        $query = "SELECT * FROM categorias_produto WHERE produto='$produto'";
        $resultado = $this->getAll($query);
        return $resultado;
    }

    public function readCategoria($categoria) {
        $query = "SELECT * FROM categoria WHERE nome_categoria = '$categoria'";
        $resultado = $this->getOne($query);
        return $resultado;
    }

    public function idCategoria($id) {
        $query = "SELECT * FROM categoria WHERE id_categoria = '$id'";
        $resultado = $this->getOne($query);
        return $resultado;
    }

}
