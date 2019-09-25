<?php
	class contato
	{
		public $codcontato;
		public $nome;
	   	public $email;
	   	public $mensagem;
	   		

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
			$sql = "insert into contato
					(nome,email,mensagem) 
					values 
					(?,?,?)";

			//executando o comando sql e passando os valores
			$this->con->prepare($sql)->execute(array(
			$this->nome,$this->email,$this->mensagem));
		}

		function Atualizar()
		{
			//passando o comando sql
			$sql = "update contato set
					nome = ?,email = ?,mensagem = ?
					where codcontato = ?";

			//executando o comando sql e passando os valores
			$this->con->prepare($sql)->execute(array(
			$this->nome,$this->email,$this->mensagem,
			$this->codcontato));
		}

		function Excluir()
		{
			//passando o comando sql
			$sql = "delete from contato	
					where codcontato = ?";

			//executando o comando sql e passando os valores
			$this->con->prepare($sql)->execute(array($this->codcontato));
		}

		function Consultar()
		{
			$dados = array();
			$sql = $this->con->prepare("select * from contato");
			$sql->execute();

			foreach ($sql->fetchAll(PDO::FETCH_OBJ) as $linha)
			{
				$con = new contato();
				$con->codcontato 		= $linha->codcontato;
				$con->nome 	= $linha->nome;
	   			$con->email 	= $linha->email;
	   			$con->mensagem 	= $linha->mensagem;
	   			
				
				$dados[] = $con;
			}
			return $dados;

		}

		public function RetornarDados($codcontato)
		{
			$sql = $this->con->prepare("select * from contato where codcontato = ?");
			          

			$sql->execute(array($codcontato));
			$linha = $sql->fetch(PDO::FETCH_OBJ);

			$con = new contato();
			$con->codcontato 		= $linha->codcontato;
			$con->nome 	= $linha->nome;
	   			$con->email 	= $linha->email;
	   			$con->mensagem 	= $linha->mensagem;
	   			

			return $con;//objeto preenchido a ser retornado
		}

	}

	?>