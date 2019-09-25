<?php
ob_start();
session_start();
if(!isset($_SESSION['codusuario']))//verificar não existe a sessão
{
    header("location:facaseupedido.php");//volta para o login
}
include_once("../admconfeitaria/controller/categoria.controller.php");
include_once("../admconfeitaria/controller/usuario.controller.php");
include_once("../admconfeitaria/controller/carrinho_produtos.controller.php");
include_once("../admconfeitaria/controller/carrinho_cupom.controller.php");
include_once("../admconfeitaria/controller/carrinho_temporario.controller.php");
include_once("../admconfeitaria/controller/carrinho_pedidos.controller.php");
include_once("conexao.php");

$usu = $usu->RetornarDados($_SESSION["codusuario"]);

?>
<!doctype html>
<html class="home blog no-js" lang="pt">
<head>
    <title>Doces Sonhos Confeitaria</title>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" stype="text/css" media="all"/>
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
                        <?php  
                                if(!isset($_SESSION['codusuario'])) { ?>
                                <li>
                                    <span>
                                        <a class="form-submit" href="login.php"><font color="#474545"><b>Login</b></a></span></font>
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
    </div>
</header>
<div class="wrap full-wrap">
    <div class="main-wrap">
        <section class="main main-archive">
<section>
            <header>
                <p class="text-right2"><a href="comprarproduto.php" class="btnprodutos">Produtos</a></p><br>
                <h1 colspan="4" class="titulocarrinho">CARRINHO</h1>
            </header>
            <article class="first float-left">
            <table>
            <?php
                error_reporting(0);
                $sessao = $_SESSION['pedido'];
                $consulta = $pdo->prepare("SELECT * FROM carrinho_temporario WHERE temporario_sessao =:ses");
                $consulta -> bindValue(':ses', $sessao);
                $consulta -> execute();
                
                $total = 0;
                $linhas = $consulta -> rowCount();
                foreach($consulta as $mostra):
                $total += $mostra['temporario_preco'];
                
                    $prod = $mostra['temporario_produto'];
                    $consultar = $pdo->prepare("SELECT * FROM carrinho_produtos WHERE produto_id =:prod");
                    $consultar -> bindValue(':prod', $prod);
                    $consultar -> execute();
                    foreach($consultar as $mostrar):
                        $produtos = $mostrar['produto_nome'];
            ?>
            <tr>
                <td class="bgcolor-gray"><p class="text-center color-dark-full font-text-light"><?= $produtos; ?></p>
                <input type="text" name="produto" value="<?= $produtos?>" style="display:none" ></td>
                <form method="post">
                <td class="bgcolor-gray"><p class="text-center color-dark-full font-text-light">
                    <input type="text" value="<?= $mostrar['produto_quantidade']?>" name="1" id="estoque" style="display:none;">
                    <input type="text" value="<?= $mostrar['produto_preco'];?>" name="preco" id="estoque" style="display:none;">
                    <input type="number" name="id"  value="<?= $mostra['temporario_id']?>" style="display:none;">
                    <input type="number" name="quantidade"  value="<?= $mostra['temporario_quantidade']?>" class="text-center" id="qtd" onchange="acrescentar()">&nbsp;<b><span id="resultado"></span></b> &nbsp;<button class="btnalterar" name="alterar" value="Alterar"> Alterar</button></p>
                    <script type="text/javascript">
                    var myVar = setInterval(acrescentar, 1000);
                    function acrescentar () {
                        var qtd = document.getElementById( 'qtd' );
                        var estoque = document.getElementById( 'estoque' );
                        var resultado = document.getElementById( 'resultado' );                       
                        var valor_qtd = qtd.value;
                        var valor_est = parseInt( estoque.value ) ;
                        
                       
                        if(valor_qtd <= valor_est && valor_qtd >= 0){
                            document.getElementById("resultado").innerHTML = "";                           
                        }else if(valor_qtd < 0){
                            document.getElementById("resultado").innerHTML = "Estoque Negativo Inexistente!";
                        }else{
                            document.getElementById("resultado").innerHTML = "Estoque Insuficiente! temos apenas: "+valor_est+ "produtos";
                        } 
                    }
                    </script>
                    <?php
                        if(isset($_POST['alterar'])):
                            $qtde = filter_input(INPUT_POST,'quantidade');
                            $id = filter_input(INPUT_POST,'id');
                            $preco = filter_input(INPUT_POST,'preco');
                            echo '<script>window.location="alterar.php?qtd='.$qtde.'&preco='.$preco.'&ref='.$id.'"</script>';
                        endif;
                    ?>
                </td>
                <td class="bgcolor-gray"><p class="text-center color-dark-full font-text-light">R$ <?=  number_format($mostra['temporario_preco'], 2,',','.');?></p></td>
                <input type="text" name="preco" value="<?= $mostra['temporario_preco'] ?>" style="display:none" >
                </form>                
                <td class="bgcolor-gray"><p class="text-center font-text-light"><a href="excluir-produto.php?ref=<?= $mostra['temporario_id']?>" class="color-dark-full">Excluir Produto</a></p></td>
            </tr>
            <?php endforeach; endforeach; ?>
            <tr>
                <td colspan="3" class="bgcolor-dark text-right color-white">
                    <form method="post">
                        <input type="text" name="cupom" placeholder="Se você tem um cupom de desconto. Coloque aqui...">
                        <button class="btndesconto" name="descontar" value="Descontar">Descontar</button>
                    </form>
                    <?php
                        if(isset($_POST['descontar'])):
                            $cupom = filter_input(INPUT_POST, 'cupom');                           
                            $consulta = $pdo->prepare("SELECT * FROM carrinho_cupom WHERE cupom_titulo = :title");
                            $consulta -> bindValue(':title', $cupom);
                            $consulta -> execute();
                            
                            $linhas = $consulta ->rowCount();
                            foreach($consulta as $mostra):
                                $desc = $mostra['cupom_desconto'];
                            endforeach;
                            
                            if($linhas == 0):
                                echo '<script> alert("Este cupom não existe, digite o cupom corretamente!");</script>';
                            else:
                                if($mostra['cupom_status'] == 1):
                                $desconto = $total - $desc;
                                else:
                                $cal = $total / 100 * $desc;
                                $desconto = $total - $cal;
                                endif;
                            endif;
                        endif;
                    ?>
                </td>
                <?php if(!empty($desconto)): ?>
                <?php if($desconto): ?>
                    <td colspan="1" class="bgcolor-dark text-right color-white">Total da Compra: R$ <?= number_format($desconto, 2,',','.'); ?></td>
                    <?php endif; ?>
                <?php else: ?> 
                    <td colspan="1" class="bgcolor-dark text-right color-white">Total da Compra: R$ <?= number_format($total, 2,',','.'); ?></td>
                <?php endif; ?>
            </tr>
                <?php if(!empty($desconto)): ?>
                <?php if($desconto): ?>
                <td colspan="4" class="bgcolor-dark text-right color-white">
                    <a href="finalizar-pedido.php?total=<?= $car->cupom_desconto; ?>" class="link-bgcolor-red-dark-b text-right color-white">Finalizar Pedido</a>
                </td>
                <?php endif; ?>
                <?php else: ?>
                <td colspan="4" class="bgcolor-dark text-right color-white">
                    <a href="finalizar-pedido.php?total=<?= $total; ?>"  class="link-bgcolor-red-dark-b text-right color-white">Finalizar Pedido</a>
                </td>
                <?php endif; ?>
            <tr>           
            </tr>
            </table>
            </article>
        </section>
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
                <img src="images/Galeria1.jpg" alt="" style="width: 250px;">
            </div>
        </div>
    </div>
</div>
<footer class="footer">
</footer>
<div id="topsearch">
    <div class="table">
        <div class="table-cell">
            <form role="search" method="get" class="searchform" action="carrinho.php">
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
