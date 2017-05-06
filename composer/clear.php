<?php
session_start();
unset($_SESSION['project']);
	
	if(session_destroy())
	{

		
		header("Location:home");
	}
?>