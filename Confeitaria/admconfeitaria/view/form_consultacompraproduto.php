<?php
ob_start();
session_start();//iniciar sessão
include_once("../controller/compraproduto.controller.php"); 
include_once("../controller/produto.controller.php");

?>
<!DOCTYPE html>
<html lang="en">

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

    </head>

    <body>

      <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
          <?php include_once("topo.php");?>
          <!-- menus -->

          <?php include_once("menu.php");?>
          <!-- fim menu -->
        </nav>

        <div id="page-wrapper">
          <div class="row">
            <div class="col-lg-12">
              <h2 class="page-header">Consulta de Estoque de Produtos</h2>
            </div>
            <!-- /.col-lg-12 -->
          </div>
          <!-- /.row -->
          <div class="row">
            <div class="col-lg-12">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  Dados do Produto						
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                  <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                      <thead>
                        <tr>
                          <th>Código</th>
                          <th>Código do Produto</th>
                          <th>Nome do Produto</th>
                          <th>Quantidade</th>
                          <th>Ação</th>
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
                           <a href="../view/form_compraproduto.php?codcompraprod=<?php echo $linha->codcompraprod;?>&acao=dados_com">
                           </button></a>							
                          <?php
                            if($_SESSION['tipo'] == "Administrador")
                            {
                          ?>
                           <a href="?codcompraprod=<?php echo $linha->codcompraprod;?>&acao=excluir_com" onclick="return confirm('Confirma exclusão desta Compra?')"><button type="button" class="btn btn-warning btn-circle" title="Excluir"><img src="imagens\excluir.png">
                           </button></a>	
                           <?php
                            } 
                           ?>
                         </td>
                       </tr> 
                     <?php endforeach;?>									
                   </tbody>
                 </table>
               </div>
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
  <script src="../bower_components/jquery/dist/jquery.min.js"></script>
  <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>
  <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
  <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
  <script src="../dist/js/sb-admin-2.js"></script>
  <script>
    $(document).ready(function() {
      $('#dataTables-example').DataTable({
        responsive: true
      });
    });
  </script>
</body>
</html>
