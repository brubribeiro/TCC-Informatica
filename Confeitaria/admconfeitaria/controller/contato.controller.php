<?php
$tipo = "";
if(isset($_SESSION['tipo'])) $tipo = $_SESSION['tipo'];

		if($tipo == "Administrador")
			include_once("../model/contato.php");//incluindo a classe com os comandos
		else
			include_once("../admconfeitaria/model/contato.php");//incluindo a classe com os comandos

		$con = new contato(); //instanciando a classe produto

		if(isset($_REQUEST["acao"])) //irá executar apenas se for preenchida a opção op
		{
			switch($_REQUEST["acao"])//verifica qual é a ação a ser executada
			{
				case "cadastrar_con":
					//passando as informações do formulário
					$con->nome = $_POST["nome"];
					$con->email = $_POST["email"];
					$con->mensagem = $_POST["mensagem"];
					

					$con->Cadastrar();//executando a função
					echo "<script>alert('MENSAGEM ENVIADA COM SUCESSO!');window.location='../designconfeitaria/contato.php';</script>";
					break;

				case "atualizar_con":
					//passando as informações do formulário
					$con->nome = $_POST["nome"];
					$con->email = $_POST["email"];
					$con->mensagem = $_POST["mensagem"];
					

					$con->codcontato = $_POST["codcontato"];

					$con->Atualizar();//executando a função
					echo "<script>alert('DADOS GRAVADOS COM SUCESSO!');window.location='form_consultacontato.php';</script>";
					break;

				case "excluir_con":
					//passando as informações do formulário
					$con->codcontato = $_GET["codcontato"];

					$con->Excluir();//executando a função
					header("location: form_consultacontato.php ");//direcionando para o formulário
					break;

				case "dados_con":
					$con = $con->RetornarDados($_GET["codcontato"]);//executando a função para retornar dados
					break;
			}
		}

		?>