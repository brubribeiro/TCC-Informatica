<?php
class Conexao
{
	function Conectar()
	{
		//PDO - PHP Data Objects é uma classe para trabalhar com procedimentos relacionados a banco de dados
		$con = new PDO("mysql:host=localhost;dbname=bdconfeitaria;port=3306;","root","");
		return $con;
		//$con = mysqli_connect("localhost","root","","bdconfeitaria") or die (mysqli_error());
				
	}
}
?>