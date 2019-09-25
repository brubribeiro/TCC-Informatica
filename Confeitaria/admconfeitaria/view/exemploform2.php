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

    <!-- Adicionando js para ckeditor-->
    <script src="//cdn.ckeditor.com/4.4.7/standard/ckeditor.js"></script>

	
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
                    <h1 class="page-header">Cadastro de XYZ</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Dados do XYZ
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            	<form action="" method="post" role="form">						
							    <div class="form-group">
                                            <label>Nome</label>
                                            <input name="nome" class="form-control" id="nome" placeholder="Informe o nome completor" required value="">                                           
                                </div>
								
								 <div class="form-group">
                                            <label class="checkbox-inline">
                                                <input name="ativo" type="checkbox" id="pioneiro" value="1" >Marcar como Ativo
                                            </label>                                            
                                  </div>
								  
								   <div class="form-group">
                                            <label>Telefone</label>
                                            <input name="telefone" class="form-control" id="telefone" placeholder="Informe o telefone" value="">                                           
                                </div>
								
								 <div class="form-group">
                                            <label>E-mail</label>
                                            <input name="email" class="form-control" id="email" placeholder="Informe o email" value="">                                           
                                </div>
								
								 <div class="form-group">
                                            <label>Cidade</label>
                                            <input name="cidade" class="form-control" id="cidade" placeholder="Informe a cidade" required value="">                                           
                                </div>
								
								<div class="form-group">
                                            <label>Estado</label>
                                            <select name="estado" class="form-control" id="estado">
                                              <option value="AC">AC</option>                  
											  <option value="AL">AL</option>
											  <option value="AP">AP</option>
											  <option value="AM">AM</option>
											  <option value="BA">BA</option>
											  <option value="CE">CE</option>
											  <option value="DF">DF</option>
											  <option value="ES">ES</option>
											  <option value="GO">GO</option>
											  <option value="MA">MA</option>
											  <option value="MT">MT</option>
											  <option value="MS">MS</option>
											  <option value="MG">MG</option>
											  <option value="PA">PA</option>
											  <option value="PB">PB</option>
											  <option value="PR">PR</option>
											  <option value="PE">PE</option>
											  <option value="PI">PI</option>
											  <option value="RJ">RJ</option>
											  <option value="RN">RN</option>
											  <option value="RS">RS</option>
											  <option value="RO">RO</option>
											  <option value="RR">RR</option>
											  <option value="SC">SC</option>
											  <option value="SP">SP</option>
											  <option value="SE">SE</option>
											  <option value="TO">TO</option>
                                            </select>
                                </div>															
								 
								

									<div class="form-group">
                                            <label>Data</label>
                                            <input name="data" class="form-control" id="data" value="">											
                                    </div>	

								<div class="form-group">
                                            <label>Data do Cadastro</label>
                                            <input name="datacadastro" class="form-control" id="datacadastro" value="" readonly>                                           
                                </div>				
								
								  
								   <div class="form-group">
                                            <label>Observações</label>
                                            <textarea name="obs" rows="3" class="form-control" id="obs"></textarea>
                                   </div>

                                   <div class="form-group">
                                            <label>Texto</label>
                                            <textarea name="texto" rows="3" class="form-control" id="texto"></textarea>
                                   </div>

                                   <div class="form-group">
                                           <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#modalexepmlo">Exemplo Modal</a>
                                   </div>
                           
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
                   <!-- MODAL -->
                    <div class="modal fade" id="modalexepmlo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="exampleModalLabel">Modal Exemplo</h4>                         
                          </div>
                          <div class="modal-body">            
                                <div class="form-group">
                                            <label>Nome</label>
                                            <input name="nome" class="form-control" id="nome" placeholder="Informe o nome completor" required value="">                                           
                                </div>                                  
                                <div class="form-group">
                                            <label>Telefone</label>
                                            <input name="telefone" class="form-control" id="telefone" placeholder="Informe o telefone" value="">                                           
                                </div>
                                
                                 <div class="form-group">
                                            <label>E-mail</label>
                                            <input name="email" class="form-control" id="email" placeholder="Informe o email" value="">                                           
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
      $(document).ready(function () {
        $('#data').datepicker({
			language: "pt-BR",
            format: "dd/mm/yyyy",
			todayHighlight: true            
        });
      });
  </script>
	
	
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });


    CKEDITOR.replace( 'texto' ); //referenciando ferramenta editar texto
    </script>

</body>

</html>

