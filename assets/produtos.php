<?php $list_produtos = new ExibirProdutos(); ?>
<div class="header-list-page">
    <h1 class="title">Products</h1>
    <a href="addProduct.html" class="btn-action">Add new Product</a>
</div>
<table class="data-grid">
    <tr class="data-row">
        <th class="data-grid-th">
            <span class="data-grid-cell-content">Name</span>
        </th>
        <th class="data-grid-th">
            <span class="data-grid-cell-content">SKU</span>
        </th>
        <th class="data-grid-th">
            <span class="data-grid-cell-content">Price</span>
        </th>
        <th class="data-grid-th">
            <span class="data-grid-cell-content">Quantity</span>
        </th>
        <th class="data-grid-th">
            <span class="data-grid-cell-content">Categories</span>
        </th>

        <th class="data-grid-th">
            <span class="data-grid-cell-content">Actions</span>
        </th>
    </tr>
    <?php $list_produtos->allProdutos(); ?>
</table>