<?php
// Démarre une nouvelle session ou reprend une session existante
session_start();
$page = 2;
$mois_actuel = date('F');
// Redirection si l'utilisateur est connecté ou non
include 'includes/connexion.php';

/**
 * UTILISATEUR NON CONNECTE
**/
if(!isset($_SESSION['id']))
{
  header('Location: http://localhost/gsb/acces/');
  exit();
}
/** 
 * UTILISATEUR CONNECTE
 **/
else {
  include 'includes/variables.php';
  include 'includes/functions.php';

  $functions = new ConnexionBase();
}

// Bouton pressé, on joue la fonction d'insertion en base (Hors Forfait)
if(isset($_POST['ajouter']))
  {
    $libelle = $_POST['libelle'];
    $date = $_POST['date'];
    $montant = $_POST['montant'];
    $functions->verifFicheFrais($_SESSION['id'], date("F"));
    $functions->insert_horsf($_SESSION['id'], $date, $libelle, $date, $montant);
}

// Bouton pressé, on joue la fonction d'insertion en base (Ligne Frais)
/**if(isset($_POST['modifier']))
  {
    $etape = $_POST['etape'];
    $km = $_POST['km'];
    $nuit = $_POST['nuit'];
    $repas = $_POST['repas'];
  insert_lignefrais($idV, $etape, $km, $nuit, $repas);
  }**/

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Mes fiches frais - GSB</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body id="page-top">
    <div id="wrapper">
       <?php include 'includes/header.php'; ?>
                <div class="container-fluid">
                    <h1 class="h3 mb-2 text-gray-800">Mes fiches frais</h1>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">LISTE DE TOUS VOS FRAIS HORS FORFAIT</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Rérérence</th>
                                            <th>&Eacute;mise le</th>
                                            <th>Détails</th>
                                            <th>Montant</th>
                                            <th>Supprimer</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Rérérence</th>
                                            <th>&Eacute;mise le</th>
                                            <th>Détails</th>
                                            <th>Montant</th>
                                            <th>Supprimer</th>
                                        </tr>
                                    </tfoot>
                                    <tbody> 
                                        <?php
                  $affichage = $db->prepare('SELECT * FROM lignefraishorsforfait WHERE mois = ? ORDER BY date DESC');
                  $affichage->execute(array($mois_actuel));
                  while ($donnees = $affichage->fetch())
                    { 

                    ?>
                                        <tr>
                                            <td><span class="badge badge-primary">1++</span></td>
                                            <td><?php echo $donnees['date']; ?></td>
                                            <td><?php echo $donnees['libelle']; ?></td>
                                            <td><?php echo $donnees['montant']; ?>€</td>
                                            <td align="center"><a href="delete.php?id=<?php echo $donnees['id']; ?>" class="red"><i class="fas fa-trash"></i></a></td>
                                        </tr>  
                                        <?php
                        }
                        $affichage->closeCursor(); // Termine le traitement de la requête
                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include 'includes/footer.php'; ?>
        </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <?php include 'includes/valide-deconnexion.php'; ?>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="js/demo/datatables-demo.js"></script>
</body>

</html>