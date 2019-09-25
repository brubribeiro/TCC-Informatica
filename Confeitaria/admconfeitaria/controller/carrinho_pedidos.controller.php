<?php

$tipo = "";
if(isset($_SESSION['tipo'])) $tipo = $_SESSION['tipo'];

		if($tipo == "Administrador")
		include_once("../model/carrinho_pedidos.php");//incluindo a classe com os comandos
		else
		include_once("../admconfeitaria/model/carrinho_pedidos.php");
		
		$car = new carrinho_pedidos(); //instanciando a classe produto

		if(isset($_REQUEST["acao"])) //irá executar apenas se for preenchida a opção op
		{
			switch($_REQUEST["acao"])//verifica qual é a ação a ser executada
			{
				case "cadastrar_car":
					//passando as informações do formulário
					$car->codusuario = $_POST["codusuario"];
					$car->pedido_produto = $_POST["pedido_produto"];
					$car->pedido_quantidade = $_POST["pedido_quantidade"];
					$car->pedido_preco = $_POST["pedido_preco"];
					$car->pedido_valor_total = $_POST["pedido_valor_total"];
					$car->pedido_cliente = $_POST["pedido_cliente"];
					$car->pedido_data = $_POST["pedido_data"];
					$car->pedido_sessao = $_POST["pedido_sessao"];
					

					$car->Cadastrar();//executando a função
					echo "<script>alert('DADOS GRAVADOS COM SUCESSO!');window.location='form_carrinho_pedidos.php';</script>";
					break;

				case "atualizar_car":
					//passando as informações do formulário
					$car->codusuario = $_POST["codusuario"];
					$car->pedido_produto = $_POST["pedido_produto"];
					$car->pedido_quantidade = $_POST["pedido_quantidade"];
					$car->pedido_preco = $_POST["pedido_preco"];
					$car->pedido_valor_total = $_POST["pedido_valor_total"];
					$car->pedido_cliente = $_POST["pedido_cliente"];
					$car->pedido_data = $_POST["pedido_data"];
					$car->pedido_sessao = $_POST["pedido_sessao"];
					

					$car->pedido_id = $_POST["pedido_id"];

					$car->Atualizar();//executando a função
					echo "<script>alert('DADOS GRAVADOS COM SUCESSO!');window.location='form_consultacarrinho_pedidos.php';</script>";
					break;

				case "excluir_car":
					//passando as informações do formulário
					$car->pedido_id = $_GET["pedido_id"];

					$car->Excluir();//executando a função
					header("location: form_consultacarrinho_pedidos.php ");//direcionando para o formulário
					break;

				case "dados_car":
					$car = $car->RetornarDados($_GET["codusuario"]);//executando a função para retornar dados
					break;
				
			}
		}
