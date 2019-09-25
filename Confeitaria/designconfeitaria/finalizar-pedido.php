<?php
	session_start();
	include 'conexao.php';
	include_once("../admconfeitaria/controller/usuario.controller.php");
		
		$totale = filter_input(INPUT_GET, 'total');
		$total = number_format($totale, 2,',','.');

		$sessao = $_SESSION['pedido'];
		$consulta = $pdo-> prepare("SELECT * FROM carrinho_temporario WHERE temporario_sessao = :ses");
		$consulta -> bindValue(':ses', $sessao);
		$consulta -> execute();
		$linhas = $consulta -> rowCount();
				
		$usuario = $_SESSION['codusuario'];

		foreach($consulta as $mostra):
		$produto_id = $mostra['temporario_produto'];
		$produto_quantidade = $mostra['temporario_quantidade'];
		$produto_preco = $mostra['temporario_preco'];
		$produto_data = date('Y-m-d H:i:s');
		
		$inserir = $pdo->prepare("INSERT INTO carrinho_pedidos (pedido_produto,pedido_id,codusuario, pedido_quantidade, pedido_preco ,pedido_valor_total,pedido_data, pedido_sessao) VALUES ('$produto_id','$produto_id','$usuario','$produto_quantidade','$produto_preco','$total','$produto_data','$sessao')");
		$inserir ->execute();
		endforeach;
		if(!$_SESSION['codusuario']):
			echo '<script>alert("Pedido enviado!")</script>';
			echo '<script>window.location="login.php"</script>';
		else:
			echo '<script>alert("Pedido enviado!")</script>';
			echo '<script>window.location="pedidofinalizado.php"</script>';
		endif;
?>