<?php

class ListarProdutos extends Conexao {

    public function __construct() {
        parent:: __construct();
    }

    protected function listarProdutos() {
        $query = "SELECT * FROM produtos ORDER BY name ASC";
        $resultado = $this->getAll($query);
        return $resultado;
    }

    public function oneProdutos($sku) {
        $query = "SELECT * FROM produtos WHERE sku='$sku'";
        $resultado = $this->getOne($query);
        return $resultado;
    }

}

?>