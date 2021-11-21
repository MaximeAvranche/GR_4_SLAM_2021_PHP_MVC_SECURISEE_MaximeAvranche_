<?php
// Démarre une nouvelle session ou reprend une session existante
session_start();
$page = 5;

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
    <title></title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"> 
    <script src="https://cdn.ckeditor.com/4.6.1/full/ckeditor.js"></script>

</head>

<body id="page-top">
    <div id="wrapper">
        <!-- Menu du site -->
       <?php include 'includes/header.php'; ?>
                <div class="container-fluid">
                     <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Que souhaitez-vous faire ?</h1>
                        <a href="index.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-reply fa-sm text-white-50"></i> Retour à l'accueil</a>
                    </div>
                    <section class="bg-light pt-15 pb-10">
                        <div class="container px-5">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 mb-5" align="center">
                                    <a class="card card-link border-bottom-0 border-start-0 border-end-0 border-top-lg border-red h-100 lift" href="mes-fiches-frais.php">
                                        <div class="card-body p-5">
                                            <div class="icon-stack icon-stack-lg bg-red-soft text-red mb-2"></div>
                                            <h4>Consulter les Frais</h4>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-4 col-md-6 mb-5">
                                    <a class="card card-link border-bottom-0 border-start-0 border-end-0 border-top-lg border-red h-100 lift" href="add-frais-hf.php">
                                        <div class="card-body p-5">
                                            <div class="icon-stack icon-stack-lg bg-red-soft text-red mb-2"></div>
                                            <h4>Ajouter Frais HForfait</h4>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-4 col-md-6 mb-5">
                                    <a class="card card-link border-bottom-0 border-start-0 border-end-0 border-top-lg border-red h-100 lift" href="add-frais-forfait.php">
                                        <div class="card-body p-5">
                                            <div class="icon-stack icon-stack-lg bg-red-soft text-red mb-2"></div>
                                            <h4>Ajouter Frais Forfait</h4>
                                        </div>
                                    </a>
                                </div>

                            </div>
                        </div>
                    <hr />
                        <p><em>Les "Frais Forfait" sont calculés en fonction d'un montant fixe unitaire. Voici les montants fixés par l'entreprise GSB :</em></p>
                                <div class="col-lg-10">
                                    <hr class="mb-0" />
                                    <ul class="list-group list-group-flush list-group-careers">
                                        <li class="list-group-item">
                                            <p>Forfait étape</p>
                                            <div align="right">110.00€ TTC</div>
                                        </li>
                                        <li class="list-group-item">
                                            <p>Frais kilométrique</p>
                                            <div align="right">1.00€ TTC</div>
                                        </li>
                                        <li class="list-group-item">
                                            <p>Nuitée hôtel</p>
                                            <div align="right">80.00€ TTC</div>
                                        </li>
                                        <li class="list-group-item">
                                            <p>Repas restaurant</p>
                                            <div align="right">25.00€ TTC</div>
                                        </li>
                                    </ul>
                                </div><br />
                    </section>
                </div>
            </div>

            <!-- Footer -->
            <?php include 'includes/footer.php'; ?>
            <!-- End of Footer -->

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
    <script type="text/javascript">CKEDITOR.replace('sujet');</script>
    <script type="text/javascript">$('#input').on('input',function(e){
     $("#text").html($(this).val());
 });</script>
</body>

</html>