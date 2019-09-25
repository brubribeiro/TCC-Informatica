<?php
ob_start();
session_start();
if(!isset($_SESSION['codusuario']))//verificar não existe a sessão
{
    header("location:facaseupedido.php");//volta para o login
}
include_once("../admconfeitaria/controller/categoria.controller.php");
include_once("../admconfeitaria/controller/usuario.controller.php");
include_once("conexao.php");

$usu = $usu->RetornarDados($_SESSION["codusuario"]);

?>
<!doctype html>
<!-- aumentar a parte branca, menu-->
<html class="home blog no-js" lang="pt">
<head>
    <title>Doces Sonhos Confeitaria</title>

    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
          type="text/css" media="all"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amatic+SC%3A400%2C700%7CLato%3A400%2C700%2C400italic%2C700italic&amp;ver=4.9.8"
          type="text/css" media="screen"/>
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen"/>
    <link rel="stylesheet" href="css/print.css" type="text/css" media="print"/>    
    <script src='js/jquery-3.0.0.min.js'></script>
    <script src='js/jquery-migrate-3.0.1.min.js'></script>
    
</head>
<body class="home sticky-menu sidebar-off" id="top">

<header class="header">

    <div class="header-wrap">

        <div class="logo plain logo-left">
            <div class="site-title">
                <a href="index.php" title="Go to Home">Doces Sonhos Confeitaria</a>
            </div>
        </div>
        <nav id="nav" role="navigation">
            <div class="table">
                <div class="table-cell">
                    <ul id="menu-menu-1">
                        <li class="menu-item">
                            <a href="index.php">Inicio</a></li>
                        <li class="menu-item">
                            <a href="sobrenos.php">Sobre Nós</a></li>
                        <li class="menu-item">
                            <a href="#">Cardápio</a>
                            <ul class="sub-menu">
                                
                            <?php 
                            foreach ($cat->Consultar() as $linha) { ?>

                                <li class="menu-item">
                                    <a href="produto.php?codcategoria=<?php echo $linha->codcategoria;?>"><?php echo $linha->descricao;?></a>
                                </li>

                            <?php } ?>

                            </ul>
                        </li>
                        <?php 
                        if(!isset($_SESSION['codusuario'])) { ?>
                            <li class="menu-item">
                            <a href="facaseupedido.php">Faça seu pedido</a></li>
                        <?php } else { ?>
                            <li class="menu-item">
                            <a href="areacliente.php">Área do Cliente</a>
                            <ul class="sub-menu">
                            <li class="menu-item current-menu-item">
                                    <a href="comprarproduto.php">Novo Pedido</a></li>
                            <li class="menu-item">
                                    <a href="meuspedidos.php">Meus Pedidos</a></li>
                            <li class="menu-item">
                                    <a href="meusdados.php">Meus Dados</a></li></ul></li>
                        <?php } ?> 
                        <li class="menu-item">
                            <a href="contato.php">Contato</a></li>
                            <li class="menu-inline menu-item">
                                <a title="Twitter" href="http://twitter.com/cdocessonhos">
                                    <i class="fa fa-twitter"></i><span class="i">Twitter</span>
                                </a></li>
                                <li class="menu-inline menu-item">
                                    <a title="Facebook" href="http://www.facebook.com/confeidocessonhos">
                                        <i class="fa fa-facebook"></i><span class="i">Facebook</span>
                                    </a></li>                        
                                    <li class="menu-inline menu-item">
                                        <a title="Instagram" href="http://www.instagram.com/confeidocessonhos">
                                            <i class="fa fa-instagram"></i><span class="i">Instagram</span>
                                        </a>
                                    </li>
                        <?php
                                if(!isset($_SESSION['codusuario'])){ ?>
                                <li>
                                    <span>
                                        <a class="form-submit" href="login.php"><font color="#474545"><b>Login</b></a></span></font>
                                </li>
                                <?php } else {  ?>
                                <li>
                                    <span>
                                        <a class="form-submit" href="../admconfeitaria/controller/sair.php"><font color="#e21414"><b>Sair</b></a></span></font>
                                </li>
                                <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>
        <a href="#nav" class="menu-trigger"><i class="fa fa-bars"></i></a>
    </div>
                <?php
                error_reporting(0);
                $sessao = $_SESSION['pedido'];
                $consulta = $pdo->prepare("SELECT * FROM carrinho_temporario WHERE temporario_sessao =:ses");
                $consulta -> bindValue(':ses', $sessao);
                $consulta -> execute();
                $linhas = $consulta -> rowCount();
                ?>
</header>
<div class="wrap full-wrap">
    <div class="main-wrap">
        <div class="related-posts">
            <h2 class="home-sticky-title">Nosso Cardápio</h2>
                <div class="sticky-inner">
                    <p style="text-align: left">
                    <a href="carrinho.php" style="text-align: left," class="btncarrinho""><h4 class="text-right">Carrinho(<?= $linhas ?>)</h4>
                    </a>
                </p>
                <br>
                <div class="posts">
                <div class="home-sticky" id="content">
            <?php
                    $consulta = $pdo->prepare("SELECT * FROM carrinho_produtos");
                    $consulta -> execute();             
                    $linhas = $consulta -> rowCount();              
                    foreach($consulta as $mostra):
                    ?>        
            <aside class="home-sticky-post post has-post-thumbnail sticky">
            <span class="post-image">
            <a href="#">
            <img width="400" height="400"  src="images/<?= $mostra['produto_img']?>" class="attachment-sticky size-sticky" alt=""/></a>
            </span>
            <div class="inner">
            <h6 class="produtotitulo"><?= $mostra['produto_nome']?></h6>
            <ul class="meta top">
            <li class="time"> 
            <div class="espaco-normal">
            <p class="produtopreco">R$ <?= number_format($mostra['produto_preco'], 2,',','.')?></p>
            <p class="btncomprar"><a href="comprar.php?prod=<?= $mostra['produto_id']?>" class="color-white">Comprar Produto</a></p>
                    </div>           
            </li>
            </ul>
        </div>
        </aside>
        <?php endforeach; ?>                                       
                </div>
        </div>
    </div>
</div>
<div class="footer-widgets widget-count-4">
    <div class="wrap">
        <div class="mt-about-you-widget">
            <div class="widget footer">
                <img class="mt-about-avatar" src="images/docessonhos.png" alt=""/>
                <h4>Doces Sonhos</h4>
                <div class="mt-about-bio">
                    <p>
                        O sabor da vida depende de quem tempera. Adicione mais amor.
                    </p>
                </div>
            </div>
        </div>
         <div class="widget footer"><h4>Nosso Cardápio</h4>
            <ul>
               <?php foreach ($cat->Consultar() as $linha) { ?>
                <li class="menu-item">
                <a href="produto.php?codcategoria=<?php echo $linha->codcategoria;?>"><?php echo $linha->descricao;?></a>
                </li>
                <?php } ?>             
            </ul>
        </div>
        <div class="widget footer"><h4>Categorias</h4>
            <ul>
                <li class="cat-item cat-item-6">
                    <a href="index.php">Início</a> 
                </li>
                <li class="cat-item cat-item-7">
                    <a href="sobrenos.php" >Sobre nós</a> 
                </li>
                <li class="cat-item cat-item-8">
                    <a href="facaseupedido.php">Faça seu pedido</a>
                </li>
                <li class="cat-item cat-item-9">
                    <a href="contato.php">Contato</a>
                </li>
            </ul>
        </div>
        <div class="widget footer"><h4>Galeria</h4>
            <div class="textwidget">
                <img src="images/galeria1.jpg" alt="">
            </div>
        </div>
    </div>
</div>
<footer class="footer"> 
</footer>
<div id="topsearch">
    <div class="table">
        <div class="table-cell">
            <form role="search" method="get" class="searchform" action="comprarproduto.php">
                <div>
                    <input type="text" value="" name="s" class="s" placeholder="Digite e pressione enter"/>
                    <input type="submit" class="searchsubmit" value="Search"/>
                </div>
            </form>
        </div>
    </div>
    <a href="#topsearch" class="search-trigger"><i class="fa fa-times"></i></a>
</div>
<script>var ie9 = false;</script>
<script src="js/global-plugins.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>