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
                                            <th>Mois</th>
                                            <th>Montant total</th>
                                            <th>Nbr justificatifs</th>
                                            <th>&Eacute;tat</th>
                                            <th>Détails</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Mois</th>
                                            <th>Montant total</th>
                                            <th>Nbr justificatifs</th>
                                            <th>&Eacute;tat</th>
                                            <th>Détails</th>
                                        </tr>
                                    </tfoot>
                                    <tbody> 
                                        <?php
                                            foreach ($affichageTab as $ligne) {
                                                    echo "<tr>";
                                                    echo "<td>".$ligne->mois."</td>";
                                                    echo "<td>".$ligne->montantValide."</td>";                                            
                                                    echo "<td>".$ligne->nbJustificatifs."</td>";
                                                    echo "<td><span class='badge badge-primary'>".$ligne->libelle."</span></td>";
                                                    echo "<td align='center'><a href='index.php?action=consulter&mois=".$ligne->mois."'><i class='fa fa-eye'></i> Consulter</a></td>";
                                                    echo "</tr>";
                                                }
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