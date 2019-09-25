<?php
	class imagens
	{
		public $codimagem;
		public $nome;
		public $data;
		public $imagem;
		public $codcategoria;		

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
			$sql = "insert into imagens
					(nome,data,imagem,codcategoria) 
					values 
					(?,?,?,?)";

			//executando o comando sql e passando os valores
			$this->con->prepare($sql)->execute(array(
			$this->nome,$this->data,$this->imagem,$this->codcategoria));
		}

		function Atualizar()
		{
			//passando o comando sql
			$sql = "update imagens set
					nome = ?,data = ?,imagem = ?,codcategoria = ?,
					where codimagem = ?";

			//executando o comando sql e passando os valores
			$this->con->prepare($sql)->execute(array(
			$this->nome,$this->data,$this->imagem,$this->codcategoria,
			$this->codimagem));
		}

		function Excluir()
		{
			//passando o comando sql
			$sql = "delete from imagens	
					where codimagem = ?";

			//executando o comando sql e passando os valores
			$this->con->prepare($sql)->execute(array($this->codimagem));
		}

		function Consultar()
		{
			$dados = array();
			$sql = $this->con->prepare("select * from imagens");
			$sql->execute();

			foreach ($sql->fetchAll(PDO::FETCH_OBJ) as $linha)
			{
				$ima = new imagens();
				$ima->codimagem 		= $linha->codimagem;
				$ima->nome 	= $linha->nome;
	   			$ima->data 	= $linha->data;
	   			$ima->imagem 	= $linha->imagem;
	   			$ima->codcategoria 	= $linha->codcategoria;
	   							
				$dados[] = $ima;
			}
			return $dados;

		}

		function ConsultarPorCategoria($codcategoria)
		{
			$dados = array();
			$sql = $this->con->prepare("select * from imagens where codcategoria = ?");
			$sql->execute(array($codcategoria));

			foreach ($sql->fetchAll(PDO::FETCH_OBJ) as $linha)
			{
				$ima = new imagens();
				$ima->codimagem 		= $linha->codimagem;
				$ima->nome 	= $linha->nome;
	   			$ima->data 	= $linha->data;
	   			$ima->imagem 	= $linha->imagem;
	   			$ima->codcategoria 	= $linha->codcategoria;
	   			
				
				$dados[] = $ima;
			}
			return $dados;

		}

		public function RetornarDados($codimagem)
		{
			$sql = $this->con->prepare("select * from imagens where codimagem = ?");
			          

			$sql->execute(array($codimagem));
			$linha = $sql->fetch(PDO::FETCH_OBJ);

				$ima = new imagens();
				$ima->codimagem 		= $linha->codimagem;
				$ima->nome 	= $linha->nome;
	   			$ima->data 	= $linha->data;
	   			$ima->imagem 	= $linha->imagem;
	   			$ima->codcategoria 	= $linha->codcategoria;
	   			

			return $ima;//objeto preenchido a ser retornado
		}

	}

	?>