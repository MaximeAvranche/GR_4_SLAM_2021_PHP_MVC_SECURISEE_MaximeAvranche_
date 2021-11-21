<?php

//  Récupération de l'utilisateur et du mot de passe
function connect($login, $password) {

$req = mdpVerif($login);
$resultat = $req->fetch();


if (!$resultat)
{
    $message = 'Mauvais identifiant ou mot de passe !';
}
else
{
    if ($_POST['password'] == $resultat['mdp']) {
        $_SESSION['id'] = $resultat['id'];
        $_SESSION['login'] = $login;
        header('Location: http://localhost/gsb/');
    }
    else {
        $message = "Impossible";
    }
}
}
?>  