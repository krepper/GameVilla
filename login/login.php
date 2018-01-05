<?php

	session_start();

	include "../config.php";

	$login = trim ($_POST['login']);
	$senha = trim ($_POST['senha']);

	if((!$login) || (!$senha)){
		include "../auxi/campovazio.html";

		include "../index.html";
	} else {

		$sql = mysqli_query($conectar, "SELECT * FROM usuario WHERE login = '{$login}' AND senha = '{$senha}' AND ativado='1' ");

		$login_check = mysqli_num_rows($sql);

		if($login_check > 0){

			$dado = mysqli_fetch_array($sql, MYSQLI_ASSOC);

			$_SESSION['login'] = $login;
			$_SESSION['senha'] = $senha;
			$_SESSION['nivel_user'] = $dado['nivel_user'];
			$_SESSION['id'] = $dado['id'];
			$_SESSION['email'] = $dado['email'];

			header("Location: login_aprovado.php");

		} else {
			include "../auxi/loginerror.html";

			include "login.html";
		}
	}
?>