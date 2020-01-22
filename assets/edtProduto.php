<?php
//var_dump($_POST);
$categoria = new ExibirCategorias();
$prodList = new ListarProdutos();
$id = $_GET['id'];
$prodInfo = $prodList->oneProdutos($id);

if (empty($prodInfo['image'])) {
    $prodInfo['image'] = 'assets/images/image-default.png';
    $titleImg = "No image file";
} else {
    $titleImg = $prodInfo['name'];
}

if (isset($_POST['updateProduto'])) {
    $cadastroProduto = new CadastroProduto();

    $cadastroProduto->edtProduto($_GET['id  '], $_POST['add_sku'], $_POST['add_name'], $_POST['add_description'], $_FILES['add_image'], $_POST['add_price'], $_POST['add_quantity'], $_POST['add_category']);
}
?>
<h1 class="title new-item">Edit Product</h1>

<form method="post" name="f_add" enctype="multipart/form-data">
    <div class="input-field-image">
        <img  src="<?php echo $prodInfo['image'] ?>" title="<?php echo $titleImg; ?>" width="200px" /><br /><br />
        Selecione uma imagem: <input class="input-image" name="add_image" type="file" />
    </div>
    <div class="input-field">
        <label for="sku" class="label">Product SKU</label>
        <input type="text" name="add_sku" value="<?php echo $prodInfo['sku'] ?>" class="input-text" placeholder="Codigo" /> 
    </div>
    <div class="input-field">
        <label for="name" class="label">Product Name</label>
        <input type="text" name="add_name" value="<?php echo $prodInfo['name'] ?>" class="input-text" placeholder="Nome" /> 
    </div>
    <div class="input-field">
        <label for="price" class="label">Price</label>
        <input type='number' step='0.01' name="add_price" value="<?php echo $prodInfo['price'] ?>" class="input-text" placeholder="R$: 99,99"/> 
    </div>
    <div class="input-field">
        <label for="quantity" class="label">Quantity</label>
        <input type="text" name="add_quantity" value="<?php echo $prodInfo['quantity'] ?>" class="input-text" placeholder="Quantidade" /> 
    </div>
    <div class="input-field">
        <label for="category" class="label">Categories</label>
        <select multiple name="add_category" class="input-text">
            <?php $categoria->allOption(); ?>
        </select>
    </div>
    <div class="input-field">
        <label for="description" class="label">Description</label>
        <textarea id="description" class="input-text" name="add_description"> "<?php echo $prodInfo['description'] ?>"</textarea>
    </div>
    <div class="actions-form">
        <a href="?pg=Produtos" class="action back">Back</a>
        <input class="btn-submit btn-action" name="updateProduto" type="submit" value="Update Product" />
    </div>

</form>