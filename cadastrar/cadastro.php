
<?php

	include "../config.php";

	$login = trim ($_POST['login']);
	$senha = trim ($_POST['senha']);
	$email = trim ($_POST['email']);
	$cor = trim ($_POST['cor']);
	$cabeca = trim ($_POST['cabeca']);
	$cadastro_valido = FALSE;

	if ((!$login) || (!$senha) || (!$email)){
		include "../auxi/campovazio.html";
		include "cadastro.html";
	} else {

		$sql_user_check = mysqli_query($conectar, "SELECT * FROM usuario WHERE login='{$login}' ");

		$dado = mysqli_fetch_array($sql_user_check, MYSQLI_ASSOC);

		if($dado['login'] == $login){
			include "../auxi/usuarioexiste.html";

			include "cadastro.html";
		} else {
			$cadastro_valido = TRUE;
		}

	}

	if ($cadastro_valido == TRUE){

		$sql = mysqli_query($conectar, "INSERT INTO usuario (login, senha, email, cor, cabeca) VALUES ('$login', '$senha', '$email', '$cor', '$cabeca')") or die (mysqli_error($conectar));

		if (!$sql){
			echo "erro ao criar user";
		}

		$id = mysqli_insert_id($conectar);

		include "cadastro_realizado.html";

	}

?>