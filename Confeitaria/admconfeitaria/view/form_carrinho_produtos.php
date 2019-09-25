<?php
ob_start();
session_start();//iniciar sessão
include_once("../controller/imagens.controller.php"); 
include_once("../controller/categoria.controller.php"); 
include_once("../controller/carrinho_produtos.controller.php");
$acao = "acao=cadastrar_car";
if($car->produto_id != 0)
  $acao = "acao=atualizar_car";
?>
<!DOCTYPE html>
<html lang="pt">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistema Administrativo</title>

  
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
 
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    
    <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
    
    <link href="../bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="../dist/css/datepicker.css" rel="stylesheet">   

</head>

<body>

    <div id="wrapper">
       
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
         <?php include_once("topo.php");?>        
         <?php include_once("menu.php");?>         
     </nav>

     <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Cadastro de Produtos</h2>
            </div>
           
        </div>
        
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Dados da Imagem
                    </div>
                    
                    <div class="panel-body">
                <form action="?<?php echo $acao;?>" method="post" role="form" enctype="multipart/form-data">						
                         <div class="form-group">
                            <label>Nome do Produto</label>
                            <input name="produto_nome" class="form-control" id="nome" placeholder="Informe o nome do produto" required value="<?php echo $car->produto_nome;?>">                                           
                        </div>

                        <div class="form-group">
                            <label>Preço</label>
                            <input type="number" name="produto_preco" class="form-control" id="preco" placeholder="Informe o preço" value="<?php echo $car->produto_preco;?>">                           
                        </div>                     

                    <!--<div class="form-group">
                            <label>Categoria</label>
                            <select name="codcategoria" class="form-control">
                        <?php foreach ($cat->Consultar() as $linha): ?>
                            <option value="<?php  echo $linha->codcategoria;?>"><?php echo $linha->descricao;?></option>
                        <?php endforeach;?></select>  
                        <input type="hidden" name="descricao" value="<?php echo $cat->descricao;?>">                                         
                        </div> -->

                        <div class="form-group">
                            <label>Quantidade</label>
                            <input type="number" name="produto_quantidade" class="form-control" id="quantidade" placeholder="Informe a quantidade" value="<?php echo $car->produto_quantidade;?>">                           
                        </div>


                        <div class="form-group">
                            <label>Imagem</label>
                            <input type="file" name="produto_img" class="form-control" id="imagem">
                        </div>

                        <input type="hidden" name="produto_id" value="<?php echo $car->produto_id;?>">



                        <button type="submit" class="btn btn-primary">Gravar</button>														
                        <button type="reset" class="btn btn-primary">Limpar Campos</button>														
                    </form>
                </div>
               
            </div>
            
        </div>
        
    </div>
    
    <div class="row">

    </div>
    
    <div class="row">
     
  </div>
  
  <div class="row">
     
  </div>
  
</div>


</div>

<link rel="stylesheet" href="../js/jquery-ui.css" />
<script src="../js/jquery-1.8.2.js"></script>
<script src="../js/jquery-ui.js"></script>

<script src="../bower_components/jquery/dist/jquery.min.js"></script>

<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

<script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

<script src="../dist/js/sb-admin-2.js"></script>

<script src="js/bootstrap-datepicker.js"></script>
<script src="js/brasil.js"></script>

<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });

</script>

</body>

</html>

