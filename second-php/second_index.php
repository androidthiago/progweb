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
	
	$conexão = mysql_connect("localhost", "root", "root777") or print (mysql_error());
	mysql_select_db("progweb", $conexão) or print(mysql_error());
	
	$sql = "INSERT INTO pessoa(nome, sexo, mensagem) VALUES ('".$nome."','".$sexo."','".$mensagem."')";
	$result = mysql_query($sql, $conexão) or die (mysql_error());
	
	if ($result === TRUE) {
		echo "<br><b>Inserido com sucesso!</b>.<br/><br/>";
	} else {
	    echo "Ocorreu algum erro!" ;
	}
	
	mysql_close($conexão);
	
?>