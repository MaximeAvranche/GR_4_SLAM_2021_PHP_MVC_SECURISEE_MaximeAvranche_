        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-text mx-3">GSB</div>
            </a>
            <hr class="sidebar-divider my-0">
            <!-- Menu - Tableau de Bord -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Tableau de Bord</span></a>
            </li>

            <!-- Séparation -->
            <hr class="sidebar-divider">

            <!-- Intitulé de la section -->
            <div class="sidebar-heading">
                Consultation
            </div>

            <li class="nav-item">
                <a class="nav-link" href="index.php?action=afficherFF">
                    <i class="fas fa-clone fa-chart-area"></i>
                    <span>Mes fiches frais</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?action=fraisF">
                    <i class="fas fa-plus fa-chart-area"></i>
                    <span>Ajouter Frais Forfait</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?action=fraisHF">
                    <i class="fas fa-plus fa-chart-area"></i>
                    <span>Ajouter Frais Hors Forfait</span></a>
            </li>
            <hr class="sidebar-divider">
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['prenom']. ' '.$_SESSION['nom']; ?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#.">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Mon profil
                                </a>
                                <div class="dropdown-divider"></div>
                                <form method="GET" action="index.php?action=deco">
                                    <button type="submit" name="btn-deco" class="dropdown-item">Déconnexion</button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </nav>