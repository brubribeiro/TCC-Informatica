<?php
$tipo = "";
if(isset($_SESSION['tipo'])) $tipo = $_SESSION['tipo'];

if($tipo == "Administrador")
		include_once("../model/usoproduto.php");//incluindo a classe com os comandos
else
		include_once("../admconfeitaria/model/usoproduto.php");//incluindo a classe com os		

		$uso = new usoproduto(); //instanciando a classe produto

		if(isset($_REQUEST["acao"])) //irá executar apenas se for preenchida a opção op
		{
			switch($_REQUEST["acao"])//verifica qual é a ação a ser executada
			{
				case "cadastrar_uso":
					//passando as informações do formulário
					$uso->codproduto = $_POST["codproduto"];
					$uso->quant_uso = $_POST["quant_uso"];
					$uso->data = $_POST["data"];

					if($_POST['estoque'] >= $_POST['quant_uso'])
					{
						$uso->Cadastrar();//executando a função

						//código para baixar estoque
						//passando as informações do formulário
						include_once("../model/compraproduto.php");//incluindo a classe com os comandos

						$com = new compraproduto(); //instanciando a classe produto
						$com->codproduto = $_POST["codproduto"];
						$com->quant_compra = $_POST["quant_uso"];					
						$com->codcompraprod = $_POST["codcompraprod"];
						$com->BaixarEstoque();//executando a função


						echo "<script>alert('DADOS GRAVADOS COM SUCESSO!');window.location='form_usoproduto.php';</script>";
					}
					else
					{
						echo "<script>alert('ESTOQUE INDISPONÍVEL!');window.location='form_usoproduto.php';</script>";
					}
					break;

				case "atualizar_uso":
					//passando as informações do formulário
					$uso->codproduto = $_POST["codproduto"];
					$uso->quant_uso = $_POST["quant_uso"];
					$uso->data = $_POST["data"];
					

					$uso->codusoproduto = $_POST["codusoproduto"];

					$uso->Atualizar();//executando a função
					echo "<script>alert('DADOS GRAVADOS COM SUCESSO!');window.location='form_consultausoproduto.php';</script>";
					break;

				case "excluir_uso":
					//passando as informações do formulário
					$uso->codusoproduto = $_GET["codusoproduto"];

					$uso->Excluir();//executando a função
					header("location: form_consultausoproduto.php ");//direcionando para o formulário
					break;

				case "dados_uso":
					$uso = $uso->RetornarDados($_GET["codusoproduto"]);//executando a função para retornar dados
					break;
			}
		}

		?>