<?php
ob_start();
session_start();//iniciar sessão
include_once("../controller/compraproduto.controller.php"); 
include_once("../controller/produto.controller.php");

$acao = "acao=cadastrar_com";
if($com->codcompraprod != 0)
  $acao = "acao=atualizar_com";
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
                <h2 class="page-header">Cadastro de Compras</h2>
            </div>            
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Dados do Produto
                    </div>                    
                    <div class="panel-body">
                <form action="?<?php echo $acao;?>" method="post" role="form" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Nome do Produto</label>
                            <select name="codproduto" class="form-control" id="codproduto">
                                <?php foreach ($pro->Consultar() as $linha): ?>                      
                            <option value="<?php echo $linha->codproduto;?>">
                                <?php echo $linha->nomeproduto;?></option>
                                <?php endforeach;?>
                            </select>
                        </div> 

                        <div class="form-group">
                            <label>Quantidade</label>
                            <input type="number" name="quant_compra" class="form-control" id="valor" placeholder="Informe a quantidade comprada" required value="<?php echo $com->quant_compra;?>">
                        </div>                        

                        <input type="hidden" name="codcompraprod" value="<?php echo $com->codcompraprod;?>">

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

