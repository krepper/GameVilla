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

		if($nivel_user <= 2){
			echo "<center> Jogar </center>";
		}

		if($nivel_user >= 2){
			echo "</br><center> Painel administrativo </center>";
		}

		echo "</br></br><center><a href=\"logout.php\">Sair</a></center>";

	} else {
	
		include "../msg_error/loginerror.html";

		include "login.html";

	}



?>