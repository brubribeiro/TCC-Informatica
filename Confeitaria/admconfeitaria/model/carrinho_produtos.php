<?php
	class carrinho_produtos
	{
		public $produto_id;
		public $produto_nome;
		public $produto_preco;
		public $produto_quantidade;
		public $produto_img;
		

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
			$sql = "insert into carrinho_produtos
					(produto_nome,produto_preco,produto_quantidade,produto_img) 
					values 
					(?,?,?,?)";

			//executando o comando sql e passando os valores
			$this->con->prepare($sql)->execute(array(
			$this->produto_nome,$this->produto_preco,$this->produto_quantidade,$this->produto_img));
		}

		function Atualizar()
		{
			//passando o comando sql
			$sql = "update carrinho_produtos set
					produto_nome = ?,produto_preco = ?,produto_quantidade = ?,produto_img = ?
					where produto_id = ?";

			//executando o comando sql e passando os valores
			$this->con->prepare($sql)->execute(array(
			$this->produto_nome,$this->produto_preco,$this->produto_quantidade,$this->produto_img,
			$this->produto_id));
		}

		function Excluir()
		{
			//passando o comando sql
			$sql = "delete from carrinho_produtos	
					where produto_id = ?";

			//executando o comando sql e passando os valores
			$this->con->prepare($sql)->execute(array($this->produto_id));
		}

		function Consultar()
		{
			$dados = array();
			$sql = $this->con->prepare("select * from carrinho_produtos");
			$sql->execute();

			foreach ($sql->fetchAll(PDO::FETCH_OBJ) as $linha)
			{
				$car = new carrinho_produtos();
				$car->produto_id 		= $linha->produto_id;
				$car->produto_nome 	= $linha->produto_nome;
	   			$car->produto_preco 	= $linha->produto_preco;
	   			$car->produto_quantidade 	= $linha->produto_quantidade;
	   			$car->produto_img 	= $linha->produto_img;
	   			
				
				$dados[] = $car;
			}
			return $dados;

		}

		public function RetornarDados($produto_id)
		{
			$sql = $this->con->prepare("select * from carrinho_produtos where produto_id = ?");
			          

			$sql->execute(array($produto_id));
			$linha = $sql->fetch(PDO::FETCH_OBJ);

				$car = new carrinho_produtos();
				$car->produto_id 		= $linha->produto_id;
				$car->produto_nome 	= $linha->produto_nome;
	   			$car->produto_preco 	= $linha->produto_preco;
	   			$car->produto_quantidade 	= $linha->produto_quantidade;
	   			$car->produto_img 	= $linha->produto_img;
	   			

			return $car;//objeto preenchido a ser retornado
		}

	}

	