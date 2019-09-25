<?php
ob_start();
session_start();
if(!isset($_SESSION['codusuario']))//verificar não existe a sessão
{
    header("location:facaseupedido.php");//volta para o login
}
include_once("../admconfeitaria/controller/categoria.controller.php");
include_once("../admconfeitaria/controller/usuario.controller.php");
$usu = $usu->RetornarDados($_SESSION["codusuario"]);
?>
<!doctype html>
<html class="home blog no-js" lang="en-US">
<head>
    <title>Doces Sonhos Confeitaria</title>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css" media="all"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amatic+SC%3A400%2C700%7CLato%3A400%2C700%2C400italic%2C700italic&amp;ver=4.9.8" type="text/css" media="screen"/>
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
                            <?php foreach ($cat->Consultar() as $linha) { ?>
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
                            <li class="menu-item current-menu-item">
                            <a href="areacliente.php">Área do Cliente</a>
                            <ul class="sub-menu">
                            <li class="menu-item">
                                    <a href="comprarproduto.php">Novo Pedido</a></li>
                            <li class="menu-item">
                                    <a href="meuspedidos.php">Meus Pedidos</a></li>
                            <li class="menu-item">
                                    <a href="meusdados.php">Meus Dados</a></li></ul></li>
                        <?php } ?> 

                        <li class="menu-item">
                            <a href="contato.php">Contato</a></li>                       
                        <li class="menu-inline menu-item">
                            <a title="Twitter" href="http://twitter.com/fh5co">
                                <i class="fa fa-twitter"></i><span class="i">Twitter</span>
                            </a></li>
                        <li class="menu-inline menu-item">
                            <a title="Facebook" href="http://www.facebook.com/fh5co">
                                <i class="fa fa-facebook"></i><span class="i">Facebook</span>
                            </a></li>                        
                        <li class="menu-inline menu-item">
                            <a title="Instagram" href="#">
                                <i class="fa fa-instagram"></i><span class="i">Instagram</span>
                            </a>
                        </li>
                        <?php 
                                //session_start();
                                if(!isset($_SESSION['codusuario']))//verificar não existe a sessão 
                                {
                                ?>
                                <li>
                                    <span>
                                        <a class="form-submit" href="login.php"><font color="#474545"><b>Login</b></a></span></font>
                                </li>
                                <?php
                                }
                                else
                                {
                                ?>
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

</header>

<div class="wrap full-wrap">
    <div class="main-wrap">
        <section class="main main-archive">

            <article class="post result">
        
      <div class="post-content">
                <blockquote class="content-quote">
                     <a href="images/<?php echo $usu->imgperfil;?>"><img class="rounded" src="images/<?php echo $usu->imgperfil;?>" alt="Imagem de Perfil" width="200" height="200"></a>  
                     <p>Bem Vindo(a), <?php echo $_SESSION['nomeusuario']; ?></p>
                        <cite>Não deixe para amanhã o que você pode pedir hoje.</cite>
                </blockquote>
        </div>


        <div class="related-posts">

                <h5>Experimente</h5>

                <div class="posts">

                    <aside class="related post has-post-thumbnail">

                        <span class="post-image">
                            <a href="#" title="The Apothecary">
                                <img width="468" height="468" src="images/morango.jpg" alt=""></a>
                        </span>

                        <div class="inner">
                            <h6 class="entry-title">
                                <a href="#" title="Torta de Morango">
                                    Torta de Morango
                                </a>
                            </h6>
                        </div>
                    </aside>


                    <aside class="related post has-post-thumbnail">

                        <span class="post-image">
                            <a href="#" title="The Flowers">
                                <img width="468" height="468" src="images/bolo03.jpg" alt="" ></a>
                        </span>
                        <div class="inner">
                            <h6 class="entry-title">
                                <a href="#" title="Bolo de Bombom">
                                    Bolo de Bombom
                                </a>
                            </h6>
                        </div>
                    </aside>

                    <aside class="related post has-post-thumbnail">
                        <span class="post-image">
                            <a href="#" title="The Sunny Day">
                                <img width="468" height="468" src="images/limao.jpg" alt="">
                            </a>
                        </span>
                        <div class="inner">

                            <h6 class="post-title entry-title">

                                <a href="#" title="Torta de Limão">
                                    Torta de Limão
                                </a>
                            </h6>
                        </div>
                    </aside>

                </div></div>
<!--
                        
            </article>
            <div class="border"></div>

        </section>
    </div><!-- /main-wrap -->
</div><!-- /wrap -->


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
               <?php 
                 foreach ($cat->Consultar() as $linha) { ?>

                <li class="menu-item">
                <a href="produto.php?codcategoria=<?php echo $linha->codcategoria;?>"><?php echo $linha->descricao;?></a>
                </li>

                <?php } ?>             
            </ul>
        </div>
        <div class="widget footer"><h4>Categorias</h4>
            <ul>
                <li class="cat-item cat-item-6">
                    <a href="index.php">Início</a> <!--title="A cute little description would go in here" -->
                </li>
                <li class="cat-item cat-item-7">
                    <a href="sobrenos.php" >Sobre nós</a> <!--title="Quer saber mais sobre nós? clique aqui" -->
                </li>
                <li class="cat-item cat-item-8">
                    <a href="facaseupedido.php">Faça seu pedido</a> <!--title="Quer fazer um pedido? clique aqui"  -->
                </li>
                <li class="cat-item cat-item-9">
                    <a href="contato.php">Contato</a>
                </li>
            </ul>
        </div>
        <div class="widget footer"><h4>Galeria</h4>
            <div class="textwidget">
                <img src="images/gallery.png" alt="">
            </div>
        </div>
    </div>

</div>


<footer class="footer">
    
</footer>

<div id="topsearch">
    <div class="table">
        <div class="table-cell">
            <form role="search" method="get" class="searchform" action="index.html">
                <div>
                    <input type="text" value="" name="s" class="s" placeholder="Type and hit enter"/>
                    <input type="submit" class="searchsubmit" value="Search"/>
                </div>
            </form>
        </div>
    </div>
    <a href="#topsearch" class="search-trigger"><i class="fa fa-times"></i></a>
</div>


<script>var ie9 = false;</script>
<!--[if lte IE 9 ]>
<script> var ie9 = true; </script>
<![endif]-->
<script src="js/global-plugins.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>
