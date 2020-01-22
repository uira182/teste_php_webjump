<?php

class AtualizaProduto {

    public function edtProduto($id, $sku, $nome, $description, $image, $price, $quantity, $category) {
        $prodCat = new CadastroCategoria();
        var_dump($image);
        if (!empty($image['name'])) {
            $image = new Images($image);
            $image = $image->getArquivo();
        } else {
            $image = "assets/images/image-default.png";
        }

        $query = "UPDATE produtos SET sku='$sku', name='$nome', description='$description', image='$image', price='$price', quantity='$quantity' WHERE ";
        $this->execute($query);
        $prodCat->cadastroCategoriaProduto($sku, $category);
        //var_dump($result);
    }

}
