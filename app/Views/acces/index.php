<?php
session_start();
include 'includes/connexion.php';
include 'includes/db.php';
if(isset($_SESSION['login'])) {
    header('Location: http://localhost/gsb/');
}
if (isset($_POST['formconnexion'])) {
    connect($_POST['login'], $_POST['password']);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Connexion GSB</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <link href="//fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/site-style.css" type="text/css" media="all" />
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" media="all">
</head>
    <body>
            <section class="w3l-hotair-form">
                <h1>Espace client</h1>
                <div class="container">
                    <div class="workinghny-form-grid">
                        <div class="main-hotair">
                            <div class="content-wthree">
                                <h2>Connexion</h2>
                                <form action="" method="post">
                                    <input type="text" class="text" name="login" placeholder="Identifiant" required="" autofocus>
                                    <input type="password" class="password" name="password" placeholder="Mot de passe" required="" autofocus>
                                    <button class="btn" name="formconnexion" type="submit">Connexion</button>
                                </form>
                            </div>
                            <div class="w3l_form align-self">
                                <div class="left_grid_info">
                                    <img src="images/fond.png" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="copyright text-center">
                    <p class="copy-footer-29">Copyright - GSB - Maxime Avranche</p>
                </div>
            </section>
    </body>
</html>