<?php
ob_start();
session_start();//iniciar sessão
include_once("../controller/usoproduto.controller.php");
include_once("../controller/produto.controller.php");
include_once("../controller/compraproduto.controller.php"); 
$acao = "acao=cadastrar_uso";
if($uso->codusoproduto != 0)
  $acao = "acao=atualizar_uso";

error_reporting(0);

if(!empty($_GET['codcompraprod']))
{	
	$com = $com->RetornarDadosEstoque($_GET['codcompraprod']);
}
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

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


    <link href="../dist/css/datepicker.css" rel="stylesheet">   

    

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
         <?php include_once("topo.php");?>
         <!-- menus -->
         <?php include_once("menu.php");?>
         <!-- fim menus -->
     </nav>

     <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Cadastro de Uso de Produtos</h2>
            </div>
          
        </div>
   
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Dados do Produto
                        <button class="btn btn-warning btn-xs pull-right" data-toggle="modal" data-target="#modalexepmlo">Buscar Produto</button>
                    </div>
                    
                    <div class="panel-body">
                <form action="?<?php echo $acao;?>" method="post" role="form" enctype="multipart/form-data">                 
                         <div class="form-group">
                            <label>Produto</label>
                            <input type="text" name="codproduto" class="form-control" id="nomeproduto" placeholder="Selecione um produto" required readonly value="<?php echo $com->nomeproduto;?>"> 

                            <input type="hidden" name="codproduto" value="<?php echo $com->codproduto;?>">

                            <input type="hidden" name="codcompraprod" value="<?php echo $com->codcompraprod;?>">
                        </div> 
                         <div class="form-group">
                            <label>Quantidade em estoque</label>
                            <input type="text" name="estoque" class="form-control" id="estoque" placeholder="Selecione um produto" required readonly value="<?php echo $com->quant_compra;?>">

                            <input type="hidden" name="codcompraprod" value="<?php echo $com->codcompraprod;?>"> 
                        </div> 
                        <div class="form-group">
                            <label>Quantidade</label>
                            <input type="number" name="quant_uso" class="form-control" id="valor" placeholder="Informe a quantidade usada" required value="<?php echo $uso->quant_uso;?>">
                        </div>                        
                        <div class="form-group">
                            <label>Data</label>
                            <input type="date" name="data" class="form-control" id="data" placeholder="Informe a data da compra" value="<?php echo $uso->data;?>">                                           
                        </div>

                        <input type="hidden" name="codusoproduto" value="<?php echo $uso->codusoproduto;?>">

                        <button type="submit" class="btn btn-primary">Gravar</button>														
                        <button type="reset" class="btn btn-primary">Limpar Campos</button>													
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">

    	<!-- MODAL -->
                    <div class="modal fade" id="modalexepmlo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="exampleModalLabel">Consulta de Produtos</h4>                         
                          </div>
                          <div class="modal-body">            
                                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                      <thead>
                        <tr>
                          <th>Código</th>
                          <th>Código do Produto</th>
                          <th>Nome do Produto</th>
                          <th>Quantidade</th>                          
                        </tr>
                      </thead>									


                      <tbody>
                       <?php foreach ($com->Consultar() as $linha): ?>
                        <tr class="odd gradeX">
                          <td><?php echo $linha->codcompraprod;?></td>                          
                          <td><?php echo $linha->codproduto;?></td> 
                          <td><?php echo $linha->nomeproduto;?></td>                         
                          <td><?php echo $linha->quant_compra;?></td>
                          
                          <td>											
                           <a href="?codcompraprod=<?php echo $linha->codcompraprod;?>"><button type="button" class="btn btn-success btn-circle" title="Selecionar"><img src="imagens\check.png">
                           </button></a>							

                         </td>
                       </tr> 
                     <?php endforeach;?>									
                   </tbody>

                 </table>
               </div>                           
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>                         
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    <!--FIM MODAL-->

    </div>
    <!-- /.row -->
    <div class="row">
      <!-- /.col-lg-6 -->
      <!-- /.col-lg-6 -->
  </div>
  <!-- /.row -->
  <div class="row">
      <!-- /.col-lg-6 -->
      <!-- /.col-lg-6 -->
  </div>
  <!-- /.row -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- JQuery data -->
<link rel="stylesheet" href="../js/jquery-ui.css" />
<script src="../js/jquery-1.8.2.js"></script>
<script src="../js/jquery-ui.js"></script>
<!-- jQuery -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

<!-- DataTables JavaScript -->
<script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../dist/js/sb-admin-2.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

<!--<script src="js/jquery.min.js"></script>-->

<!-- Referência do arquivo JS do plugin após carregar o jquery -->
<!-- Datepicker -->
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/brasil.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<!--<script src="js/bootstrap.min.js"></script>-->




<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });


    //CKEDITOR.replace( 'texto' ); //referenciando ferramenta editar texto
</script>

</body>

</html>

