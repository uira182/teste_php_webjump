<?php

class CadastroProduto extends Conexao {

    public function __construct() {
        parent::__construct();
    }

    public function addListProduto($sku, $nome, $description, $price, $quantity) {
        $image = "";
        $query = "INSERT INTO produtos (sku, name, description, image, price, quantity) VALUES ('$sku', '$nome', '$description', '$image', '$price', '$quantity')";
        $this->execute($query);
        //var_dump($result);
    }

    public function addProduto($sku, $nome, $description, $image, $price, $quantity, $category) {
        $prodCat = new CadastroCategoria();
        var_dump($image);
        if (!empty($image['name'])) {
            $image = new Images($image);
            $image = $image->getArquivo();
        } else {
            $image = "assets/images/image-default.png";
        }

        $query = "INSERT INTO produtos (sku, name, description, image, price, quantity) VALUES ('$sku', '$nome', '$description', '$image', '$price', '$quantity')";
        $this->execute($query);
        $prodCat->cadastroCategoriaProduto($sku, $category);
        //var_dump($result);
    }

}
