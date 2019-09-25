<?php
	class carrinho_temporario
	{
		public $temporario_id;
		public $temporario_produto;
		public $temporario_quantidade;
		public $temporario_preco;
		public $temporario_cliente;
		public $temporario_data;
		public $temporario_sessao;
		

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
			$sql = "insert into carrinho_temporario
					(temporario_produto,temporario_quantidade,temporario_preco,temporario_cliente,temporario_data,temporario_sessao) 
					values 
					(?,?,?,?,?,?)";

			//executando o comando sql e passando os valores
			$this->con->prepare($sql)->execute(array(
			$this->temporario_produto,$this->temporario_quantidade,$this->temporario_preco,$this->temporario_cliente,$this->temporario_data,$this->temporario_sessao));
		}

		function Atualizar()
		{
			//passando o comando sql
			$sql = "update carrinho_temporario set
					temporario_produto = ?,temporario_quantidade = ?,temporario_preco = ?,temporario_cliente = ?,temporario_data = ?,temporario_sessao = ?
					where temporario_id = ?";

			//executando o comando sql e passando os valores
			$this->con->prepare($sql)->execute(array(
			$this->temporario_produto,$this->temporario_quantidade,$this->temporario_preco,$this->temporario_cliente,$this->temporario_data,$this->temporario_sessao,
			$this->temporario_id));
		}

		function Excluir()
		{
			//passando o comando sql
			$sql = "delete from carrinho_temporario	
					where temporario_id = ?";

			//executando o comando sql e passando os valores
			$this->con->prepare($sql)->execute(array($this->temporario_id));
		}

		function Consultar()
		{
			$dados = array();
			$sql = $this->con->prepare("select * from carrinho_temporario");
			$sql->execute();

			foreach ($sql->fetchAll(PDO::FETCH_OBJ) as $linha)
			{
				$car = new carrinho_temporario();
				$car->temporario_id 		= $linha->temporario_id;
				$car->temporario_produto 	= $linha->temporario_produto;
	   			$car->temporario_quantidade 	= $linha->temporario_quantidade;
	   			$car->temporario_preco 	= $linha->temporario_preco;
	   			$car->temporario_cliente 	= $linha->temporario_cliente;
	   			$car->temporario_data 	= $linha->temporario_data;
	   			$car->temporario_sessao 	= $linha->temporario_sessao;
	   			
				
				$dados[] = $car;
			}
			return $dados;

		}

		public function RetornarDados($temporario_id)
		{
			$sql = $this->con->prepare("select * from carrinho_temporario where temporario_id = ?");
			          

			$sql->execute(array($temporario_id));
			$linha = $sql->fetch(PDO::FETCH_OBJ);

				$car = new carrinho_temporario();
				$car->temporario_id 		= $linha->temporario_id;
				$car->temporario_produto 	= $linha->temporario_produto;
	   			$car->temporario_quantidade 	= $linha->temporario_quantidade;
	   			$car->temporario_preco 	= $linha->temporario_preco;
	   			$car->temporario_cliente 	= $linha->temporario_cliente;
	   			$car->temporario_data 	= $linha->temporario_data;
	   			$car->temporario_sessao 	= $linha->temporario_sessao;
	   			

			return $car;//objeto preenchido a ser retornado
		}

	}
