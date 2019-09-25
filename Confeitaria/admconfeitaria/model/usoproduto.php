<?php
	class usoproduto
	{
		public $codusoproduto;
		public $codproduto;
		public $quant_uso;
		public $data;
		

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
			$sql = "insert into usoproduto
					(codproduto,quant_uso,data) 
					values 
					(?,?,?)";

			//executando o comando sql e passando os valores
			$this->con->prepare($sql)->execute(array(
			$this->codproduto,$this->quant_uso,$this->data));
		}

		function Atualizar()
		{
			//passando o comando sql
			$sql = "update usoproduto set
					codproduto = ?,quant_uso = ?,data = ?
					where codusoproduto = ?";

			//executando o comando sql e passando os valores
			$this->con->prepare($sql)->execute(array(
			$this->codproduto,$this->quant_uso,$this->data,
			$this->codusoproduto));
		}

		function Excluir()
		{
			//passando o comando sql
			$sql = "delete from usoproduto	
					where codusoproduto = ?";

			//executando o comando sql e passando os valores
			$this->con->prepare($sql)->execute(array($this->codusoproduto));
		}

		function Consultar()
		{
			$dados = array();
			$sql = $this->con->prepare("select * from usoproduto join produto on usoproduto.codproduto = produto.codproduto");
			$sql->execute();

			foreach ($sql->fetchAll(PDO::FETCH_OBJ) as $linha)
			{
				$uso = new usoproduto();
				$uso->codusoproduto = $linha->codusoproduto;
				$uso->codproduto 	= $linha->codproduto;
				$uso->nomeproduto	= $linha->nomeproduto;
	   			$uso->quant_uso 	= $linha->quant_uso;
	   			$uso->data 			= $linha->data;
	   			
				
				$dados[] = $uso;
			}
			return $dados;

		}

		public function RetornarDados($codusoproduto)
		{
			$sql = $this->con->prepare("select * from usoproduto where codusoproduto = ?");
			          

			$sql->execute(array($codusoproduto));
			$linha = $sql->fetch(PDO::FETCH_OBJ);

				$uso = new usoproduto();
				$uso->codusoproduto 		= $linha->codusoproduto;
				$uso->codproduto 	= $linha->codproduto;
	   			$uso->quant_uso 	= $linha->quant_uso;
	   			$uso->data 	= $linha->data;
	   			

			return $uso;//objeto preenchido a ser retornado
		}

	}

	?>