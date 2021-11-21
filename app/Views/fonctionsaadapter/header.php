        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-text mx-3">GSB</div>
            </a>
            <!-- Intitulé de la section -->
            <hr class="sidebar-divider my-0">

            <!-- Menu - Tableau de Bord -->
            <li <?php if ($page == 1) { $active = " active"; } else { $active = NULL; } ?> class="nav-item<?= $active; ?>">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Tableau de Bord</span></a>
            </li>

            <!-- Séparation -->
            <hr class="sidebar-divider">

            <!-- Intitulé de la section -->
            <div class="sidebar-heading">
                Mon projet
            </div>

            <!-- Menu - Page Devis -->
            <li class="nav-item">
                <a class="nav-link" href="devis.php">
                    <i class="fas fa-folder-open fa-chart-area"></i>
                    <span>Mes devis</span></a>
            </li>

            <!-- Menu - Page Factures -->
            <li <?php if ($page == 2) { $active = " active"; } else { $active = NULL; } ?> class="nav-item<?= $active; ?>">
                <a class="nav-link" href="mes-fiches-frais.php">
                    <i class="fas fa-clone fa-chart-area"></i>
                    <span>Mes fiches frais</span></a>
            </li>
            <!-- Menu - Donner avis -->
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-star"></i>
                    <span>Donner mon avis</span></a>
            </li>


            <!-- Séparation -->
            <hr class="sidebar-divider">

            <!-- Intitulé de la section -->
            <div class="sidebar-heading">
                Support technique
            </div>

            <!-- Menu - Support -->
            <li <?php if ($page == 5) { $active = " active"; } else { $active = NULL; } ?> class="nav-item<?= $active; ?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-life-ring"></i>
                    <span>Support</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Tickets</h6>
                        <a class="collapse-item" href="mes-tickets.php">Voir mes tickets</a>
                        <a class="collapse-item" href="creer-ticket.php">Créer un ticket</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Autres</h6>
                        <a class="collapse-item" href="https://www.facebook.com/Prestarvorcom-103134568738673" target="_blank">Messenger</a>
                        <a class="collapse-item" href="tel:+330629252078">06.29.25.20.78</a>
                        <a class="collapse-item" href="https://www.prestarvor.com/contact.php" target="_blank">Nous contacter</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Message annexe -->
            <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
                <p class="text-center mb-2"><strong>Le support technique</strong> est disponible 24h/7j</p>
                <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">J'ai besoin d'aide</a>
            </div>

        </ul>

        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <div align="right">
                        <p>Date du jour : <? date("d/m/Y"); ?></p>
                    </div>
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $prenom . ' ' .$nom; ?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="profil.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Mon profil
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Déconnexion
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>