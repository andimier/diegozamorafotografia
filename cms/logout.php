<?php 
	if (isset($_COOKIE[session_name()])) {
		setcookie(session_name(), '', time()-42000, '/');
	}
	
	session_start();
	session_unset();
	session_destroy();
	$_SESSION = array();

	header("Location: login.php");
	exit;
?>