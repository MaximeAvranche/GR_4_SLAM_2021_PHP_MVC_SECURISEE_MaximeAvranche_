<?php /*
session_start();
  $mois_actuel = date('F');
  $page = 1;
  include 'includes/connexion.php';
if(!isset($_SESSION['id']))
{
  header('Location: http://localhost/gsb/acces/');
  exit();
}
else {
  $id = isset($_SESSION['id']);
  $req =  ligneFraisForfait($id,date('F'));
  $result = $req->fetchAll();
  foreach($result as $line){
    if($line['idFraisForfait'] == "ETP"){
      $etape = $line['quantite'];
    }
    elseif ($line['idFraisForfait'] == "KM") {
      $km = $line['quantite'];
    }
    elseif ($line['idFraisForfait'] == "NUI") {
      $nuit = $line['quantite'];
    }
    elseif ($line['idFraisForfait'] == "REP") {
      $repas = $line['quantite'];
    }
  } 
    }
  include 'includes/variables.php';
  $page = 1;  */
?>
 <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Tableau de Bord - GSB</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body id="page-top">
    <div id="wrapper">
        <?php /*include 'header.php';*/ ?>
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Tableau de Bord </h1>
                        <a href="ajouter-frais.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-plus fa-sm text-white-50"></i> Ajouter des frais</a>
                    </div>
                    <div class="row">
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Frais mensuel</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
<?php 
/*
     $calculFrais = calculFrais($idVisiteur,$mois_actuel);
     $rowFrais = $calculFrais->fetch(PDO::FETCH_ASSOC);
     $sumFrais = $rowFrais['totalFrais'];
     $totalFrais = $sumFrais;
     echo $totalFrais; */ ?> 
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-file fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                          <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Montant du mois</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
<?php /*
     $stmt = stmt($id,$mois_actuel);
     $row = $stmt->fetch(PDO::FETCH_ASSOC);
     $sum = $row['total'];
     $total = $sum;

     if(isset($_POST['km'])){
          $ETP = 110 * $etape;
          $KLM = 1 * $km;
          $NUI = 80 * $nuit;
          $REP = 25 * $repas;
          $total += $ETP + $KLM + $NUI + $REP;
     }
     echo $total; */ ?>€</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-credit-card fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Votre adresse IP
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">77.134.119.183</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-eye-slash fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                          <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Frais annuel</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
<?php /*
     $calculFrais = calculFraisSansMois($id);
     $rowFrais = $calculFrais->fetch(PDO::FETCH_ASSOC);
     $sumFrais = $rowFrais['totalFrais'];
     $totalFrais = $sumFrais;
     echo $totalFrais; */ ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                            <div class="card shadow">
                                <a href="#Informations" class="d-block card-header py-3" data-toggle="collapse"
                                    role="button" aria-expanded="true" aria-controls="Informations">
                                    <h6 class="m-0 font-weight-bold text-primary">Informations</h6>
                                </a>
                                <div class="collapse show" id="Informations">
                                    <div class="card-body">                                                       
                                      <span class="badge badge-primary">Information</span><br />
                                      <strong>Espace membre GSB</strong><br />
                                      L'espace membre GSB est le lieu où les utilisateurs pourront faire des ajouts de frais tous les mois. L'interface a été optimisée pour permettre aux visiteurs d'aller directement à l'essentiel.
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
<footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright 2021 - Tous droits réservés</span>
                    </div>
                </div>
            </footer> 

        </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Vous souhaitez vous déconnecter ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Si vous voulez vraiment vous déconnecter, cliquez sur "Je me déconnecte".</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
                    <a class="btn btn-primary" href="deconnexion.php">Je me déconnecte</a>
                </div>
            </div>
        </div>
    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>