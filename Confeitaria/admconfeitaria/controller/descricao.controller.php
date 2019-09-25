<?php

$tipo = "";
if(isset($_SESSION['tipo'])) $tipo = $_SESSION['tipo'];

		if($tipo == "Administrador")
		include_once("../model/descricao.php");//incluindo a classe com os comandos
		else
		include_once("../admconfeitaria/model/descricao.php");
		

		$des = new descricao(); //instanciando a classe produto

		if(isset($_REQUEST["acao"])) //irá executar apenas se for preenchida a opção op
		{
			switch($_REQUEST["acao"])//verifica qual é a ação a ser executada
			{
				case "cadastrar_des":
					//passando as informações do formulário
					$des->titulo = $_POST["titulo"];
					$des->descricao = $_POST["descricao"];
					$des->data = $_POST["data"];
					$des->codcategoria = $_POST["codcategoria"];
					

					$des->Cadastrar();//executando a função
					echo "<script>alert('DADOS GRAVADOS COM SUCESSO!');window.location='form_descricao.php';</script>";
					break;

				case "atualizar_des":
					//passando as informações do formulário
					$des->titulo = $_POST["titulo"];
					$des->descricao = $_POST["descricao"];
					$des->data = $_POST["data"];
					$des->codcategoria = $_POST["codcategoria"];
					

					$des->coddescricao = $_POST["coddescricao"];

					$des->Atualizar();//executando a função
					echo "<script>alert('DADOS GRAVADOS COM SUCESSO!');window.location='form_consultadescricao.php';</script>";
					break;

				case "excluir_des":
					//passando as informações do formulário
					$des->coddescricao = $_GET["coddescricao"];

					$des->Excluir();//executando a função
					header("location: form_consultadescricao.php ");//direcionando para o formulário
					break;

				case "dados_des":
					$des = $des->RetornarDados($_GET["coddescricao"]);//executando a função para retornar dados
					break;
			}
		}

		?>