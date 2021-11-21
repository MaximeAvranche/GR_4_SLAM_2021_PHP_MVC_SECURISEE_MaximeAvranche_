<?php 
session_start();
  include 'includes/config.php';
  include 'includes/connexion.php';
  include 'includes/db.php';
  $page = 2;
  
if(!isset($_SESSION['id']))
{
  header('Location: https://clients.prestarvor.com/');
  exit();
}
if ($first_connexion == 1) {
   header('Location: profil.php');
   exit();
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

    <title>Mes factures - <?= $nomsite;?></title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Menu du site -->
       <?php include 'includes/header.php'; ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Mes factures</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">LISTE DE TOUTES VOS FACTURES</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Rérérence</th>
                                            <th>&Eacute;mise le</th>
                                            <th>Montant</th>
                                            <th>&Eacute;tat</th>
                                            <th>Détails</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Rérérence</th>
                                            <th>&Eacute;mise le</th>
                                            <th>Montant</th>
                                            <th>&Eacute;tat</th>
                                            <th>Détails</th>
                                        </tr>
                                    </tfoot>
                                   
                                    <tbody> 
                                        <?php
                                          $SelectFacture = $db->prepare('SELECT * FROM factures WHERE utilisateur_id = ? ORDER BY id DESC');
                                          $SelectFacture->execute(array($_SESSION['id']));
                                          while($DetailFct = $SelectFacture->fetch())
                                          {
                                            $state = $DetailFct['etat'];
                                    ?>
                                    <?php 
                                          if ($state == 0) {
                                                $etat_msg = '<span class="badge badge-danger">Impayée</span>';
                                           }
                                          else {
                                                $etat_msg = '<span class="badge badge-success">Payée</span>';
                                          } 
                                    ?>
                                        <tr>
                                            <td><span class="badge badge-primary">FCT-21<?= $type; ?><?php echo intval(trim($DetailFct['id'])); ?></span></td>
                                            <td><span class="badge badge-light"><?php echo date('d/m/Y', intval(trim($DetailFct['date']))); ?></span></td>
                                            <td><?= $DetailFct['total']; ?>€</td>
                                            <td><?= $etat_msg; ?></td>
                                            <td> <a href="details-facture.php?id=<?= $DetailFct['id'] ?>" target="_blank"><i class="fa fa-eye"></i> Voir</a></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include 'includes/footer.php'; ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

<?php include 'includes/valide-deconnexion.php'; ?>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>