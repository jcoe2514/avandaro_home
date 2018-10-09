<?php

$usuario = $_POST['nnombre'];
$pass = $_POST['npassword'];

if(empty($usuario) || empty($pass)){
	header("Location: index.html");
	exit();
}

mysql_connect('mx56.hostgator.mx','avandaro_admin','m4t302514') or die("Error al conectar " . mysql_error());
mysql_select_db('avandaro_home') or die ("Error al seleccionar la Base de datos: " . mysql_error());

$result = mysql_query("SELECT * from tc_user where USUARIO='" . $usuario . "'");

if($row = mysql_fetch_array($result)){
	if($row['Password'] ==  $pass){
		session_start();
		$_SESSION['usuario'] = $usuario;
		header("Location: contenido.php");
	}else{
		header("Location: index.html");
		exit();
	}
}else{
	header("Location: index.html");
	exit();
}


?>