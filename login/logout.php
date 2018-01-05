<?php

	session_start();

	include "../auxi/logoutm.html";

	session_destroy();

	include "login.html";



?>