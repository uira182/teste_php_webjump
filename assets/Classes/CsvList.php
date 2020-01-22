<?php

class CsvList {

    private $arquivo;

    public function __construct($arquivo) {
        $this->readCsv($arquivo);
    }

    private function readCsv($arquivo) {
        $category = new ListarCategorias();
        $cadProdutos = new CadastroProduto();
        $cadCategoria = new CadastroCategoria();
        //var_dump($arquivo);
        $csv = $arquivo['tmp_name'];
        $nome = $arquivo['name'];

        $ext = explode(".", $nome);

        $extensao = end($ext);

        if ($extensao != "csv") {
            echo "Extensão Invalida";
        } else {
            $objeto = fopen($csv, 'r');
            $i = 0;
            while (($dados = fgetcsv($objeto, 1000, ";")) !== FALSE) {
                if ($i > 0) {
                    //var_dump($dados);
                    $nome = utf8_encode($dados[0]);
                    $sku = utf8_encode($dados[1]);
                    $desc = utf8_encode($dados[2]);
                    $quant = utf8_encode($dados[3]);
                    $preco = utf8_encode($dados[4]);
                    $cadProdutos->addListProduto($sku, $nome, $desc, $preco, $quant);
                    $cat = utf8_encode($dados[5]);
                    $extensao = explode("|", $cat);
                    $j = 0;
                    foreach ($extensao as $ext) {
                        if ($j > 0) {
                            $resultado = $category->readCategoria($ext);
                            if (!$resultado) {
                                $cad = $cadCategoria->cadastroCategoriaLista($ext);
                                $cadCategoria->cadastroCategoriaProduto($sku, $cad);
                            } else {
                                $cad = $resultado['id_categoria'];
                                $cadCategoria->cadastroCategoriaProduto($sku, $cad);
                            }
                        } else {
                            $j++;
                        }
                    }
                    //echo "$i º - $nome - $desc - $sku - $quant - $preco - $cat <br />";
                    $i++;
                } else {
                    $i++;
                }
            }
        }
    }

    public function getArquivo() {
        return $this->arquivo;
    }

}
