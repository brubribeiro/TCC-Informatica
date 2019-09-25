<?php
ob_start();
session_start();//iniciar sessão
include_once("../controller/carrinho_cupom.controller.php"); 
$acao = "acao=cadastrar_car";
if($car->cupom_id != 0)
    $acao = "acao=atualizar_car";
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
                <h2 class="page-header">Cadastro de Cupons</h2>
            </div>                
        </div>            
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Dados do Cupom
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <form action="?<?php echo $acao;?>" method="post" role="form" onsubmit="return validarSenha();" enctype="multipart/form-data">						
                           <div class="form-group">
                            <label>Título</label>
                            <input name="cupom_titulo" class="form-control" id="titulo" placeholder="Informe o título do cupom" required value="<?php echo $car->cupom_titulo;?>">                                           
                        </div>

                        <div class="form-group">
                            <label>Desconto</label>
                            <input type="number" name="cupom_desconto" class="form-control" id="desconto" placeholder="Informe a % de desconto" required value="<?php echo $car->cupom_desconto;?>">                                           
                        </div>                      

                        <input type="hidden" name="cupom_id" value="<?php echo $car->cupom_id;?>">

                        <button type="submit" class="btn btn-primary">Gravar</button>														
                        <button type="reset" class="btn btn-primary">Limpar Campos</button>														
                    </form>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">

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

    function validarSenha()
    {    
      senha = document.getElementById("senha").value;
      confirma = document.getElementById("confirma").value;
      if (senha != confirma)
      {
        alert("SENHAS DIFERENTES! VERIFIQUE A CONFIRMAÇÃO!");
        return false;
    }
    return true;
}

</script>

</body>

</html>

