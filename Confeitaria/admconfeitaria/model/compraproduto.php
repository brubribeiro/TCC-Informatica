<?php
	class compraproduto
	{
		public $codcompraprod;
		public $codproduto;
		public $quant_compra;
		
		

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
			$sql = "insert into compraproduto
					(codproduto,quant_compra) 
					values 
					(?,?)";

			//executando o comando sql e passando os valores
			$this->con->prepare($sql)->execute(array(
			$this->codproduto,$this->quant_compra));
		}

		function Atualizar()
		{
			//passando o comando sql
			$sql = "update compraproduto set
					codproduto = ?,quant_compra = ?
					where codcompraprod = ?";

			//executando o comando sql e passando os valores
			$this->con->prepare($sql)->execute(array(
			$this->codproduto,$this->quant_compra,
			$this->codcompraprod));
		}

		function BaixarEstoque()
		{	
			//passando o comando sql
			$sql = "update compraproduto set
					quant_compra = quant_compra - ?
					where codcompraprod = ?";

			//executando o comando sql e passando os valores
			$this->con->prepare($sql)->execute(array(
			$this->quant_compra,
			$this->codcompraprod));
		}

		function AdicionarEstoque()
		{
			//passando o comando sql
			$sql = "update compraproduto set
					quant_compra = quant_compra + ?
					where codproduto = ?";

			//executando o comando sql e passando os valores
			$this->con->prepare($sql)->execute(array(
			$this->quant_compra,
			$this->codproduto));
		}

		function Excluir()
		{
			//passando o comando sql
			$sql = "delete from compraproduto	
					where codcompraprod = ?";

			//executando o comando sql e passando os valores
			$this->con->prepare($sql)->execute(array($this->codcompraprod));
		}

		function Consultar()
		{
			$dados = array();
			$sql = $this->con->prepare("select * from compraproduto join produto on compraproduto.codproduto = produto.codproduto");
			$sql->execute();

			foreach ($sql->fetchAll(PDO::FETCH_OBJ) as $linha)
			{
				$com = new compraproduto();
				$com->codcompraprod = $linha->codcompraprod;
				$com->codproduto 	= $linha->codproduto;
				$com->nomeproduto   = $linha->nomeproduto;
	   			$com->quant_compra 	= $linha->quant_compra;	   			
	   			
				
				$dados[] = $com;
			}
			return $dados;

		}

		public function RetornarDados($codproduto)
		{
			$sql = $this->con->prepare("select * from compraproduto join produto on compraproduto.codproduto = produto.codproduto where produto.codproduto = ?");			          

			$sql->execute(array($codproduto));
			$linha = $sql->fetch(PDO::FETCH_OBJ);
			$com = new compraproduto();
			if(isset($linha->codproduto)){	

				$com->codcompraprod	=	$linha->codcompraprod;
				$com->codproduto 	= 	$linha->codproduto;
				$com->nomeproduto	=	$linha->nomeproduto;
	   			$com->quant_compra 	= 	$linha->quant_compra;
	   		}		   				   			
	   		   			   				   			
			return $com;//objeto preenchido a ser retornado
		}

		public function RetornarDadosEstoque($codcompraprod)
		{
			$sql = $this->con->prepare("select * from compraproduto join produto on compraproduto.codproduto = produto.codproduto where codcompraprod = ?");			          

			$sql->execute(array($codcompraprod));
			$linha = $sql->fetch(PDO::FETCH_OBJ);
			$com = new compraproduto();
			
				$com->codcompraprod	=	$linha->codcompraprod;
				$com->codproduto 	= 	$linha->codproduto;
				$com->nomeproduto	=	$linha->nomeproduto;
	   			$com->quant_compra 	= 	$linha->quant_compra;

			return $com;//objeto preenchido a ser retornado
		}

		

	}

	?>