<?php
	class descricao
	{
		public $coddescricao;
		public $titulo;
		public $descricao;
		public $data;
		public $codcategoria;
		

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
			$sql = "insert into descricao
					(titulo,descricao,data,codcategoria) 
					values 
					(?,?,?,?)";

			//executando o comando sql e passando os valores
			$this->con->prepare($sql)->execute(array(
			$this->titulo,$this->descricao,$this->data,$this->codcategoria));
		}

		function Atualizar()
		{
			//passando o comando sql
			$sql = "update descricao set
					titulo = ?,descricao = ?,data = ?,codcategoria = ?
					where coddescricao = ?";

			//executando o comando sql e passando os valores
			$this->con->prepare($sql)->execute(array(
			$this->titulo,$this->descricao,$this->data,$this->codcategoria,
			$this->coddescricao));
		}

		function Excluir()
		{
			//passando o comando sql
			$sql = "delete from descricao	
					where coddescricao = ?";

			//executando o comando sql e passando os valores
			$this->con->prepare($sql)->execute(array($this->coddescricao));
		}

		function Consultar()
		{
			$dados = array();
			$sql = $this->con->prepare("select * from descricao");
			$sql->execute();

			foreach ($sql->fetchAll(PDO::FETCH_OBJ) as $linha)
			{
				$des = new descricao();
				$des->coddescricao 		= $linha->coddescricao;
				$des->titulo 	= $linha->titulo;
				$des->descricao 	= $linha->descricao;
	   			$des->data 	= $linha->data;
	   			$des->codcategoria 	= $linha->codcategoria;
	   			
				
				$dados[] = $des;
			}
			return $dados;

		}

		function ConsultarPorCategoria($codcategoria)
		{
			$dados = array();
			$sql = $this->con->prepare("select * from descricao where codcategoria = ?");
			$sql->execute(array($codcategoria));

			foreach ($sql->fetchAll(PDO::FETCH_OBJ) as $linha)
			{
				$des = new descricao();
				$des->coddescricao 		= $linha->coddescricao;
				$des->titulo 	= $linha->titulo;
				$des->descricao 	= $linha->descricao;
	   			$des->data 	= $linha->data;
	   			$des->codcategoria 	= $linha->codcategoria;
	   			
				
				$dados[] = $des;
			}
			return $dados;

		}

		public function RetornarDados($coddescricao)
		{
			$sql = $this->con->prepare("select * from descricao where coddescricao = ?");
			          

			$sql->execute(array($coddescricao));
			$linha = $sql->fetch(PDO::FETCH_OBJ);

				$des = new descricao();
				$des->coddescricao 		= $linha->coddescricao;
				$des->titulo 	= $linha->titulo;
				$des->descricao 	= $linha->descricao;
	   			$des->data 	= $linha->data;
	   			$des->codcategoria 	= $linha->codcategoria;
	   			

			return $des;//objeto preenchido a ser retornado
		}

	}

	?>