<?php
	class produto
	{
		public $codproduto;
		public $nomeproduto;
		

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
			$sql = "insert into produto
					(nomeproduto) 
					values 
					(?)";

			//executando o comando sql e passando os valores
			$this->con->prepare($sql)->execute(array(
			$this->nomeproduto));
		}

		function Atualizar()
		{
			//passando o comando sql
			$sql = "update produto set
					nomeproduto = ?
					where codproduto = ?";

			//executando o comando sql e passando os valores
			$this->con->prepare($sql)->execute(array(
			$this->nomeproduto,
			$this->codproduto));
		}

		function Excluir()
		{
			//passando o comando sql
			$sql = "delete from produto	
					where codproduto = ?";

			//executando o comando sql e passando os valores
			$this->con->prepare($sql)->execute(array($this->codproduto));
		}

		function Consultar()
		{
			$dados = array();
			$sql = $this->con->prepare("select * from produto");
			$sql->execute();

			foreach ($sql->fetchAll(PDO::FETCH_OBJ) as $linha)
			{
				$pro = new produto();
				$pro->codproduto 		= $linha->codproduto;
				$pro->nomeproduto 	= $linha->nomeproduto;
	   			
				
				$dados[] = $pro;
			}
			return $dados;

		}

		public function RetornarDados($codproduto)
		{
			$sql = $this->con->prepare("select * from produto where codproduto = ?");
			          

			$sql->execute(array($codproduto));
			$linha = $sql->fetch(PDO::FETCH_OBJ);

				$pro = new produto();
				$pro->codproduto 		= $linha->codproduto;
				$pro->nomeproduto 	= $linha->nomeproduto;
	   			

			return $pro;//objeto preenchido a ser retornado
		}

	}

	?>