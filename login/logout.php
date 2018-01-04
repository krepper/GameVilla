<?php

	session_start();

	include "../msg_error/logoutm.html";

	session_destroy();

	include "login.html";



?>