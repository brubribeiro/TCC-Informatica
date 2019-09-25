<?php
ob_start();
session_start();
include_once("../admconfeitaria/controller/categoria.controller.php");
include_once("../admconfeitaria/controller/usuario.controller.php");
?>

<!doctype html>
<html class="home blog no-js" lang="pt">
<head>
<title>Doces Sonhos Confeitaria</title>
<meta charset="UTF-8"/>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css" media="all"/>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amatic+SC%3A400%2C700%7CLato%3A400%2C700%2C400italic%2C700italic&amp;ver=4.9.8"
type="text/css" media="screen"/>
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen"/>
<link rel="stylesheet" href="css/print.css" type="text/css" media="print"/>   
<script src='js/jquery-3.0.0.min.js'></script>
<script src='js/jquery-migrate-3.0.1.min.js'></script>
<script src='https://www.google.com/recaptcha/api.js?hl=pt-BR'></script>

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
            <a href="sobrenos.php">Sobre nós</a></li>
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
            <li class="menu-item current-menu-item">
                <a href="facaseupedido.php">Faça seu pedido</a></li>
                <?php } else { ?>
                <li class="menu-item">
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
                                                <?php if(!isset($_SESSION['codusuario'])) { ?>
                                                <li>
                                                    <span>
                                                        <a class="form-submit" href="facaseupedido.php"><font color="#1E90FF"><b>Login</b></a></span></font>
                                                    </li>
                                                    <?php } else { ?>
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
                                        <a href="#topsearch" class="search-trigger"><i class="fa fa-search"></i></a>
                                    </div>
                                </header>
    <div class="wrap full-wrap">
        <div class="main-wrap">
            <section class="main">
                <article class="post page">
                    <div class="inner">
                     <h1>Faça seu pedido</h1>
                     <div class="post-content">
                        <h4>Já possui cadastro?</h4>Com um cadastro você poderá realizar pedidos e consultar o histórico de seus pedidos!              
                        <div class="one_half"><p></p>
                            <p><h4>Se não</h4>Efetue o cadastro clicando no botão abaixo
                                <br><br>
                                <a href="cadastro.php">
                                    <p class="form-submit"><input type="submit" value="Clique aqui"></p></a>
                                </p>
                                <p></p></div>
                                <div class="one_half last"><p></p>
                                    <p><h4>Se sim</h4>Efetue o Login
                                        <form id="login-form" action="?acao=logar_usu" method="post">
                                            <p>Usuário:
                                                <input type="text" name="nomeusuario" placeholder="Digite seu Usuário">
                                            </p>
                                            <p>Senha:
                                                <input type="password" name="senha"  placeholder="Digite sua senha:">
                                            </p>

                                            <img src="captcha.php" alt="Código captcha"><br>

                                            <label>Digite o código</label>
                                            <input type="text" name="captcha"><br><br>

                                            <p class="form-submit"><input type="submit" id="btn-login" value="Login"></p>
                                        </p>
                                        <p></p></div><div class="clearboth"></div>
                                        <div class="border"></div>
                                    </section>
                                </div>
                            </div>
                            <div class="footer-widgets widget-count-4">
                                <div class="wrap">
                                    <div class="mt-about-you-widget">
                                        <div class="widget footer">
                                            <img class="mt-about-avatar" src="images/docessonhos.png" alt="Doces Sonhos"/>
                                            <h4>Doces Sonhos Confeitaria</h4>
                                            <div class="mt-about-bio">
                                                <p>O sabor da vida depende de quem tempera. Adicione mais amor.</p>
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
                                            <img src="images/gallery.png" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <footer class="footer">
                                <div class="footer-wrap">
                                    <div id="footer-text">&copy; Doces Sonhos Confeitaria.</div>
                                    <a href="#top" id="btt">Subir <i class="fa fa-chevron-up"></i></a>
                                </div>
                            </footer>
                            <div id="topsearch">
                                <div class="table">
                                    <div class="table-cell">
                                        <form role="search" method="get" class="searchform" action="facaseupedido.php">
                                            <div>
                                                <input type="text" value="" name="s" class="s" placeholder="Digite e pressione enter"/>
                                                <input type="submit" class="searchsubmit" value="Search"/>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <a href="#topsearch" class="search-trigger"><i class="fa fa-times"></i></a>
                            </div>
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
                            <script src="js/custom.js"></script>  
                            <script>var ie9 = false;</script>
                            <script src="js/global-plugins.min.js"></script>
                            <script src="js/main.js"></script>
                            <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
                            <script src="js/_form.js"></script>
                        </body>
                        </html>