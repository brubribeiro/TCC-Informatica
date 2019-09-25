<?php
ob_start();
session_start();//iniciar sessão
include_once("../controller/carrinho_pedidos.controller.php"); 
include_once("../controller/usuario.controller.php");
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
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
          <?php include_once("topo.php");?>
          <?php include_once("menu.php");?>
        </nav>

        <div id="page-wrapper">
          <div class="row">
            <div class="col-lg-12">
              <h2 class="page-header">Consulta de Pedidos</h2>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  Dados do Pedido						
                </div>
                <div class="panel-body">
                  <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                      <thead>
                        <tr>
                          <th>Código do Pedido</th>
                          <th>Código do Usuário</th>
                          <th>Pedido</th>
                          <th>Quantidade</th>
                          <th>Preço</th>
                          <th>Data</th>                          
                          <th>Ação</th>
                        </tr>
                      </thead>									

                      <tbody>
                       <?php foreach ($car->Consultar() as $linha): ?>
                        <tr class="odd gradeX">
                          <td><?php echo $linha->pedido_id;?></td>  
                          <td><?php echo $linha->codusuario;?></td>                         
                          <td><?php echo $linha->pedido_produto;?></td>
                          <td><?php echo $linha->pedido_quantidade;?></td>
                          <td><?php echo $linha->pedido_preco;?></td>
                          <td><?php echo $linha->pedido_data;?></td>
                          <td>											
                           <a href="?codcontato=<?php echo $linha->codcontato;?>&acao=excluir_con" onclick="return confirm('Confirma que o pedido seja finalizado?')"><button type="button" class="btn btn-success btn-circle" title="Excluir"><img src="imagens\check.png">

                          </button></a>	
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
