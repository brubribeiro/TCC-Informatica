<?php
	class Usuario
	{
		public $codusuario;
		public $nome;
   		public $email;
   		public $telefone;
   		public $celular;
   		public $endereco;
   		public $nomeusuario;
   		public $senha;
   		public $imgperfil;
   		public $tipo;
	   		

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
			$sql = "insert into usuario
					(nome,email,telefone,celular,endereco,nomeusuario,senha,imgperfil,tipo) 
					values 
					(?,?,?,?,?,?,?,?,?)";

			//executando o comando sql e passando os valores
			$this->con->prepare($sql)->execute(array(
			$this->nome,$this->email,$this->telefone,$this->celular,$this->endereco,$this->nomeusuario,
			$this->senha,$this->imgperfil,$this->tipo));
		}

		function Atualizar()
		{
			//passando o comando sql
			$sql = "update usuario set
					nome = ?,email = ?,telefone = ?,celular = ?,endereco = ?,nomeusuario = ?,
					senha = ?,imgperfil = ?,tipo = ?
					where codusuario = ?";

			//executando o comando sql e passando os valores
			$this->con->prepare($sql)->execute(array(
			$this->nome,$this->email,$this->telefone,$this->celular,$this->endereco,$this->nomeusuario,
			$this->senha,$this->imgperfil,$this->tipo,
			$this->codusuario));
		}

		function Atualizar_form()
		{
			//passando o comando sql
			$sql = "update usuario set
					nome = ?,email = ?,telefone = ?,celular = ?,endereco = ?,imgperfil = ?,tipo = ?
					where codusuario = ?";

			//executando o comando sql e passando os valores
			$this->con->prepare($sql)->execute(array(
			$this->nome,$this->email,$this->telefone,$this->celular,$this->endereco,$this->imgperfil,$this->tipo,
			$this->codusuario));
		}

		function Atualizar_usu()
		{
			//passando o comando sql
			$sql = "update usuario set
					senha = ?,nomeusuario = ?
					where codusuario = ?";

			//executando o comando sql e passando os valores
			$this->con->prepare($sql)->execute(array(
			$this->senha,$this->nomeusuario,
			$this->codusuario));
		}

		function Excluir()
		{
			//passando o comando sql
			$sql = "delete from usuario	
					where codusuario = ?";

			//executando o comando sql e passando os valores
			$this->con->prepare($sql)->execute(array($this->codusuario));
		}

		function Consultar()
		{
			$dados = array();
			$sql = $this->con->prepare("select * from usuario");
			$sql->execute();

			foreach ($sql->fetchAll(PDO::FETCH_OBJ) as $linha)
			{
				$usu = new Usuario();
				$usu->codusuario 	= $linha->codusuario;
				$usu->nome 			= $linha->nome;
	   			$usu->email 		= $linha->email;
	   			$usu->telefone 		= $linha->telefone;
	   			$usu->celular 		= $linha->celular;
	   			$usu->endereco 		= $linha->endereco;
	   			$usu->nomeusuario 	= $linha->nomeusuario;
	   			$usu->senha 		= $linha->senha;
	   			$usu->imgperfil		= $linha->imgperfil;
	   			$usu->tipo 			= $linha->tipo;
	   			
				
				$dados[] = $usu;
			}
			return $dados;

		}

		public function RetornarDados($codusuario)
		{
			$sql = $this->con->prepare("select * from usuario where codusuario = ?");
			          

			$sql->execute(array($codusuario));
			$linha = $sql->fetch(PDO::FETCH_OBJ);

			$usu = new Usuario();
			$usu->codusuario 	= $linha->codusuario;
			$usu->nome 			= $linha->nome;
	   		$usu->email 		= $linha->email;
	   		$usu->telefone 		= $linha->telefone;
	   		$usu->celular 		= $linha->celular;
	   		$usu->endereco 		= $linha->endereco;
	   		$usu->nomeusuario 	= $linha->nomeusuario;
	   		$usu->senha 		= $linha->senha;
	   		$usu->imgperfil		= $linha->imgperfil;
	   		$usu->tipo 			= $linha->tipo;
	   			

			return $usu;//objeto preenchido a ser retornado
		}

		public function Logar($nomeusuario, $senha)
		{
			$sql = $this->con->prepare("select * from usuario where nomeusuario = ? and senha = ?");
			          

			$sql->execute(array($nomeusuario, $senha));
			$linha = $sql->fetch(PDO::FETCH_OBJ);

			$usu = new Usuario();

			
			if(isset($linha->codusuario))
			{
				$usu->codusuario 	= $linha->codusuario;
				$usu->nome 			= $linha->nome;
	   			$usu->email 		= $linha->email;
	   			$usu->telefone 		= $linha->telefone;
	   			$usu->celular 		= $linha->celular;
	   			$usu->endereco 		= $linha->endereco;
	   			$usu->nomeusuario 	= $linha->nomeusuario;
	   			$usu->senha 		= $linha->senha;
	   			$usu->imgperfil		= $linha->imgperfil;
	   			$usu->tipo 			= $linha->tipo;
   			   		
			}
			return $usu;//objeto preenchido a ser retornado
		}

	}

	?>