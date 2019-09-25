<?php

$tipo = "";
if(isset($_SESSION['tipo'])) $tipo = $_SESSION['tipo'];

if($tipo == "Administrador")
		include_once("../model/compraproduto.php");//incluindo a classe com os comandos
else
		include_once("../admconfeitaria/model/compraproduto.php");//incluindo a classe com os
		

		$com = new compraproduto(); //instanciando a classe produto

		if(isset($_REQUEST["acao"])) //irá executar apenas se for preenchida a opção op
		{
			switch($_REQUEST["acao"])//verifica qual é a ação a ser executada
			{
				case "cadastrar_com":

						$com->codcompraprod = $_POST["codcompraprod"];
						$com->codproduto = $_POST["codproduto"];
						$com->quant_compra = $_POST["quant_compra"];

					$com = $com->RetornarDados($_POST["codproduto"]);//executando a função para retornar 
					if($com->codproduto == "")
					{
						$com->codcompraprod = $_POST["codcompraprod"];
						$com->codproduto = $_POST["codproduto"];
						$com->quant_compra = $_POST["quant_compra"];
						$com->Cadastrar();						

						echo "<script>alert('DADOS GRAVADOS COM SUCESSO!');window.location='form_compraproduto.php';</script>";						
					}
					else 
					{	
						$com->codcompraprod = $_POST["codcompraprod"];
						$com->codproduto = $_POST["codproduto"];
						$com->quant_compra = $_POST["quant_compra"];							
						$com->AdicionarEstoque();//executando a função						

						echo "<script>alert('DADOS GRAVADOS COM SUCESSO!');window.location='form_compraproduto.php';</script>";
					}

					break;
					

				case "atualizar_com":
					//passando as informações do formulário
					$com->codproduto = $_POST["codproduto"];
					$com->quant_compra = $_POST["quant_compra"];					
					

					$com->codcompraprod = $_POST["codcompraprod"];

					$com->Atualizar();//executando a função
					echo "<script>alert('DADOS GRAVADOS COM SUCESSO!');window.location='form_consultacompraproduto.php';</script>";
					break;

				case "excluir_com":
					//passando as informações do formulário
					$com->codcompraprod = $_GET["codcompraprod"];

					$com->Excluir();//executando a função
					header("location: form_consultacompraproduto.php ");//direcionando para o formulário
					break;

				case "dados_com":
					$com = $com->RetornarDados($_GET["codcompraprod"]);//executando a função para retornar dados
					break;
			}
		}

		?>