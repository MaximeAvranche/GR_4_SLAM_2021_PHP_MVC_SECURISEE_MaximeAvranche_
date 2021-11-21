<?php
//acces au controller parent pour l heritage
namespace App\Controllers;
use CodeIgniter\Controller;
//=========================================================================================
//définition d'une classe Controleur (meme nom que votre fichier Controleur.php) 
//héritée de Controller et permettant d'utiliser les raccoucis et fonctions de CodeIgniter
//  Attention vos Fichiers et Classes Controleur et Modele doit commencer par une Majuscule 
//  et suivre par des minuscules
//=========================================================================================

session_start();

class Controleur extends Controller {

//=====================================================================
//Fonction index correspondant au Controleur frontal, il faut retourner a l'index pour appeler la plupart des fonction PHP
//=====================================================================
public function index(){
	///////////////////////////////////////////
	// Boutons de redirection par méthode GET//
	///////////////////////////////////////////
	if(isset($_GET['action'])) {
		// Redirection vers "mes fiches"
		if ($_GET['action'] == "afficherFF") {
			$this->goAFF();
		}
		// Redirection vers "frais forfait"
		if ($_GET['action'] == "fraisF") {
			$this->goFF();
		}
		// Redirection vers "frais hors forfait"
		if ($_GET['action'] == "fraisHF") {
			$this->goHF();
		}

		if ($_GET['action'] == "deco") {
			$this->formconnect();
		}

		if ($_GET['action'] == "consulter" AND $_GET['mois'] != null) {
		$this->goDetails();
		}

	}

	////////////////////////////////////
	// Partie formulaire de connexion //
	///////////////////////////////////

	// Le visiteur valide le formulaire de connexion
	else if (isset($_POST['formconnexion'])) {
		// On appelle la fonction qui permet de vérifier si les informations sont valides
		$this->connect($_POST['login'], $_POST['password']);
		sleep(1); // Permet de ralentir l'attaque brute force
	}

	/////////////////////////////
	// Modifications / Ajouts //
	////////////////////////////

	else if (isset($_POST['ajouter'])) {
		$this->addHF();
	}

	else if (isset($_POST['modifier'])) {
		$this->majFF();
	}


	// Par défaut, l'utilisateur est redirigé vers le formulaire de connexion
	// Si rien n'est saisi, il est redirigé vers la vue connexion
	else {
			$this->formconnect();
		}
}


	// Vue Mes frais (voir tous les frais saisis depuis le début de l'année)
	public function goAFF() {
		$modele = new \App\Models\Modele();
		$data['affichageTab'] = $modele->fichesTab();
		echo view('vue_afficherFF', $data);

	}

	// Vue Frais Forfait (ajouter des frais forfait)
	public function goFF() {
		$modele = new \App\Models\Modele();
		$mois_actuel = date('F');
    	$modele->FraisHFMensuel($mois_actuel);
    	$data['majETP'] = $modele->recupFF("ETP")[0]->quantite;
		$data['majKM'] = $modele->recupFF("KM")[0]->quantite;
		$data['majNUI'] = $modele->recupFF("NUI")[0]->quantite;
		$data['majREP'] = $modele->recupFF("REP")[0]->quantite;
   
		echo view('vue_addFrais', $data);
	}

	// Vue Frais Hors Forfait (ajouter des frais hors forfait)
	public function goHF() {
		$modele = new \App\Models\Modele();
		$mois_actuel = date('F');
    	$modele->FraisHFMensuel($mois_actuel);
    	$_SESSION['f5'] = true;
    echo view('vue_addHF');

	}

	public function goDetails() {
		$modele = new \App\Models\Modele();
		$data['ETP'] = $modele->recupFFMois($_GET['mois'], "ETP")[0]->quantite;
		$data['KM'] = $modele->recupFFMois($_GET['mois'], "KM")[0]->quantite;
		$data['NUI'] = $modele->recupFFMois($_GET['mois'], "NUI")[0]->quantite;
		$data['REP'] = $modele->recupFFMois($_GET['mois'], "REP")[0]->quantite;

		$data['fraisHF'] = $modele->afficherFHF($_GET['mois']);
		echo view('vue_Details', $data);
	}

	// Ajouter des frais Hors Forfait
	public function addHF() {
		$modele = new \App\Models\Modele();
		// Ne pas remettre en base les données saisies
		if ($_SESSION['f5']) {
			$modele->addHF($_SESSION['id'], date('F'), htmlspecialchars($_POST['libelle']), htmlspecialchars($_POST['date']), htmlspecialchars($_POST['montant']));
		}

		$resultat = $modele->clcFrais($_SESSION['id'], date('F'));
		$data['fraisMois'] = $resultat[0]->totalFrais;
		$data['fraisAnnuel'] = $modele->FraisAnnuel($_SESSION['id']);
		// Supprime tous les POST pour éviter une insertion lors d'un refresh
		$_SESSION['f5'] = false;
	  // Redirection vers le tableau de bord quand données saisies
      echo view('vue_Accueil', $data);
	}


	// Mettre à jour les frais forfait
	public function majFF() {
		$modele = new \App\Models\Modele();
			//On vérifie que tous les jetons sont là
			if(isset($_SESSION['token']) AND isset($_POST['token']) AND !empty($_SESSION['token']) AND !empty($_POST['token'])) {
			// On vérifie que les deux correspondent
				if($_SESSION['token'] == $_POST['token']) {
					$modele->fraisforfait($_POST['qte'], $_SESSION['id'], date('F'), htmlspecialchars($_POST['type']));
					$data['majETP'] = $modele->recupFF("ETP")[0]->quantite;
					$data['majKM'] = $modele->recupFF("KM")[0]->quantite;
					$data['majNUI'] = $modele->recupFF("NUI")[0]->quantite;
					$data['majREP'] = $modele->recupFF("REP")[0]->quantite;
				}
			}
				else {
				// Les token ne correspondent pas// On ne supprime pas
					echo"Erreur de vérification"; 
				}
		

		echo view('vue_addFrais', $data);
	}


	// Vue affichant le formulaire de connexion
	public function formconnect() {
		echo view('vue_connexion.php');
	}


// Formulaire de connexion 
public function connect($login,$mdp){
	//On enregistre notre token
	$token = bin2hex(random_bytes(32));
	$_SESSION['token'] = $token;
	$modele = new \App\Models\Modele();
	$resultat = $modele->mdpVerif($login);
	$message = ''; 
		if ($mdp == $resultat[0]->mdp) {
			$_SESSION['id'] = $resultat[0]->id;
			$_SESSION['login'] = $login;
			$_SESSION['prenom'] = $resultat[0]->prenom;
			$_SESSION['nom'] = $resultat[0]->nom;

			$resultat = $modele->chercheFicheVisiteur($_SESSION['id'], date('F'));

			if (!isset($resultat[0])) {
				$modele->initialiseFicheFrais();
			}

		// On affiche le nombre de frais 
		$resultat = $modele->clcFrais($_SESSION['id'], date('F'));
		$data['fraisMois'] = $resultat[0]->totalFrais;

		$data['fraisAnnuel'] = $modele->FraisAnnuel($_SESSION['id']);

			// Redirection vers le tableau de bord
      echo view('vue_Accueil', $data);
			//$this->affichageFraisHF();
		}

		else {
			$message = "Mauvais identifiant ou mot de passe !";
			echo($message);
			echo view('vue_connexion');
		}
}



// Affiche une erreur
public function erreur($msgErreur) {
	echo view('vueErreur.php', $data);
  }
}
?>