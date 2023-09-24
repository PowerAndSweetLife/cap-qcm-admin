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
                    <li class="menu-item ">
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
                    <li class="menu-item active">
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
                            <div class="col-md-12 col-lg-12 col-xl-12 order-0 mb-4">
                                <div class="card" style='height: 200px;overflow-y:auto;'>
                                    <div class="card-body">
                                        <div class="row">
                                            <?= form_open('version/update') ?>
                                            <div class="mb-3">
                                                <label class="form-label" for="basic-default-fullname">Activation version 2</label>
                                                <select class="form-select" id="basic-default-fullname" name="version">
                                                    <?php if ($version[0]->etat_version == 'on') : ?>
                                                        <option value="on" selected>Désactivée</option>
                                                        <option value="off">Activée</option>
                                                    <?php else : ?>
                                                        <option value="on">Désactivée</option>
                                                        <option value="off" selected>Activée</option>
                                                    <?php endif; ?>

                                                </select>

                                            </div>
                                            <button type="submit" class="btn btn-primary">Modifier</button>
                                            </form>
                                        </div>

                                    </div>
                                </div>
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