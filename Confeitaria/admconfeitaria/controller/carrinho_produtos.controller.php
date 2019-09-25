<?php

$tipo = "";
if(isset($_SESSION['tipo'])) $tipo = $_SESSION['tipo'];

		if($tipo == "Administrador")
		include_once("../model/carrinho_produtos.php");//incluindo a classe com os comandos
		else
		include_once("../admconfeitaria/model/carrinho_produtos.php");

		$car = new carrinho_produtos(); //instanciando a classe produto

		if(isset($_REQUEST["acao"])) //irá executar apenas se for preenchida a opção op
		{
			switch($_REQUEST["acao"])//verifica qual é a ação a ser executada
			{
				case "cadastrar_car":
					//passando as informações do formulário
					$car->produto_nome = $_POST["produto_nome"];
					$car->produto_preco = $_POST["produto_preco"];
					$car->produto_quantidade = $_POST["produto_quantidade"];
					$car->produto_img = $_FILES["produto_img"]["name"];

					move_uploaded_file($_FILES["produto_img"]["tmp_name"], "../view/imagens/".$_FILES["produto_img"]["name"]);
					

					$car->Cadastrar();//executando a função
					echo "<script>alert('DADOS GRAVADOS COM SUCESSO!');window.location='form_carrinho_produtos.php';</script>";
					break;

				case "atualizar_car":
					//passando as informações do formulário
					$car->produto_nome = $_POST["produto_nome"];
					$car->produto_preco = $_POST["produto_preco"];
					$car->produto_quantidade = $_POST["produto_quantidade"];
					$car->produto_img = $_FILES["produto_img"]["name"];

					move_uploaded_file($_FILES["produto_img"]["tmp_name"], "../view/imagens/".$_FILES["produto_img"]["name"]);
					

					$car->produto_id = $_POST["produto_id"];

					$car->Atualizar();//executando a função
					echo "<script>alert('DADOS GRAVADOS COM SUCESSO!');window.location='form_consultaprodutos.php';</script>";
					break;

				case "excluir_car":
					//passando as informações do formulário
					$car->produto_id = $_GET["produto_id"];

					$car->Excluir();//executando a função
					header("location: form_consultaprodutos.php ");//direcionando para o formulário
					break;

				case "dados_car":
					$car = $car->RetornarDados($_GET["produto_id"]);//executando a função para retornar dados
					break;
			}
		}

		