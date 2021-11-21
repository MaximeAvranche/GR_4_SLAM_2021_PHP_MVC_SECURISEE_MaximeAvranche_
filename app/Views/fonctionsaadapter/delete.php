<?php
include('includes/db.php');
    if(isset($_GET['id'])){
      $del = $db->prepare('DELETE FROM lignefraishorsforfait WHERE id = ?');
      $del->execute(array($_GET['id']));
      header('Location: mes-fiches-frais.php');
    }
    else
    {
      header('Location: mes-fiches-frais.php');
    }

?>