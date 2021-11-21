<?php 
	//$idVisiteur = $_POST[''];
	//$mois = $_POST[''];
	//$nbJustificatifs = $_POST[''];
	//$montatValide = $_POST[''];
	//$dateModif = $_POST[''];
	//$idEtat = $_POST[''];

	$mdp = $_POST['motdepasse'];
	$user = $_POST['login'];

	// Utilisateur test que l'on souhaite
	$mdptest = "jux7g";
	$usertest = "lvillachane";

	if ($user == $usertest AND $mdp == $mdptest) {
		header('Location: http://www.votresite.com/pageprotegee.php');
  		exit();
	}
	else if ($user != $usertest OR $mdp != $mdptest) {
		$resultat = "Utilisateur/mdp introuvable.";
	}
?>
