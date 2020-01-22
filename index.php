<?php
require_once ('assets/function/autoload.php');
?>
<!doctype html>
<html>
    <head>
        <title>Webjump | Backend Test | Dashboard</title>
        <meta charset="utf-8">

        <link  rel="stylesheet" type="text/css"  media="all" href="assets/css/style.css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,800" rel="stylesheet">
        <meta name="viewport" content="width=device-width,minimum-scale=1">
        <style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
        <script async src="https://cdn.ampproject.org/v0.js"></script>
        <script async custom-element="amp-fit-text" src="https://cdn.ampproject.org/v0/amp-fit-text-0.1.js"></script>
        <script async custom-element="amp-sidebar" src="https://cdn.ampproject.org/v0/amp-sidebar-0.1.js"></script>
    </head>
    <!-- Header -->
    <amp-sidebar id="sidebar" class="sample-sidebar" layout="nodisplay" side="left">
        <div class="close-menu">
            <a on="tap:sidebar.toggle">
                <img src="assets/images/bt-close.png" alt="Close Menu" width="24" height="24" />
            </a>
        </div>
        <a href="index.php">
            <img src="assets/images/menu-go-jumpers.png" alt="Welcome" width="200" height="43" />
        </a>
        <div>
            <ul>
                <li><a href="?pg=Categorias" class="link-menu">Categorias</a></li>
                <li><a href="?pg=Produtos" class="link-menu">Produtos</a></li>
            </ul>
        </div>
    </amp-sidebar>
    <header>
        <div class="go-menu">
            <a on="tap:sidebar.toggle">☰</a>
            <a href="index.php" class="link-logo">
                <img src="assets/images/go-logo.png" alt="Welcome" width="69" height="430" />
            </a>
        </div>
        <div class="right-box">
            <span class="go-title">Administration Panel</span>
        </div>    
    </header>  
    <!-- Header -->
    <!-- Main Content -->
    <main class="content">
        <?php
        if (isset($_GET['pg'])) {
            switch ($_GET['pg']) {
                case 'CadPro':
                    require_once './assets/addProduct.php';
                    break;
                case 'Categorias':
                    require_once './assets/categoria.php';
                    break;
                case 'Produtos':
                    require_once './assets/produtos.php';
                    break;
                case 'AddCategoria':
                    require_once './assets/addCategoria.php';
                    break;
                case 'EdtCategoria':
                    require_once './assets/edtCategoria.php';
                    break;
                case 'EdtProduto':
                    require_once './assets/edtProduto.php';
                    break;
                default :
                    require_once './assets/dashboard.php';
                    break;
            }
        } else {
            require_once './assets/dashboard.php';
        }
        ?>
    </main>
    <!-- Main Content -->

    <!-- Footer -->
    <footer>
        <div class="footer-image">
            <img src="assets/images/go-jumpers.png" width="119" height="26" alt="Go Jumpers" />
        </div>
        <div class="email-content">
            <span>go@jumpers.com.br</span>
        </div>
    </footer>
    <!-- Footer -->
</body>
</html>
