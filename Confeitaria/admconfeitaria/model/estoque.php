<?php
	class estoque
	{
		public $codestoque;
		public $nomeproduto;
		public $quant_compra;
		public $quant_uso;
		public $quant_estoque;
		

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
			$sql = "insert into estoque
					(nomeproduto,quant_compra,quant_uso,quant_estoque) 
					values 
					(?,?,?,?)";

			//executando o comando sql e passando os valores
			$this->con->prepare($sql)->execute(array(
			$this->nomeproduto,$this->quant_compra,$this->quant_uso,$this->quant_estoque));
		}

		function Atualizar()
		{
			//passando o comando sql
			$sql = "update estoque set
					nomeproduto = ?,quant_compra = ?,quant_uso = ?,quant_estoque = ?
					where codestoque = ?";

			//executando o comando sql e passando os valores
			$this->con->prepare($sql)->execute(array(
			$this->nomeproduto,$this->quant_compra,$this->quant_uso,$this->quant_estoque,
			$this->codestoque));
		}

		function Excluir()
		{
			//passando o comando sql
			$sql = "delete from estoque	
					where codestoque = ?";

			//executando o comando sql e passando os valores
			$this->con->prepare($sql)->execute(array($this->codestoque));
		}

		function Consultar()
		{
			$dados = array();
			$sql = $this->con->prepare("select * from estoque");
			$sql->execute();

			foreach ($sql->fetchAll(PDO::FETCH_OBJ) as $linha)
			{
				$est = new estoque();
				$est->codestoque 		= $linha->codestoque;
				$est->nomeproduto 	= $linha->nomeproduto;
	   			$est->quant_compra 	= $linha->quant_compra;
	   			$est->quant_uso 	= $linha->quant_uso;
	   			$est->quant_estoque 	= $linha->quant_estoque;
	   			
				
				$dados[] = $est;
			}
			return $dados;

		}

		public function RetornarDados($codestoque)
		{
			$sql = $this->con->prepare("select * from estoque where codestoque = ?");
			          

			$sql->execute(array($codestoque));
			$linha = $sql->fetch(PDO::FETCH_OBJ);

				$est = new estoque();
				$est->codestoque 		= $linha->codestoque;
				$est->nomeproduto 	= $linha->nomeproduto;
	   			$est->quant_compra 	= $linha->quant_compra;
	   			$est->quant_uso 	= $linha->quant_uso;
	   			$est->quant_estoque 	= $linha->quant_estoque;
	   			

			return $est;//objeto preenchido a ser retornado
		}

	}

	?>