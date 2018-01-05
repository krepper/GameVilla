<?php
	
	session_start();

	include "../../config.php";

	$login = $_SESSION['login'];
	$senha = $_SESSION['senha'];
	$nivel_user = $_SESSION['nivel_user'];

	$sql = mysqli_query($conectar, "SELECT * FROM usuario WHERE login = '{$login}' AND senha = '{$senha}' AND ativado='1' ");

	$login_check = mysqli_num_rows($sql);

	if($login_check > 0){

		
		$login = trim($_POST['login']);
		$ativado = trim($_POST['ativado']);

		$sql = mysqli_query($conectar, "SELECT * FROM usuario WHERE login='{$login}'");

		$validar_check = mysqli_num_rows($sql);

		if($validar_check > 0){

				$dado = mysqli_fetch_array($sql, MYSQLI_ASSOC);

				$id = $dado['id'];

				$sql = mysqli_query($conectar, "UPDATE usuario SET ativado = '$ativado' WHERE usuario.id = '$id';") or die (mysqli_error($conectar));

				include "../../auxi/sucesso.html";

		}else{
			include "../../auxi/usuarinexiste.html";
		}

	} else {
	
		include "../../auxi/loginerror.html";

		include "login.html";

	}

	include "home.php";

?>