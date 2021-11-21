<?php
include 'includes/db.php';
  if(isset($_SESSION['id']))
{
  $req_userinfos = $db->prepare('SELECT * FROM visiteur WHERE id=:id');
  $req_userinfos->execute(array('id' => $_SESSION['id'] ));
  $usersinfos = $req_userinfos->fetch();

    $nom = $usersinfos['nom'];
    $prenom = $usersinfos['prenom'];
    $id = $usersinfos['id'];
}

?>  