<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Cap-QCM | Dashboard</title>

    <meta name="description" content="" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="<?= base_url() ?>public/assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>public/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?= base_url() ?>public/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?= base_url() ?>public/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>public/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="<?= base_url() ?>public/assets/vendor/libs/apex-charts/apex-charts.css" />
    <link rel="stylesheet" href="<?= base_url() ?>public/assets/css/sweetalert2.min.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="<?= base_url() ?>public/assets/vendor/js/helpers.js"></script>

    <script src="<?= base_url() ?>public/assets/js/config.js"></script>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <h3>CAP-QCM</h3>
                </div>
                <div class="menu-inner-shadow"></div>


                <ul class="menu-inner py-1">
                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Overview</span>
                    </li>
                    <li class="menu-item active">
                        <a href="<?= base_url() ?>overview" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-line-chart"></i>
                            <div data-i18n="Analytics">Overview</div>
                        </a>
                    </li>
                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Paramètres</span>
                    </li>
                    <li class="menu-item ">
                        <a href="<?= base_url() ?>categorie" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-server"></i>
                            <div data-i18n="Analytics">Catégorie</div>
                        </a>
                    </li>
                    <li class="menu-item ">
                        <a href="<?= base_url() ?>mode" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-menu-alt-right"></i>
                            <div data-i18n="Layouts">Mode</div>
                        </a>
                    </li>
                    <li class="menu-item ">
                        <a href="<?= base_url() ?>fiches" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-detail"></i>
                            <div data-i18n="Layouts">Titre fiches</div>
                        </a>
                    </li>
                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Questionnaires</span>
                    </li>

                    <li class="menu-item ">
                        <a href="<?= base_url() ?>listes-questions" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-list-ul"></i>
                            <div data-i18n="Account Settings">Questions / Reponses</div>
                        </a>
                    </li>
                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">GESTION DES UTILISATEURS</span>
                    </li>
                    <li class="menu-item ">
                        <a href="<?= base_url() ?>utilisateur" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-user-circle"></i>
                            <div data-i18n="Account Settings">Listes des utilisateurs</div>
                        </a>
                    </li>
                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">PARAMETRES</span>
                    </li>
                    <li class="menu-item ">
                        <a href="<?= base_url() ?>parametres" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-cog"></i>
                            <div data-i18n="Account Settings">Gestion des accès</div>
                        </a>
                    </li>
                    <li class="menu-item ">
                        <a href="<?= base_url() ?>version" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-cog"></i>
                            <div data-i18n="Account Settings">Version 2</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="<?= base_url() ?>deconnecter" class="menu-link ">
                            <i class="menu-icon tf-icons bx bx-power-off text-danger"></i>
                            <div data-i18n="Account Settings">Se déconnecter</div>
                        </a>
                    </li>

                </ul>
            </aside>


            <!-- Layout container -->
            <div class="layout-page">
                <div class="content-wrapper">
                    <div class="container-fluid flex-grow-1 container-p-y">
                        <div class="row">
                            <!-- Order Statistics -->
                            <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
                                <div class="card h-100">
                                    <div class="card-header d-flex align-items-center justify-content-center pb-0">
                                        <div class="card-title mb-0">
                                            <h5 class="m-0 me-2">Total inscrit</h5>
                                            <!-- <small class="text-muted">1000 utilisateurs</small> -->
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex justify-content-center align-items-center mb-3">
                                            <div class="d-flex flex-column align-items-center ">
                                                <h2 class="mb-2 text-center"><?php echo count($attache) + count($agent_fipu) ?></h2>
                                                <span>Utilisateur(s)</span>
                                            </div>
                                            <!-- <div id="orderStatisticsChart"></div> -->
                                        </div>
                                        <ul class="p-0 m-0">
                                            <li class="d-flex mb-4 pb-1">
                                                <div class="avatar flex-shrink-0 me-3">
                                                    <span class="avatar-initial rounded bg-label-primary"><i class="bx bx-mobile-alt"></i></span>
                                                </div>
                                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                    <div class="me-2">
                                                        <h6 class="mb-0">Attaché</h6>
                                                        <!-- <small class="text-muted">Mobile, Earbuds, TV</small> -->
                                                    </div>
                                                    <div class="user-progress">
                                                        <small class="fw-semibold"><?php echo count($attache); ?></small>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="d-flex mb-4 pb-1">
                                                <div class="avatar flex-shrink-0 me-3">
                                                    <span class="avatar-initial rounded bg-label-success"><i class="bx bx-closet"></i></span>
                                                </div>
                                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                    <div class="me-2">
                                                        <h6 class="mb-0">Finances publiques</h6>
                                                        <!-- <small class="text-muted">T-shirt, Jeans, Shoes</small> -->
                                                    </div>
                                                    <div class="user-progress">
                                                        <small class="fw-semibold"><?php echo count($agent_fipu); ?></small>
                                                    </div>
                                                </div>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!--/ Order Statistics -->

                            <!-- Expense Overview -->
                            <div class="col-md-6 col-lg-4 order-1 mb-4">

                            </div>
                            <!--/ Expense Overview -->

                            <!-- Transactions -->
                            <div class="col-md-6 col-lg-4 order-2 mb-4">

                            </div>
                            <!--/ Transactions -->
                        </div>
                    </div>

                    <div id="modal">

                    </div>


                    <!-- Core JS -->
                    <!-- build:js assets/vendor/js/core.js -->
                    <script src="<?= base_url(); ?>public/assets/vendor/libs/jquery/jquery.js"></script>
                    <script src="<?= base_url(); ?>public/assets/vendor/libs/popper/popper.js"></script>
                    <script src="<?= base_url(); ?>public/assets/vendor/js/bootstrap.js"></script>
                    <script src="<?= base_url() ?>public/assets/js/sweetalert2.min.js"></script>
                    <script src="<?= base_url(); ?>public/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

                    <script src="<?= base_url(); ?>public/assets/vendor/js/menu.js"></script>
                    <!-- endbuild -->

                    <!-- Vendors JS -->
                    <script src="<?= base_url(); ?>public/assets/vendor/libs/apex-charts/apexcharts.js"></script>

                    <!-- Main JS -->
                    <script src="<?= base_url(); ?>public/assets/js/main.js"></script>

                    <!-- Page JS -->
                    <script src="<?= base_url(); ?>public/assets/js/dashboards-analytics.js"></script>


</body>

</html>