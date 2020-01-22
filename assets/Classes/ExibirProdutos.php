<?php

class ExibirProdutos extends ListarProdutos {

    public function __construct() {
        parent::__construct();
    }

    public function allList() {
        $produtos = $this->listarProdutos();

        foreach ($produtos as $p) {
            //var_dump($p['image']);
            if (empty($p['image'])) {
                $p['image'] = "assets/images/image-default.png";
                $titleImage = "No image file!";
            } else {
                $titleImage = $p['name'];
            }
            echo '
                <li>
                    <div class="product-image">
                        <a href="assets/tenis-basket-light.html" title="' . $titleImage . '">
                            <img class="ico-product" src="' . $p['image'] . '" layout="responsive" width="164" height="145" alt="' . $p['name'] . '" />
                        </a>
                    </div>
                    <div class="product-info">
                        <div class="product-name">
                            <span><h4>' . substr($p['name'], 0, 200) . '</h4></span><br />
                        </div>
                        <div class="product-description">
                            <span>
                                ' . substr($p['description'], 0, 50) . '...<br /> 
                                <a href="#">Leia mais</a>
                            </span>
                        </div>
                        <div class="product-price">
                            <span class="special-price">' . $p['quantity'] . ' available</span>
                            <span>R$' . number_format($p['price'], 2, ",", ".") . '</span>
                        </div>
                    </div>
                </li>           
            ';
        }
    }

    public function allProdutos() {
        $categoria = new ExibirCategorias();
        $produtos = $this->listarProdutos();
        foreach ($produtos as $p) {
            //var_dump($p['sku']);
            echo' 
            <tr class="data-row">
                <td class="data-grid-td">
                    <span class="data-grid-cell-content">' . $p['name'] . '</span>
                </td>

                <td class="data-grid-td">
                    <span class="data-grid-cell-content">' . $p['sku'] . '</span>
                </td>

                <td class="data-grid-td">
                    <span class="data-grid-cell-content">' . $p['price'] . '</span>
                </td>

                <td class="data-grid-td">
                    <span class="data-grid-cell-content">' . $p['quantity'] . '</span>
                </td>

                <td class="data-grid-td">
                    ' . $categoria->categoriaProduto($p['sku']) . '
                </td>

                <td class="data-grid-td">
                    <div class="actions">
                        <a href="?pg=EdtProduto&id=' . $p['sku'] . '">
                            <div class="action edit">
                                <span>Edit</span>
                            </div>
                        </a>
                        <div class="action delete"><span>Delete</span></div>
                    </div>
                </td>
            </tr>
        ';
        }
    }

}
