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
        <?php include 'includes/header.php'; ?>
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Récapitulatif fiche du mois XXX</h1>
                    </div>
                    <div class="row">
                            <div class="card shadow">
                                    <div class="card-body">                                                       
                                      <span class="badge badge-success">Frais Forfait</span><br /><hr />
                                                <p><i class="fas fa-map-marker fa-fw me-2 text-gray-400"></i>
                                                Forfait Etape : <strong><?php echo $ETP ?></strong></p>
                                            
                                                <p><i class="fas fa-car fa-fw me-2 text-gray-400"></i>
                                                Frais Kilométrique : <strong><?php echo $KM ?></strong></p>

                                                <p><i class="fas fa-bed fa-fw me-2 text-gray-400"></i> Nuitée hôtel : <strong><?php echo $NUI ?></strong></p>
                                            
                                                <p><i class="fas fa-map fa-fw me-2 text-gray-400"></i>
                                                Repas Restaurant : <strong><?php echo $REP ?></strong></p>
                                    </div>
                                    <div class="card-body">                                                       
                                      <span class="badge badge-warning">Frais Hors Forfait</span><br /><hr />
                                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Libellé</th>
                                            <th>Date</th>
                                            <th>Montant</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Libellé</th>
                                            <th>Date</th>
                                            <th>Montant</th>
                                        </tr>
                                    </tfoot>
                                    <tbody> 
                                         <?php foreach ($fraisHF as $line) {
                                            echo "<tr>";
                                            echo "<td>".$line->libelle."</td>";
                                            echo "<td>".$line->date."</td>";
                                            echo "<td>".$line->montant."€ </td>";
                                            echo "</tr>";
                                      } ?>
                                    </tbody>
                                </table>
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