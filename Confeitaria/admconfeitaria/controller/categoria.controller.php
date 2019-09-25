<?php
//exemplo chave estrangeira
//alter table imgbolo add FOREIGN key (codcategoria) REFERENCES categoria(codcategoria)
$tipo = "";
if(isset($_SESSION['tipo'])) $tipo = $_SESSION['tipo'];

if($tipo == "Administrador")
		include_once("../model/categoria.php");//incluindo a classe com os comandos
else
		include_once("../admconfeitaria/model/categoria.php");//incluindo a classe com os 
		$cat = new Categoria(); //instanciando a classe produto

		if(isset($_REQUEST["acao"])) //irá executar apenas se for preenchida a opção op
		{
			switch($_REQUEST["acao"])//verifica qual é a ação a ser executada
			{
				case "cadastrar_cat":
					//passando as informações do formulário
					$cat->descricao = $_POST["descricao"];
					

					$cat->Cadastrar();//executando a função
					echo "<script>alert('DADOS GRAVADOS COM SUCESSO!');window.location='form_categoria.php';</script>";
					break;

				case "atualizar_cat":
					//passando as informações do formulário
					$cat->descricao = $_POST["descricao"];
					

					$cat->codcategoria = $_POST["codcategoria"];

					$cat->Atualizar();//executando a função
					echo "<script>alert('DADOS GRAVADOS COM SUCESSO!');window.location='form_consultacategoria.php';</script>";
					break;

				case "excluir_cat":
					//passando as informações do formulário
					$cat->codcategoria = $_GET["codcategoria"];

					$cat->Excluir();//executando a função
					header("location: form_consultacategoria.php ");//direcionando para o formulário
					break;

				case "dados_cat":
					$cat = $cat->RetornarDados($_GET["codcategoria"]);//executando a função para retornar dados
					break;
			}
		}

		?>