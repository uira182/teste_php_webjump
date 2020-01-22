<?php

class ExibirCategorias extends ListarCategorias {

    public function __construct() {
        parent:: __construct();
    }

    public function categoriaProduto($prod) {
        $resultado = "";
        $listCategoria = $this->listarCategoriaProduto($prod);
        foreach ($listCategoria as $lc) {
            $res_cat = $this->listCatProd($lc['categoria']);
            //var_dump($res_cat);
            $resultado .= '<span class="data-grid-cell-content">' . $res_cat . '<br /></span>';
        }
        return $resultado;
        //var_dump($resultado);
    }

    public function listCatProd($cat) {
        $categoria = $this->idCategoria($cat);
        return $categoria['nome_categoria'];
    }

    public function allOption() {
        $categorias = $this->listarCategorias();
        foreach ($categorias as $c) {
            echo' 
                <option value="' . $c['id_categoria'] . '">' . $c['nome_categoria'] . '</option>
            ';
        }
    }

    public function allList() {
        $categorias = $this->listarCategorias();
        foreach ($categorias as $c) {
            echo' 
                <tr class="data-row">
                    <td class="data-grid-td">
                        <span class="data-grid-cell-content">' . $c['nome_categoria'] . '</span>
                    </td>

                    <td class="data-grid-td">
                        <span class="data-grid-cell-content">' . $c['id_categoria'] . '</span>
                    </td>

                    <td class="data-grid-td">
                        <div class="actions">
                            <a href="?pg=EdtCategoria&id=' . $c['id_categoria'] . '">
                                <div class="">
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
