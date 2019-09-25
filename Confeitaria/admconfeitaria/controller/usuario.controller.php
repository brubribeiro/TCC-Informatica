<?php

$tipo = "";
if(isset($_SESSION['tipo'])) $tipo = $_SESSION['tipo'];

if($tipo == "Administrador")
		include_once("../model/usuario.php");//incluindo a classe com os comandos
		else
		include_once("../admconfeitaria/model/usuario.php");//incluindo a classe com os comandos

		$usu = new Usuario(); //instanciando a classe produto

		if(isset($_REQUEST["acao"])) //irá executar apenas se for preenchida a opção op
		{
			switch($_REQUEST["acao"])//verifica qual é a ação a ser executada
			{
				case "cadastrar_usu":
					//passando as informações do formulário
				$usu->nome 			= $_POST["nome"];
				$usu->email 		= $_POST["email"];
				$usu->telefone 		= $_POST["telefone"];
				$usu->celular 		= $_POST["celular"];
				$usu->endereco 		= $_POST["endereco"];
				$usu->nomeusuario 	= $_POST["nomeusuario"];
				$usu->senha 		= sha1($_POST["senha"]);
				$usu->imgperfil		= $_FILES["imgperfil"]["name"];
				$usu->tipo 			= $_POST["tipo"];

				$senha = $_POST['senha'];

				move_uploaded_file($_FILES["imgperfil"]["tmp_name"], "../designconfeitaria/images/".$_FILES["imgperfil"]["name"]);


					$usu->Cadastrar();//executando a função
					if($_POST["tipo"] == "Administrador"){
					echo "<script>alert('DADOS GRAVADOS COM SUCESSO!');window.location='form_usuario.php';</script>";
					}
					else{
					echo "<script>alert('DADOS GRAVADOS COM SUCESSO!');window.location='../designconfeitaria/facaseupedido.php';</script>";
					}
					break;

					case "atualizar_usu":
					//passando as informações do formulário
					$usu->nome 			= $_POST["nome"];
					$usu->email 		= $_POST["email"];
					$usu->telefone 		= $_POST["telefone"];
					$usu->celular 		= $_POST["celular"];
					$usu->endereco 		= $_POST["endereco"];
					$usu->nomeusuario 	= $_POST["nomeusuario"];
					if(strlen($_POST["senha"]) == 40) //contar quantidade
						{
					   $usu->senha = $_POST["senha"];
					}
					else
					{
					   $usu->senha = sha1($_POST["senha"]);
					}	
					$usu->imgperfil		= $_FILES["imgperfil"]["name"];				
					$usu->tipo 			= $_POST["tipo"];

				move_uploaded_file($_FILES["imgperfil"]["tmp_name"], "../designconfeitaria/images/".$_FILES["imgperfil"]["name"]);		
					

					$usu->codusuario = $_POST["codusuario"];

					$usu->Atualizar();//executando a função
					if($_SESSION["tipo"] == "Administrador"){
					echo "<script>alert('DADOS GRAVADOS COM SUCESSO!');window.location='form_consultausuario.php';</script>";
					}
					else if (!isset($_SESSION['codusuario'])) {
					echo "<script>alert('DADOS GRAVADOS COM SUCESSO!');window.location='../designconfeitaria/cadastro.php';</script>";
					}
					else {
					//echo "<script>alert('DADOS GRAVADOS COM SUCESSO!');window.location='../designconfeitaria/meusdados.php';</script>";	
					}
					
					
					break;

					case "atualizar_usu_form":
					//passando as informações do formulário
					$usu->nome 			= $_POST["nome"];
					$usu->email 		= $_POST["email"];
					$usu->telefone 		= $_POST["telefone"];
					$usu->celular 		= $_POST["celular"];
					$usu->endereco		= $_POST["endereco"];							
					

					$usu->codusuario = $_POST["codusuario"];

					$usu->Atualizar_form();//executando a função
					if($_SESSION["tipo"] == "Administrador"){
					echo "<script>alert('DADOS GRAVADOS COM SUCESSO!');window.location='form_consultausuario.php';</script>";
					}
					else if (!isset($_SESSION['codusuario'])) {
					echo "<script>alert('DADOS GRAVADOS COM SUCESSO!');window.location='../designconfeitaria/cadastro.php';</script>";
					}
					else {
					echo "<script>alert('DADOS GRAVADOS COM SUCESSO!');window.location='../designconfeitaria/meusdados.php';</script>";	
					}
					
					break;

					case "atualizar_usu_senha":
					//passando as informações do formulário
					if(strlen($_POST["senha"]) == 40) //contar quantidade
						{
					   $usu->senha = $_POST["senha"];
					}
					else
					{
					   $usu->senha = sha1($_POST["senha"]);
					}					
					$usu->nomeusuario 	= $_POST["nomeusuario"];

					$usu->codusuario = $_POST["codusuario"];

					$usu->Atualizar_usu();//executando a função
					if($_SESSION["tipo"] == "Administrador"){
					echo "<script>alert('DADOS GRAVADOS COM SUCESSO!');window.location='form_consultausuario.php';</script>";
					}
					else{
					echo "<script>alert('DADOS GRAVADOS COM SUCESSO!');window.location='../designconfeitaria/meusdados.php';</script>";
					}
					break;

					case "excluir_usu":
					//passando as informações do formulário
					$usu->codusuario = $_GET["codusuario"];

					$usu->Excluir();//executando a função
					header("location: form_consultausuario.php ");//direcionando para o formulário
					break;

					case "dados_usu":
					$usu = $usu->RetornarDados($_GET["codusuario"]);//executando a função para retornar dados
					break;
									
					case "logar_usu":

					//if($_SESSION['captcha'] == $_POST['captcha']){

					$usu = $usu->Logar($_POST['nomeusuario'],sha1($_POST['senha']));
					if($usu->codusuario != "")
					{				
						
						session_start();//criando a sessão
						$_SESSION['nomeusuario'] = $usu->nomeusuario;
						$_SESSION['codusuario'] = $usu->codusuario;
						$_SESSION['tipo'] = $usu->tipo;

  						if($usu->tipo == "Administrador")
  						{
							header("location:../admconfeitaria/");
  						}
  						else
  						{
							//direcionando para principal
							header("location:../designconfeitaria/areacliente.php");
						}
					}
					else
					{
						echo "<script>alert('NÃO FOI POSSÍVEL ACESSAR O SISTEMA');window.location='../designconfeitaria/facaseupedido.php';</script>";
					}
					//}else{
					//	echo "<script>alert('ERRO! Caracteres anti-robô inválidos.');window.location='../designconfeitaria/facaseupedido.php';</script>";
					//}
					break;
				}
			}

			?>