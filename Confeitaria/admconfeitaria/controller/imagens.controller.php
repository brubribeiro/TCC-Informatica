<?php

$tipo = "";
if(isset($_SESSION['tipo'])) $tipo = $_SESSION['tipo'];

		if($tipo == "Administrador")
		include_once("../model/imagens.php");//incluindo a classe com os comandos
		else
		include_once("../admconfeitaria/model/imagens.php");//incluindo a classe com os comandos		

		$ima = new Imagens(); //instanciando a classe produto

		if(isset($_REQUEST["acao"])) //irá executar apenas se for preenchida a opção op
		{
			switch($_REQUEST["acao"])//verifica qual é a ação a ser executada
			{
				case "cadastrar_ima":
					//passando as informações do formulário
					$ima->nome = $_POST["nome"];
					$ima->data = $_POST["data"];					
					$ima->imagem = $_FILES["imagem"]["name"];
					$ima->codcategoria = $_POST["codcategoria"];


					move_uploaded_file($_FILES["imagem"]["tmp_name"], "../view/imagens/".$_FILES["imagem"]["name"]);
					

					$ima->Cadastrar();//executando a função
					echo "<script>alert('DADOS GRAVADOS COM SUCESSO!');window.location='form_imagens.php';</script>";
					break;

				case "atualizar_ima":
					//passando as informações do formulário
					$ima->nome = $_POST["nome"];
					$ima->data = $_POST["data"];
					$ima->imagem = $_FILES["imagem"]["name"];
					$ima->codcategoria = $_POST["codcategoria"];


					move_uploaded_file($_FILES["imagem"]["tmp_name"], "../view/imagens/".$_FILES["imagem"]["name"]);
					

					$ima->codimagem = $_POST["codimagem"];

					$ima->Atualizar();//executando a função
					echo "<script>alert('DADOS GRAVADOS COM SUCESSO!');window.location='form_consultaimagens.php';</script>";
					break;

				case "excluir_ima":
					//passando as informações do formulário
					$ima->codimagem = $_GET["codimagem"];

					$ima->Excluir();//executando a função
					header("location: form_consultaimagens.php ");//direcionando para o formulário
					break;

				case "dados_ima":
					$ima = $ima->RetornarDados($_GET["codimagem"]);//executando a função para retornar dados
					break;
			}
		}

		?>