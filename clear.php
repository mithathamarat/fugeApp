<?php
	session_start();
	unset($_SESSION['table']);
	
	if(session_destroy())
	{
		header("Location: home");
	}
?>