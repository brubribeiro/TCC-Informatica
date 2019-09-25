<?php
	class carrinho_pedidos
	{
		public $pedido_id;
		public $codusuario;
		public $pedido_produto;
		public $pedido_quantidade;
		public $pedido_preco;
		public $pedido_valor_total;
		public $pedido_cliente;
		public $pedido_data;
		public $pedido_sessao;
		

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
			$sql = "insert into carrinho_pedidos
					(codusuario,pedido_produto,pedido_quantidade,pedido_preco,pedido_valor_total,pedido_cliente,pedido_data,pedido_sessao) 
					values 
					(?,?,?,?,?,?,?,?)";

			//executando o comando sql e passando os valores
			$this->con->prepare($sql)->execute(array(
			$this->codusuario,$this->pedido_produto,$this->pedido_quantidade,$this->pedido_preco,$this->pedido_valor_total,$this->pedido_cliente,$this->pedido_data,$this->pedido_sessao));
		}

		function Atualizar()
		{
			//passando o comando sql
			$sql = "update carrinho_pedidos set
					codusuario = ?,pedido_produto = ?,pedido_quantidade = ?,pedido_preco = ?,pedido_valor_total = ?,pedido_cliente = ?,pedido_data = ?,pedido_sessao = ?
					where pedido_id = ?";

			//executando o comando sql e passando os valores
			$this->con->prepare($sql)->execute(array(
			$this->codusuario,$this->pedido_produto,$this->pedido_quantidade,$this->pedido_preco,$this->pedido_valor_total,$this->pedido_cliente,$this->pedido_data,$this->pedido_sessao,
			$this->pedido_id));
		}

		function Excluir()
		{
			//passando o comando sql
			$sql = "delete from carrinho_pedidos	
					where pedido_id = ?";

			//executando o comando sql e passando os valores
			$this->con->prepare($sql)->execute(array($this->pedido_id));
		}

		function Consultar()
		{
			$dados = array();
			$sql = $this->con->prepare("select * from carrinho_pedidos join usuario on carrinho_pedidos.codusuario = usuario.codusuario");
			$sql->execute();

			foreach ($sql->fetchAll(PDO::FETCH_OBJ) as $linha)
			{
				$car = new carrinho_pedidos();
				$car->pedido_id 		= $linha->pedido_id;
				$car->codusuario	=	$linha->codusuario;
				$car->pedido_produto 	= $linha->pedido_produto;
	   			$car->pedido_quantidade 	= $linha->pedido_quantidade;
	   			$car->pedido_preco 	= $linha->pedido_preco;
	   			$car->pedido_valor_total 	= $linha->pedido_valor_total;
	   			$car->pedido_cliente 	= $linha->pedido_cliente;
	   			$car->pedido_data 	= $linha->pedido_data;
	   			$car->pedido_sessao 	= $linha->pedido_sessao;
	   			
				
				$dados[] = $car;
			}
			return $dados;

		}
		function ConsultarPedido($codusuario)
		{
			$dados = array();
			$sql = $this->con->prepare("select * from carrinho_pedidos where codusuario = ?");
			$sql->execute(array($codusuario));

			foreach ($sql->fetchAll(PDO::FETCH_OBJ) as $linha)
			{
				$car = new carrinho_pedidos();
				$car->pedido_id 		= $linha->pedido_id;
				$car->codusuario	=	$linha->codusuario;
				$car->pedido_produto 	= $linha->pedido_produto;
	   			$car->pedido_quantidade 	= $linha->pedido_quantidade;
	   			$car->pedido_preco 	= $linha->pedido_preco;
	   			$car->pedido_valor_total 	= $linha->pedido_valor_total;
	   			$car->pedido_cliente 	= $linha->pedido_cliente;
	   			$car->pedido_data 	= $linha->pedido_data;
	   			$car->pedido_sessao 	= $linha->pedido_sessao;
	   			
				
				$dados[] = $car;
			}
			return $dados;

		}

		
		public function RetornarDados($pedido_id)
		{
			$sql = $this->con->prepare("select * from carrinho_pedidos where pedido_id = ?");
			          

			$sql->execute(array($pedido_id));
			$linha = $sql->fetch(PDO::FETCH_OBJ);

				$car = new carrinho_pedidos();
				$car->pedido_id 		= $linha->pedido_id;
				$car->codusuario	=	$linha->codusuario;
				$car->pedido_produto 	= $linha->pedido_produto;
	   			$car->pedido_quantidade 	= $linha->pedido_quantidade;
	   			$car->pedido_preco 	= $linha->pedido_preco;
	   			$car->pedido_valor_total 	= $linha->pedido_valor_total;
	   			$car->pedido_cliente 	= $linha->pedido_cliente;
	   			$car->pedido_data 	= $linha->pedido_data;
	   			$car->pedido_sessao 	= $linha->pedido_sessao;
	   			

			return $car;//objeto preenchido a ser retornado
		}
		public function RetornarDadosPedido($codusuario)
		{
			$sql = $this->con->prepare("select * from carrinho_pedidos where codusuario = ?");

			$sql->execute(array($codusuario));
			$linha = $sql->fetch(PDO::FETCH_OBJ);

				$car = new carrinho_pedidos();
				if(isset($linha->$codusuario)){	
				$car->pedido_id 		= $linha->pedido_id;
				$car->pedido_produto 	= $linha->pedido_produto;
	   			$car->pedido_quantidade = $linha->pedido_quantidade;
	   			$car->pedido_preco 		= $linha->pedido_preco;
	   			$car->pedido_data 		= $linha->pedido_data;
	   		}	

			return $car;//objeto preenchido a ser retornado
		}

	}

	