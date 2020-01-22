<?php
$categoria_add = new CadastroCategoria();

if (isset($_POST['add_categoria'])) {
    $categoria_add->cadastroCategoria($_POST['name']);
}
?>
<h1 class="title new-item">New Category</h1>

<form method="post">
    <div class="input-field">
        <label for="category-name" class="label">Category Name</label>
        <input name="name" type="text" id="category-name" class="input-text" />
    </div>
    <div class="actions-form">
        <a href="?pg=Categorias" class="action back">Back</a>
        <input name="add_categoria" class="btn-submit btn-action"  type="submit" value="Save" />
    </div>
</form>