<?php
	class Categoria
	{
		public $codcategoria;
		public $descricao;
		

		public $con;

		function __CONSTRUCT()//executa o comando automáticamente
		{
			include_once("conexao.php"); //incluir a conexão
			$conexao = new Conexao(); //instancia da conexão
			$this->con = $conexao->Conectar();//executando método para conectar
	    }

		function Cadastrar()
		{
			//passando o comando sql
			$sql = "insert into categoria
					(descricao) 
					values 
					(?)";

			//executando o comando sql e passando os valores
			$this->con->prepare($sql)->execute(array(
			$this->descricao));
		}

		function Atualizar()
		{
			//passando o comando sql
			$sql = "update categoria set
					descricao = ?
					where codcategoria = ?";

			//executando o comando sql e passando os valores
			$this->con->prepare($sql)->execute(array(
			$this->descricao,
			$this->codcategoria));
		}

		function Excluir()
		{
			//passando o comando sql
			$sql = "delete from categoria	
					where codcategoria = ?";

			//executando o comando sql e passando os valores
			$this->con->prepare($sql)->execute(array($this->codcategoria));
		}

		function Consultar()
		{
			$dados = array();
			$sql = $this->con->prepare("select * from categoria");
			$sql->execute();

			foreach ($sql->fetchAll(PDO::FETCH_OBJ) as $linha)
			{
				$cat = new Categoria();
				$cat->codcategoria 		= $linha->codcategoria;
				$cat->descricao 	= $linha->descricao;
	   			
				
				$dados[] = $cat;
			}
			return $dados;

		}

		function ConsultarPorCategoria($codcategoria)
		{
			$dados = array();
			$sql = $this->con->prepare("select * from categoria where codcategoria = ?");
			$sql->execute(array($codcategoria));

			foreach ($sql->fetchAll(PDO::FETCH_OBJ) as $linha)
			{
				$cat = new Categoria();
				$cat->codcategoria 		= $linha->codcategoria;
				$cat->descricao 	= $linha->descricao;
	   			
				
				$dados[] = $cat;
			}
			return $dados;

		}

		public function RetornarDados($codcategoria)
		{
			$sql = $this->con->prepare("select * from categoria where codcategoria = ?");
			          

			$sql->execute(array($codcategoria));
			$linha = $sql->fetch(PDO::FETCH_OBJ);

				$cat = new Categoria();
				$cat->codcategoria 		= $linha->codcategoria;
				$cat->descricao 	= $linha->descricao;
	   			

			return $cat;//objeto preenchido a ser retornado
		}

	}

	?>