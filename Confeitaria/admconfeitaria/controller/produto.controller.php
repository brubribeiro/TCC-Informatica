<?php
		include_once("../model/produto.php");//incluindo a classe com os comandos

		$pro = new produto(); //instanciando a classe produto

		if(isset($_REQUEST["acao"])) //irá executar apenas se for preenchida a opção op
		{
			switch($_REQUEST["acao"])//verifica qual é a ação a ser executada
			{
				case "cadastrar_pro":
					//passando as informações do formulário
					$pro->nomeproduto = $_POST["nomeproduto"];
					

					$pro->Cadastrar();//executando a função
					echo "<script>alert('DADOS GRAVADOS COM SUCESSO!');window.location='form_produto.php';</script>";
					break;

				case "atualizar_pro":
					//passando as informações do formulário
					$pro->nomeproduto = $_POST["nomeproduto"];
					

					$pro->codproduto = $_POST["codproduto"];

					$pro->Atualizar();//executando a função
					echo "<script>alert('DADOS GRAVADOS COM SUCESSO!');window.location='form_consultaproduto.php';</script>";
					break;

				case "excluir_pro":
					//passando as informações do formulário
					$pro->codproduto = $_GET["codproduto"];

					$pro->Excluir();//executando a função
					header("location: form_consultaproduto.php ");//direcionando para o formulário
					break;

				case "dados_pro":
					$pro = $pro->RetornarDados($_GET["codproduto"]);//executando a função para retornar dados
					break;
			}
		}

		?>