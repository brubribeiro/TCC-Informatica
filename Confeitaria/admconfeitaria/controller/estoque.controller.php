<?php
		include_once("../model/estoque.php");//incluindo a classe com os comandos

		$est = new estoque(); //instanciando a classe produto

		if(isset($_REQUEST["acao"])) //irá executar apenas se for preenchida a opção op
		{
			switch($_REQUEST["acao"])//verifica qual é a ação a ser executada
			{
				case "cadastrar_est":
					//passando as informações do formulário
					$est->nomeproduto = $_POST["nomeproduto"];
					$est->quant_compra = $_POST["quant_compra"];
					$est->quant_uso = $_POST["quant_uso"];
					$est->quant_estoque = $_POST["quant_estoque"];
					

					$est->Cadastrar();//executando a função
					echo "<script>alert('DADOS GRAVADOS COM SUCESSO!');window.location='form_estoque.php';</script>";
					break;

				case "atualizar_est":
					//passando as informações do formulário
					$est->nomeproduto = $_POST["nomeproduto"];
					$est->quant_compra = $_POST["quant_compra"];
					$est->quant_uso = $_POST["quant_uso"];
					$est->quant_estoque = $_POST["quant_estoque"];
					

					$est->codestoque = $_POST["codestoque"];

					$est->Atualizar();//executando a função
					echo "<script>alert('DADOS GRAVADOS COM SUCESSO!');window.location='form_consultaestoque.php';</script>";
					break;

				case "excluir_est":
					//passando as informações do formulário
					$est->codestoque = $_GET["codestoque"];

					$est->Excluir();//executando a função
					header("location: form_consultaestoque.php ");//direcionando para o formulário
					break;

				case "dados_est":
					$est = $est->RetornarDados($_GET["codestoque"]);//executando a função para retornar dados
					break;
			}
		}

		?>