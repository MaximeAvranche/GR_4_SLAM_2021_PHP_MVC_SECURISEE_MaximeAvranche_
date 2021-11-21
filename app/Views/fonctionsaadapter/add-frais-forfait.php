<?php 
  $page = 5;
?>
<?php
// Démarre une nouvelle session ou reprend une session existante
session_start();
$page = 2;

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
if(isset($_POST['modifier']))
  {
    $type = $_POST['type'];
    $qte = $_POST['qte'];
    $functions->insert_forfait($_SESSION['id'], date("F"), $type, $qte);
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Frais Hors Forfait - GSB</title>
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
                        <h1 class="h3 mb-0 text-gray-800">Frais Forfait</h1>
                        <a href="mes-fiches-frais.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-eye fa-sm text-white-50"></i> Voir mes fiches</a>
                    </div>
                    <section class="bg-light pt-15 pb-10">
                        <div class="container px-5">
                            <div class="row gx-5">
                                <div class="col-lg-4 col-xl-3 mb-5">
                                    <div class="card">
                                        <div class="list-group list-group-flush small">
                                            <a class="list-group-item list-group-item-action p-3" href="creer-ticket.php">
                                                <i class="fas fa-plus fa-fw me-2 text-gray-400"></i>
                                                Frais Forfait
                                            </a>
                                            <a class="list-group-item list-group-item-action p-3" href="mes-tickets.php">
                                                <i class="fas fa-file-alt fa-fw me-2 text-gray-400"></i>
                                                Mes tickets
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-xl-9">
                                    <div class="d-flex align-items-center justify-content-between flex-column flex-md-row">
                                        <h2 class="mb-0">Nouveau Frais Forfait</h2>
                                        <div class="h5"><span class="badge bg-success-soft text-success fw-normal"><i class="fas fa-spinner fa-pulse"></i> Création en cours</span></div>
                                    </div>
                                    <p id="text"></p>
                                    <hr class="mb-4" />
                                    <div class="card mb-5">
                                        <div class="card-header d-flex justify-content-between">
                                            <div class="me-2 text-dark">
                                                <?php echo $prenom . ' ' .$nom; ?>
                                                <div class="text-xs text-muted"> Le 
                                                  <?php
                                                    setlocale(LC_TIME, 'fr_FR');
                                                    date_default_timezone_set('Europe/Paris');
                                                    echo utf8_encode(strftime('%A %d %B %Y, &agrave; %H:%M'));
                                                  ?>
                                              </div>
                                            </div>
                                            #<?php echo rand(690, 9999);?>
                                        </div>
                                      <form method="POST" action="" autocomplete="off"> 
                                        <div class="card-body">
                                             <div class="form-group">
                                              <label for="exampleFormControlSelect1">Type de frais</label>
                                              <div class="yoo-select">
                                                <select class="form-control" name="type" required>
                                                  <option value="">Choisir un type de frais</option>
                                                  <option value="ETP">Forfait Etape - </option>
                                                  <option value="KM">Frais Kilométrique - </option>
                                                  <option value="NUI">Nuitée Hôtel - </option>
                                                  <option value="REP">Repas Restaurant - </option>
                                                </select>
                                              </div>
                                            </div>
                                             <label for="exampleInputEmail18">Quantité</label>
                                             <input type="number" name="qte" placeholder="Indiquez la quantité" class="form-control" min="0" max="50000" step="1" required>
                                          </div>
                                            <div class="form-group">
                                              <div class="col-sm-6" style="margin-top:10px;">
                                                <button type="submit" name="modifier" class="btn btn-success">Ajouter le frais</button>
                                              </div>
                                          </div>
                                      </form>
                                    </div>
                                </div>
                            </div>
                        </div>
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