<?php
		include_once("../model/eventos.php");//incluindo a classe com os comandos

		$eve = new eventos(); //instanciando a classe produto

		if(isset($_REQUEST["acao"])) //irá executar apenas se for preenchida a opção op
		{
			switch($_REQUEST["acao"])//verifica qual é a ação a ser executada
			{
				case "cadastrar_eve":
					//passando as informações do formulário
					$eve->titulo = $_POST["titulo"];
					$eve->data = $_POST["data"];
					$eve->evento = $_POST["evento"];
					

					$eve->Cadastrar();//executando a função
					echo "<script>alert('DADOS GRAVADOS COM SUCESSO!');window.location='indexcalendario.php';</script>";
					break;

				case "atualizar_eve":
					//passando as informações do formulário
					$eve->titulo = $_POST["titulo"];
					$eve->data = $_POST["data"];
					$eve->evento = $_POST["evento"];
					

					$eve->id = $_POST["id"];

					$eve->Atualizar();//executando a função
					echo "<script>alert('DADOS GRAVADOS COM SUCESSO!');window.location='indexcalendario.php';</script>";
					break;

				case "excluir_eve":
					//passando as informações do formulário
					$eve->id = $_GET["id"];

					$eve->Excluir();//executando a função
					header("location: indexcalendario.php ");//direcionando para o formulário
					break;

				case "dados_eve":
					$eve = $eve->RetornarDados($_GET["id"]);//executando a função para retornar dados
					break;
			}
		}

		?>