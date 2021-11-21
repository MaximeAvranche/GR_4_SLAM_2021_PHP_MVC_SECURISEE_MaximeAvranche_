<?php

//  Récupération de l'utilisateur et du mot de passe
function connect($login, $password) {
	$db = new PDO('mysql:host=localhost;dbname=gsbv2;charset=utf8', 'root', '');
	$login = htmlspecialchars($login);
	$password = htmlspecialchars($password);

$req = $db->prepare('SELECT id, mdp FROM visiteur WHERE login = :login');
$req->execute(array(
    'login' => $login));
$resultat = $req->fetch();

$message = "erreur, ce message ne devrait pas s'afficher";
if (!$resultat)
{
    $message = 'Mauvais identifiant ou mot de passe !';
}
else
{
    if ($_POST['password'] == $resultat['mdp']) {
        $_SESSION['id'] = $resultat['id'];
        $_SESSION['login'] = $login;
        header('ajouterFraisForfait');
    }
    else {
        $message = "Impossible";
    }
}
}
?>  