<?php
session_start();
require_once('includes/db.php');

$date = time();

if(isset($_SESSION['id']))
{
	$req_userinfos = $db->prepare('SELECT * FROM visiteur WHERE id=:id');
	$req_userinfos->execute(array('id' => $_SESSION['id'] ));
	$usersinfos = $req_userinfos->fetch();

   	$identifiant = $usersinfos['login'];
    $nom = $usersinfos['nom'];
    $prenom = $usersinfos['prenom'];
} 
?>  