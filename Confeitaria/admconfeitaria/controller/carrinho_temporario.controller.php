<?php

$tipo = "";
if(isset($_SESSION['tipo'])) $tipo = $_SESSION['tipo'];

		if($tipo == "Administrador")
		include_once("../model/carrinho_temporario.php");//incluindo a classe com os comandos
		else
		include_once("../admconfeitaria/model/carrinho_temporario.php");
		
		$car = new carrinho_temporario(); //instanciando a classe produto

		if(isset($_REQUEST["acao"])) //irá executar apenas se for preenchida a opção op
		{
			switch($_REQUEST["acao"])//verifica qual é a ação a ser executada
			{
				case "cadastrar_car":
					//passando as informações do formulário
					$car->temporario_produto = $_POST["temporario_produto"];
					$car->temporario_quantidade = $_POST["temporario_quantidade"];
					$car->temporario_preco = $_POST["temporario_preco"];
					$car->temporario_cliente = $_POST["temporario_cliente"];
					$car->temporario_data = $_POST["temporario_data"];
					$car->temporario_sessao = $_POST["temporario_sessao"];
					

					$car->Cadastrar();//executando a função
					echo "<script>alert('DADOS GRAVADOS COM SUCESSO!');window.location='form_carrinho_temporario.php';</script>";
					break;

				case "atualizar_car":
					//passando as informações do formulário
					$car->temporario_produto = $_POST["temporario_produto"];
					$car->temporario_quantidade = $_POST["temporario_quantidade"];
					$car->temporario_preco = $_POST["temporario_preco"];
					$car->temporario_cliente = $_POST["temporario_cliente"];
					$car->temporario_data = $_POST["temporario_data"];
					$car->temporario_sessao = $_POST["temporario_sessao"];
					

					$car->temporario_id = $_POST["temporario_id"];

					$car->Atualizar();//executando a função
					echo "<script>alert('DADOS GRAVADOS COM SUCESSO!');window.location='form_consultacarrinho_temporario.php';</script>";
					break;

				case "excluir_car":
					//passando as informações do formulário
					$car->temporario_id = $_GET["temporario_id"];

					$car->Excluir();//executando a função
					header("location: form_consultacarrinho_temporario.php ");//direcionando para o formulário
					break;

				case "dados_car":
					$car = $car->RetornarDados($_GET["temporario_id"]);//executando a função para retornar dados
					break;
			}
		}
