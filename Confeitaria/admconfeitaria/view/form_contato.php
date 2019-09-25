<?php
ob_start();
session_start();//iniciar sessão
include_once("../controller/contato.controller.php"); 
$acao = "acao=cadastrar_con";
if($con->codcontato != 0)
  $acao = "acao=atualizar_con";
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



    <!-- 1º Adicionamos o arquivo CSS do plugin ao código. -->
    <!-- Datepicker -->
    <link href="../dist/css/datepicker.css" rel="stylesheet">   

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


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
                <h2 class="page-header">Cadastro de Contato</h2>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Dados do cliente
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                <form action="?<?php echo $acao;?>" method="post" role="form">						
                         <div class="form-group">
                            <label>Nome</label>
                            <input name="nome" class="form-control" id="nome" placeholder="Informe o nome do cliente" required value="<?php echo $cli->nome;?>">                                           
                        </div>


                         <div class="form-group">
                            <label>Email</label>
                            <input name="email" class="form-control" id="email" placeholder="Informe o email" required value="<?php echo $cli->email;?>">                                           
                        </div> 


                        <div class="form-group">
                            <label>Senha</label>
                            <input name="senha" class="form-control" id="senha" placeholder="Informe a senha" required value="<?php echo $cli->senha;?>">                                           
                        </div>

                        <div class="form-group">
                            <label>Telefone</label>
                            <input name="telefone" class="form-control" id="telefone" placeholder="Informe o telefone" required value="<?php echo $cli->telefone;?>">                                           
                        </div>

                         <div class="form-group">
                            <label>Celular</label>
                            <input name="celular" class="form-control" id="celular" placeholder="Informe o celular" required value="<?php echo $cli->celular;?>">                                           
                        </div>

                        



                        <input type="hidden" name="codcli" value="<?php echo $cli->codcli;?>">



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


    //CKEDITOR.replace( 'texto' ); //referenciando ferramenta editar texto
</script>

</body>

</html>

