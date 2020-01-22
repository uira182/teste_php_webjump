<?php

class AtualizaCategoria extends Conexao {

    public function __construct() {
        parent::__construct();
    }

    public function updateCategoria($id, $nome) {
        $query = "UPDATE categoria SET nome_categoria='$nome' WHERE id_categoria='$id'";
        $result = $this->execute($query);
    }

}
