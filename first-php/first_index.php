<?php 
	
	$nome = $_GET['nome'];
	$sexo = $_GET['sexo'];
	$mensagem = $_GET['mensagem'];
	
	echo "<b>Nome:</b>".$nome." <br>";
	
	if($sexo == "F"){
		echo "<b>Sexo:</b> Feminino <br>";
	}else if ($sexo == "M"){
		echo "<b>Sexo:</b> Masculino <br>";
	}
	
	echo "<b>Mensagem:</b> ".$mensagem." <br>";
?>