<?php
//acces au Modele parent pour l heritage
namespace App\Models;
use CodeIgniter\Model;

class Modele extends Model {

/***************************
  * 
  * FORMULAIRE DE CONNEXION
  *
***************************/
    public function mdpVerif($login) {
        $db = db_connect();	
    	$sql = 'SELECT id, mdp, nom, prenom FROM visiteur WHERE login = ?';
        $resultat = $db->query($sql, [$login]);
    	$resultat = $resultat->getResult();	
        return $resultat;
    }


/***************************
  * 
  * INFORMATIONS VISITEUR
  *
***************************/

    // On récupère toutes les informations sur le visiteur 
    public function userInfos() {
            $db = db_connect();
            $sql = 'SELECT * FROM visiteur WHERE id=?';
            $resultat = $db->query($sql, [$_SESSION['id']]);
            $resultat = $resultat->getResult();
            return $resultat;
        }

/********************************
  * 
  * INSERER DES DONNEES EN BASE
  *
********************************/


        // Permet d'insérer un frais forfait en base
    public function fraisCreate($id,$mois,$type) {
        $db = db_connect();	
        $sql = 'INSERT INTO lignefraisforfait VALUES(?, ?, ?, 0)';
        $resultat = $db->query($sql, [$id,$mois,$type]);
        $resultat = $resultat->getResult();	
        return $resultat;      
    }

        // Instancie une fiche frais en état : Fiche créée, saisie en cours
    public function creationFicheFrais($id,$mois) {
            $db = db_connect(); 
            $sql = 'INSERT INTO fichefrais VALUES(?, ?, 0, 0, now(), "CR")';
            $resultat = $db->query($sql, [$id,$mois]);
            $resultat = $resultat->getResult();
            return $resultat;              
        }

        // Insérer en base des Frais Hors Forfait saisis par un visiteur
    public function addHF($id, $mois, $libelle, $date, $montant) {
            $db = db_connect(); 
            $sql = 'INSERT INTO lignefraishorsforfait VALUES(0, ?, ?, ?, ?, ?)';
            $resultat = $db->query($sql, [$id,$mois,$libelle,$date,$montant]);
            $resultat = $resultat->getResult();
            return $resultat;
        }


    public function initialiseFicheFrais() {
        $db = db_connect();    
        $sql = 'INSERT INTO fichefrais VALUES(?, ?, 0, 0, now(), "CR")';
        $resultat = $db->query($sql, [$_SESSION['id'], date('F')]);         
        
        // On créé et initialise 4 Lignes Frais Forfait correspondant au mois
        $sql = 'INSERT INTO lignefraisforfait VALUES(?, ?, "ETP", 0)';
        $resultat = $db->query($sql, [$_SESSION['id'], date('F')]);         
   
        $sql = 'INSERT INTO lignefraisforfait VALUES(?, ?, "KM", 0)';
        $resultat = $db->query($sql, [$_SESSION['id'], date('F')]);     
  
        $sql = 'INSERT INTO lignefraisforfait VALUES(?, ?, "NUI", 0)';
        $resultat = $db->query($sql, [$_SESSION['id'], date('F')]);     
   
        $sql = 'INSERT INTO lignefraisforfait VALUES(?, ?, "REP", 0)';
        $resultat = $db->query($sql, [$_SESSION['id'], date('F')]);     
    }


/**************************************
  * 
  * METTRE A JOUR DES DONNEES EN BASE
  *
**************************************/

        // Update de frais forfait du visiteur 
    public function fraisforfait($qte,$idVis, $mois, $idForf) {
            $db = db_connect(); 
            $sql = 'UPDATE lignefraisforfait SET quantite =? WHERE idVisiteur =? AND mois =? AND idFraisForfait =?';
            $resultat = $db->query($sql, [$qte,$idVis, $mois, $idForf]);
            $resultat = $resultat->getResult();
            return $resultat;
        }

        // Actualiser l'état d'une fiche frais d'un visiteur
    public function updateFicheFrais($id,$mois) {
            $db = db_connect(); 
            $sql = 'UPDATE fichefrais SET idEtat  = "CR" WHERE idVisiteur =? AND mois =?';
            $resultat = $db->query($sql, [$id,$mois]);
            $resultat = $resultat->getResult();
            return $resultat;  
            }  


/**************************
  * 
  * SELECTION DES DONNEES
  *
***************************/      


        // Sélectionne les frais forfait d'un visiteur en fonction du mois
    public function ligneFraisForfait($id,$mois) {
            $db = db_connect();	
            $sql = 'SELECT * FROM LigneFraisForfait WHERE idVisiteur =? AND mois =?';
            $resultat = $db->query($sql, [$id,$mois]);
            $resultat = $resultat->getResult();	
            return $resultat;          
        }

        // Cherche une fiche frais d'un visiteur en fonction du mois
    public function chercheFicheVisiteur($id,$mois) {
            $db = db_connect();	
            $sql = 'SELECT * FROM fichefrais WHERE idVisiteur =? AND mois =? ';
            $resultat = $db->query($sql, [$id,$mois]);
            $resultat = $resultat->getResult();	
            return $resultat;          
        }



/**
 * 
 * Frais Forfait
 * Affichage des données insérées
 * 
**/
    // Utilisée dans le formulaire
    public function recupFF($typeFrais) {
        $db = db_connect();    
        $sql = 'SELECT * FROM lignefraisforfait WHERE idVisiteur=? AND mois=? AND idFraisForfait=?';
        $resultat = $db->query($sql, [$_SESSION['id'], date('F'), $typeFrais]);
        $resultat = $resultat->getResult();
        return $resultat;
    }
    // Même fonction que la précédente mais pour le recap de chaque mois
    public function recupFFMois($date, $typeFrais) {
        $db = db_connect();    
        $sql = 'SELECT * FROM lignefraisforfait WHERE idVisiteur=? AND mois=? AND idFraisForfait=?';
        $resultat = $db->query($sql, [$_SESSION['id'], $date, $typeFrais]);
        $resultat = $resultat->getResult();
        return $resultat;
    }

    public function afficherFHF($date) {
        $db = db_connect();    
        $sql = 'SELECT * FROM lignefraishorsforfait WHERE idVisiteur=? AND mois=?';
        $resultat = $db->query($sql, [$_SESSION['id'], $date]);
        $resultat = $resultat->getResult();
        return $resultat;

    }


    // Récupérer les fiches mensuelles
    public function fichesTab() {
        $db = db_connect();
        $sql = 'SELECT * FROM fichefrais INNER JOIN etat ON fichefrais.idEtat = etat.id WHERE idVisiteur = ? ORDER BY mois DESC';
        $resultat = $db->query($sql, [$_SESSION['id']]);
        $resultat = $resultat->getResult();
        return $resultat;
    }



        // Compter tous les frais d'un visiteur      
    public function calculFrais($idVisiteur,$mois) {
            $db = db_connect();	
            $sql = 'SELECT COUNT(id) as totalFrais FROM lignefraishorsforfait WHERE idVisiteur =? AND mois =?';
            $resultat = $db->query($sql, [$idVisiteur,$mois]);
            $resultat = $resultat->getResult();	
            return $resultat;  
        }

        // Calcul 
    public function stmt($idVisiteur,$mois) {
            $db = db_connect();	
            $sql = 'SELECT SUM(montant) as total FROM lignefraishorsforfait WHERE idVisiteur =? AND mois =?';
            $resultat = $db->query($sql, [$idVisiteur,$mois]);
            $resultat = $resultat->getResult();	
            return $resultat;  
        }

        // Calcul des frais mensuels
    public function calculFraisSansMois($idVisiteur) {
            $db = db_connect();	
            $sql = 'SELECT COUNT(id) as totalFrais FROM lignefraishorsforfait WHERE idVisiteur = ?';
            $resultat = $db->query($sql, [$idVisiteur]);
            $resultat = $resultat->getResult();	
            return $resultat;  
        }

        // Fonction de test pour chercher un visiteur
    public function chercheVisiteurTest($nom) {
            $db = db_connect();	
            $sql = 'SELECT nom FROM visiteur WHERE nom =?';
            $resultat = $db->query($sql, [$nom]);
            $resultat = $resultat->getResult();	
            return $resultat;
        }

/***************************
  * 
  * AFFICHAGE DU TABLEAU DE BORD
  *
***************************/

        // Afficher les frais mensuels
    public function FraisHFMensuel($mois){
            $db = db_connect();	
            $sql = 'SELECT * FROM lignefraishorsforfait WHERE mois =? ORDER BY date DESC';
            $resultat = $db->query($sql, [$mois]);
            $resultat = $resultat->getResult();
            return $resultat;
        }

        // Afficher les frais annuels
    public function FraisAnnuel($idVisiteur){
            $db = db_connect(); 
            $sql = 'SELECT COUNT(id) as totalFrais FROM lignefraishorsforfait WHERE idVisiteur = ?';
            $resultat = $db->query($sql, [$idVisiteur]);
            $resultat = $resultat->getResult();
            $sumFrais = $resultat[0]->totalFrais;
            return $sumFrais;
        }

    public function clcFrais($id, $mois_actuel) {
        $db = db_connect();
        $sql = 'SELECT COUNT(id) as totalFrais FROM lignefraishorsforfait WHERE idVisiteur =? AND mois =?';
        $resFrais = $db->query($sql, [$id, $mois_actuel]);
        $resFrais = $resFrais->getResult();
        return $resFrais;
    }
}
?>