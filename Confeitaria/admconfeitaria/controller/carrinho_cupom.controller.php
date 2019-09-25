<?php

$tipo = "";
if(isset($_SESSION['tipo'])) $tipo = $_SESSION['tipo'];

		if($tipo == "Administrador")
		include_once("../model/carrinho_cupom.php");//incluindo a classe com os comandos
		else
		include_once("../admconfeitaria/model/carrinho_cupom.php");
		
		$car = new carrinho_cupom(); //instanciando a classe produto

		if(isset($_REQUEST["acao"])) //irá executar apenas se for preenchida a opção op
		{
			switch($_REQUEST["acao"])//verifica qual é a ação a ser executada
			{
				case "cadastrar_car":
					//passando as informações do formulário
					$car->cupom_titulo = $_POST["cupom_titulo"];
					$car->cupom_desconto = $_POST["cupom_desconto"];
					

					$car->Cadastrar();//executando a função
					echo "<script>alert('DADOS GRAVADOS COM SUCESSO!');window.location='form_carrinho_cupom.php';</script>";
					break;

				case "atualizar_car":
					//passando as informações do formulário
					$car->cupom_titulo = $_POST["cupom_titulo"];
					$car->cupom_desconto = $_POST["cupom_desconto"];

					$car->cupom_id = $_POST["cupom_id"];

					$car->Atualizar();//executando a função
					echo "<script>alert('DADOS GRAVADOS COM SUCESSO!');window.location='form_consultacupom.php';</script>";
					break;

				case "excluir_car":
					//passando as informações do formulário
					$car->cupom_id = $_GET["cupom_id"];

					$car->Excluir();//executando a função
					header("location: form_consultacupom.php ");//direcionando para o formulário
					break;

				case "dados_car":
					$car = $car->RetornarDados($_GET["cupom_id"]);//executando a função para retornar dados
					break;
			}
		}