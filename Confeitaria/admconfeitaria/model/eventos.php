<?php
	class eventos
	{
		public $id;
		public $titulo;
		public $data;
		public $evento;
		

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
			$sql = "insert into eventos
					(titulo,data,evento) 
					values 
					(?,?,?)";

			//executando o comando sql e passando os valores
			$this->con->prepare($sql)->execute(array(
			$this->titulo,$this->data,$this->evento));
		}

		function Atualizar()
		{
			//passando o comando sql
			$sql = "update eventos set
					titulo = ?,data = ?,evento = ?
					where id = ?";

			//executando o comando sql e passando os valores
			$this->con->prepare($sql)->execute(array(
			$this->titulo,$this->data,$this->evento,
			$this->id));
		}

		function Excluir()
		{
			//passando o comando sql
			$sql = "delete from eventos	
					where id = ?";

			//executando o comando sql e passando os valores
			$this->con->prepare($sql)->execute(array($this->id));
		}

		function Consultar()
		{
			$dados = array();
			$sql = $this->con->prepare("select * from eventos");
			$sql->execute();

			foreach ($sql->fetchAll(PDO::FETCH_OBJ) as $linha)
			{
				$eve = new eventos();
				$eve->id 		= $linha->id;
				$eve->titulo 	= $linha->titulo;
	   			$eve->data 	= $linha->data;
	   			$eve->evento 	= $linha->evento;
	   			
				
				$dados[] = $eve;
			}
			return $dados;

		}

		public function RetornarDados($id)
		{
			$sql = $this->con->prepare("select * from eventos where id = ?");
			          

			$sql->execute(array($id));
			$linha = $sql->fetch(PDO::FETCH_OBJ);

				$eve = new eventos();
				$eve->id 		= $linha->id;
				$eve->titulo 	= $linha->titulo;
	   			$eve->data 	= $linha->data;
	   			$eve->evento 	= $linha->evento;
	   			

			return $eve;//objeto preenchido a ser retornado
		}

	}

	?>