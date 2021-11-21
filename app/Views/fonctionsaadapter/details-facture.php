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
        $id = intval(trim($_GET['id']));
        $SelectTickets = $db->prepare('SELECT * FROM factures WHERE id = ? AND utilisateur_id = ?');
        $SelectTickets->execute(array($id, $_SESSION['id']));
        if($SelectTickets->rowCount() == 1)
        {
          $DetailTickets = $SelectTickets->fetch();
          $total = $DetailTickets['total'];
        }
        else
        {
          header('Location: mes-factures.php');
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

    <title>FCT-21<?= $type; ?><?= $DetailTickets['id'] ?> - <?= $nomsite;?></title>

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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">#FCT-21<?= $type; ?><?= $DetailTickets['id'] ?></h1>
                        <a href="javascript:window.open('','_self').close();" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-window-close fa-sm text-white-50"></i> Fermet l'onglet</a>
                    </div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">VOICI LES D&Eacute;TAILS CONERNANT LA FACTURE #FCT-21<?= $type; ?><?= $DetailTickets['id'] ?></h6>
                        </div>
                            <object data="https://clients.prestarvor.com/ADM-PRST/<?=$DetailTickets['fichier'];?>" type="application/pdf" width="100%" height="750">
                            <embed src="https://clients.prestarvor.com/ADM-PRST/<?=$DetailTickets['fichier'];?>" type="application/pdf" width="100%" height="750">
                                <p>Désolé, votre appareil ne prend pas en compte la prévisualisation PDF. Mais ne vous inquiétez pas, vous pouvez toujours télécharger votre facture ici :  <a href="https://clients.prestarvor.com/ADM-PRST/<?=$DetailTickets['fichier'];?>">Télécharger ma facture</a>.</p>
                            </embed>
                        </object>
                        <br />
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