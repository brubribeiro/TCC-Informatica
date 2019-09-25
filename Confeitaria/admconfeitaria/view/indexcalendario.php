<?php
ob_start();
session_start();//iniciar sessão

include_once("../controller/eventos.controller.php");

$acao = "acao=cadastrar_eve";
if($eve->id != 0)
  $acao = "acao=atualizar_eve";

include 'conexao.php';
include 'calendario.php';
    $info = array(
        'tabela' => 'eventos',
        'data' => 'data',
        'titulo' => 'titulo',
        'evento' => 'evento'
    );

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

    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <link href="../dist/css/timeline.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../bower_components/morrisjs/morris.css" rel="stylesheet">
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="css/style.css" rel="stylesheet" type="text/css" />


</head>

<body onload="Grafico1();Grafico2();">
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
           <?php include_once("../view/topo.php");?>
            <?php include_once("../view/menu.php");?>
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Bem vindo - Administração Doces Sonhos Confeitaria </h3>
                </div>
            </div>
        
            <div class="calendario">
     <?php 
         $eventos = montaEventos($info);
         montaCalendario($eventos);
     ?>
     <div class="legends">
         <span class="legenda"><span class="blue"></span> Eventos</span>
         <span class="legenda"><span class="red"></span> Hoje</span>
     </div>
    </div>
    <br>

    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/functions.js"></script>

    <button class="btn btn-warning" data-toggle="modal" data-target="#modalexepmloadic">Adicionar evento</button>
    <button class="btn btn-warning" data-toggle="modal" data-target="#modalexepmloconsul">Consultar evento</button>

    <div class="row">
                   <!-- MODAL -->
                    <div class="modal fade" id="modalexepmloadic" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="exampleModalLabel">Adicionar Evento</h4>                         
                          </div>
                          <div class="modal-body">
                           <form action="?<?php echo $acao;?>" method="post" role="form" enctype="multipart/form-data">            
                                <div class="form-group">
                                <label>Título</label>
                                <input name="titulo" class="form-control" id="nome" placeholder="Informe o titulo" value="<?php echo $eve->titulo;?>">                                           
                                </div>                                  
                                <div class="form-group">
                                <label>Data</label>
                                <input type="date" name="data" class="form-control" id="data" placeholder="Informe a data" value="<?php echo $eve->data;?>">                           
                                </div>
                                <div class="form-group">
                                <label>Evento</label>
                                <input name="evento" class="form-control" id="evento" placeholder="Informe o evento" value="<?php echo $eve->evento;?>">                                           
                                </div>                            
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Gravar</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>                          
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    <!--FIM MODAL-->
          </div>


          <div class="row">

        <!-- MODAL -->
                    <div class="modal fade" id="modalexepmloconsul" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="exampleModalLabel">Consulta de Eventos</h4>                         
                          </div>
                          <div class="modal-body">            
                                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                      <thead>
                        <tr>
                          <th>Código</th>
                          <th>Titulo</th>
                          <th>Data</th>
                          <th>Evento</th>  
                          <th>Ação</th>                        
                        </tr>
                      </thead>                                  


                      <tbody>
                       <?php foreach ($eve->Consultar() as $linha): ?>
                        <tr class="odd gradeX">
                          <td><?php echo $linha->id;?></td>                          
                          <td><?php echo $linha->titulo;?></td> 
                          <td><?php echo $linha->data;?></td>                         
                          <td><?php echo $linha->evento;?></td>
                          
                          <td>                                                  
                         
                         <a href="?id=<?php echo $linha->id;?>&acao=excluir_eve" onclick="return confirm('Confirma exclusão deste Evento?')"><button type="button" class="btn btn-warning btn-circle" title="Excluir"><img src="imagens\excluir.png">

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


    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <script src="../bower_components/flot/excanvas.min.js"></script>
    <script src="../bower_components/flot/jquery.flot.js"></script>
    <script src="../bower_components/flot/jquery.flot.pie.js"></script>
    <script src="../bower_components/flot/jquery.flot.resize.js"></script>
    <script src="../bower_components/flot/jquery.flot.time.js"></script>
    <script src="../bower_components/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    
    <script src="../dist/js/sb-admin-2.js"></script>	
	
</body>

</html>