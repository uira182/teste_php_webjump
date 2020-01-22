<?php $exibeProdutos = new ExibirProdutos(); ?>
<div class="header-list-page">
    <h1 class="title">Dashboard</h1>
</div>
<div class="infor">
    You have 4 products added on this store: <a href="?pg=CadPro" class="btn-action">Add new Product</a>
</div>
<ul class="product-list">
    <?php $exibeProdutos->allList(); ?>
</ul>