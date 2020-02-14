<?php
	if (!isset($_SESSION)) {
		session_start();
	}

	function logged_in() {
		return isset($_SESSION['user_id']);
	}

	function confirmar_login(){
		if (!logged_in()) {
			header("Location: content.php");
			exit;
		}
	}
?>

