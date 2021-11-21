<?php 
	function deconnexion() {
		session_distroy();
		header('Location: ./acces/index.php');
	}
?>