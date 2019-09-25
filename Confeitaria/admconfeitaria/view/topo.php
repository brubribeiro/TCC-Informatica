<?php
if(!isset($_SESSION['codusuario']))//verificar não existe a sessão
{
    header("location:../../admconfeitaria/view/index.php");//volta para o login
}
?>
<div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Sistema Administrativo Doces Sonhos Confeitaria - <?php echo $_SESSION['nomeusuario']; ?></a> 
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">               			
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <img src="imagens\usuariossistema.png">  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">					
                        <li><a href="form_usuario.php?acao=update_usu"><img src="imagens\usuariossistema.png"> Perfil do Usuário</a>
                        </li>                        
                        <li class="divider"></li>
                        <li><a href="../controller/sair.php"><img src="imagens\sair.png"></i> Sair</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
			
										
										
			