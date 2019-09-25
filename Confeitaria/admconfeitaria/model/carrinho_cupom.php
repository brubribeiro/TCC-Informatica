<?php
	class carrinho_cupom
	{
		public $cupom_id;
		public $cupom_titulo;
		public $cupom_desconto;		

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
			$sql = "insert into carrinho_cupom
					(cupom_titulo,cupom_desconto) 
					values 
					(?,?)";

			//executando o comando sql e passando os valores
			$this->con->prepare($sql)->execute(array(
			$this->cupom_titulo,$this->cupom_desconto));
		}

		function Atualizar()
		{
			//passando o comando sql
			$sql = "update carrinho_cupom set
					cupom_titulo = ?,cupom_desconto = ?
					where cupom_id = ?";

			//executando o comando sql e passando os valores
			$this->con->prepare($sql)->execute(array(
			$this->cupom_titulo,$this->cupom_desconto,
			$this->cupom_id));
		}

		function Excluir()
		{
			//passando o comando sql
			$sql = "delete from carrinho_cupom	
					where cupom_id = ?";

			//executando o comando sql e passando os valores
			$this->con->prepare($sql)->execute(array($this->cupom_id));
		}

		function Consultar()
		{
			$dados = array();
			$sql = $this->con->prepare("select * from carrinho_cupom");
			$sql->execute();

			foreach ($sql->fetchAll(PDO::FETCH_OBJ) as $linha)
			{
				$car = new carrinho_cupom();
				$car->cupom_id 		= $linha->cupom_id;
				$car->cupom_titulo 	= $linha->cupom_titulo;
	   			$car->cupom_desconto 	= $linha->cupom_desconto;   			
				
				$dados[] = $car;
			}
			return $dados;

		}

		public function RetornarDados($cupom_id)
		{
			$sql = $this->con->prepare("select * from carrinho_cupom where cupom_id = ?");
			          

			$sql->execute(array($cupom_id));
			$linha = $sql->fetch(PDO::FETCH_OBJ);

				$car = new carrinho_cupom();
				$car->cupom_id 		= $linha->cupom_id;
				$car->cupom_titulo 	= $linha->cupom_titulo;
	   			$car->cupom_desconto 	= $linha->cupom_desconto;	  			

			return $car;//objeto preenchido a ser retornado
		}

	}
	