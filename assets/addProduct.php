<?php
//var_dump($_POST);
$categoria = new ExibirCategorias();

if (isset($_POST['cadastrar'])) {

    $cadastroProduto = new CadastroProduto();

    $cadastroProduto->addProduto($_POST['add_sku'], $_POST['add_name'], $_POST['add_description'], $_FILES['add_image'], $_POST['add_price'], $_POST['add_quantity'], $_POST['add_category']);
}
if (isset($_POST['cadList'])) {
    $cadastroProduto = new CsvList($_FILES['add_csv']);
}
?>
<h1 class="title new-item">New Product List</h1>
<form method="post" name="f_add_csv" enctype="multipart/form-data">
    Selecione uma lista .csv: <input class="input-image" name="add_csv" type="file" />

    <input class="btn-submit btn-action" name="cadList" type="submit" value="Save List" />
</form>
<h1 class="title new-item">New Product</h1>

<form method="post" name="f_add" enctype="multipart/form-data">
    <div class="input-field-image">
        Selecione uma imagem: <input class="input-image" name="add_image" type="file" />

    </div>
    <div class="input-field">
        <label for="sku" class="label">Product SKU</label>
        <input type="text" name="add_sku" class="input-text" placeholder="Codigo" /> 
    </div>
    <div class="input-field">
        <label for="name" class="label">Product Name</label>
        <input type="text" name="add_name" class="input-text" placeholder="Nome" /> 
    </div>
    <div class="input-field">
        <label for="price" class="label">Price</label>
        <input type='number' step='0.01' name="add_price" class="input-text" placeholder="R$: 99,99"/> 
    </div>
    <div class="input-field">
        <label for="quantity" class="label">Quantity</label>
        <input type="text" name="add_quantity" class="input-text" placeholder="Quantidade" /> 
    </div>
    <div class="input-field">
        <label for="category" class="label">Categories</label>
        <select multiple name="add_category" class="input-text">
            <?php $categoria->allOption(); ?>
        </select>
    </div>
    <div class="input-field">
        <label for="description" class="label">Description</label>
        <textarea id="description" class="input-text" name="add_description"></textarea>
    </div>
    <div class="actions-form">
        <a href="index.php" class="action back">Back</a>
        <input class="btn-submit btn-action" name="cadastrar" type="submit" value="Save Product" />
    </div>

</form>