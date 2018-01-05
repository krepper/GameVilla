<?php

	session_start();

	include "../config.php";
	
	$login = $_SESSION['login'];
	$senha = $_SESSION['senha'];
	$nivel_user = $_SESSION['nivel_user'];

	$sql = mysqli_query($conectar, "SELECT * FROM usuario WHERE login = '{$login}' AND senha = '{$senha}' AND ativado='1' ");

	$login_check = mysqli_num_rows($sql);

	if($login_check > 0){

		include "login_aprovado.html";

		if($nivel_user >= 0){
			include "../auxi/btn_jogar.html";
			echo "</br>";
		}

		if($nivel_user >= 2){
			include "../auxi/btn_painel.html";
			echo "</br>";
		}

		include "../auxi/btn_sair.html";
		echo "</br>";

	} else {
	
		include "../auxi/loginerror.html";

		include "login.html";

	}



?>