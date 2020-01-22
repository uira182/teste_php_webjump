<?php
$listCategoria = new ListarCategorias();
$edtCategoria = new AtualizaCategoria();

$id = $_GET['id'];

$listCategoria = $listCategoria->idCategoria($id);

if (isset($_POST['add_categoria'])) {
    $nome = $_POST['name'];
    $edtCategoria->updateCategoria($id, $nome);
    header("Location: ?pg=Categorias");
}
?>
<h1 class="title new-item">New Category</h1>

<form method="post">
    <div class="input-field">
        <label for="category-name" class="label">Category Name</label>
        <input name="name" type="text" id="category-name" value="<?php echo $listCategoria['nome_categoria']; ?>" class="input-text" />
    </div>
    <div class="actions-form">
        <a href="?pg=Categorias" class="action back">Back</a>
        <input name="add_categoria" class="btn-submit btn-action"  type="submit" value="Save" />
    </div>
</form>