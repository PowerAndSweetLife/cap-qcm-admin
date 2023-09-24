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
    <script src="<?= base_url(); ?>public/assets/vendor/libs/jquery/jquery.js"></script>
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
            <!-- Menu -->

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
                    <li class="menu-item active">
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
                            <div class="col-lg-12 mb-4 order-0">
                                <div class="card" style='height: 300px;overflow-y:auto;'>
                                    <div class="card-body">
                                        <div class="row">
                                            <?= form_open('fiches/enregistrer') ?>
                                            <div class="mb-3">
                                                <label class="form-label" for="basic-default-fullname">Catégorie</label>
                                                <select name="categorie" class="form-select">
                                                    <?php for ($c = 0; $c < count($categorie); $c++) : ?>
                                                        <option value="<?php echo $categorie[$c]->categorie_id; ?>"><?php echo $categorie[$c]->categorie_nom; ?></option>
                                                    <?php endfor; ?>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="basic-default-fullname">Fiche</label>
                                                <input type="text" class="form-control" id="basic-default-fullname" placeholder="Numéro de fiche" name="fiches_contenu" />
                                                <?php echo form_error('fiches_contenu'); ?>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-lg-12 mb-4 order-0">
                                        <div class="card">
                                            <div class="table-responsive text-nowrap">
                                                <table class="table">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th>Catégorie</th>
                                                            <th>Fiche</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="table-border-bottom-0" id="tableFiche">
                                                        <?php for ($i = 0; $i < count($fiches); $i++) : ?>
                                                            <tr>
                                                                <td><?= $fiches[$i]->categorie_nom ?></td>
                                                                <td><?= $fiches[$i]->fiches_contenu ?></td>
                                                                <td>
                                                                    <a class="badge bg-label-info me-1" href="" data-bs-toggle="modal" data-bs-target="#basicModal<?= $fiches[$i]->fiches_id ?>">Modifier</a>
                                                                    <a class="badge bg-label-danger me-1 delete" data-id="<?= $fiches[$i]->fiches_id; ?>" href="#">Supprimer</a>
                                                                    <?php echo form_open('Fiches/supprimer', array('class' => 'd-none')); ?>
                                                                    <input type="hidden" name="id" value="<?= $fiches[$i]->fiches_id; ?>">
                                                                    <input type="submit" id="btnDelete<?= $fiches[$i]->fiches_id; ?>">
                                                                    </form>
                                                                </td>
                                                            </tr>


                                                            <div class="modal fade" id="basicModal<?= $fiches[$i]->fiches_id ?>" tabindex="-1" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel1">Modification</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <?= form_open('Fiches/modifier/' . $fiches[$i]->fiches_id) ?>
                                                                        <div class="modal-body">
                                                                            <div class="row">
                                                                                <div class="col mb-3">
                                                                                    <label for="classe" class="form-label">Catégorie</label>
                                                                                    <select id="categorie_id<?php echo $fiches[$i]->fiches_id; ?>" data-categorie_id="<?php echo $fiches[$i]->categorie_id; ?>" name="categorie" class="form-select">
                                                                                        <?php for ($c = 0; $c < count($categorie); $c++) : ?>
                                                                                            <option value="<?php echo $categorie[$c]->categorie_id; ?>"><?php echo $categorie[$c]->categorie_nom; ?></option>
                                                                                        <?php endfor; ?>
                                                                                    </select>
                                                                                    <script>
                                                                                        $("#categorie_id<?php echo $fiches[$i]->fiches_id; ?>").val($("#categorie_id<?php echo $fiches[$i]->fiches_id; ?>").data("categorie_id"));
                                                                                    </script>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col mb-3">
                                                                                    <label for="classe" class="form-label">Fiche</label>
                                                                                    <input type="text" id="classe" class="form-control" placeholder="Numéro de fiche" name="fiches_contenu" value="<?= $fiches[$i]->fiches_contenu; ?>" />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                                                                Fermer
                                                                            </button>
                                                                            <button type="submit" class="btn btn-primary">Modifier</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                            </div>
                                        </div>


                                    <?php endfor; ?>
                                    </tbody>
                                    </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>


            <!-- Core JS -->
            <!-- build:js assets/vendor/js/core.js -->

            <script src="<?= base_url(); ?>public/assets/vendor/libs/popper/popper.js"></script>
            <script src="<?= base_url(); ?>public/assets/vendor/js/bootstrap.js"></script>
            <script src="<?= base_url(); ?>public/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

            <script src="<?= base_url(); ?>public/assets/vendor/js/menu.js"></script>
            <!-- endbuild -->

            <!-- Vendors JS -->
            <script src="<?= base_url(); ?>public/assets/vendor/libs/apex-charts/apexcharts.js"></script>
            <script src="<?= base_url() ?>public/assets/js/sweetalert2.min.js"></script>
            <!-- Main JS -->
            <script src="<?= base_url(); ?>public/assets/js/main.js"></script>

            <!-- Page JS -->
            <script src="<?= base_url(); ?>public/assets/js/dashboards-analytics.js"></script>

            <script>
                $(document).ready(function() {
                    $(document).on('click', '.delete', function(e) {
                        e.preventDefault();
                        var id = $(this).data('id');
                        Swal.fire({
                            title: 'Vous etes sur de faire la suppression ?',
                            text: "Cette action sera irreversible !",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Proceder',
                            cancelButtonText: 'Annuler',
                        }).then((result) => {
                            if (result.isConfirmed) {

                                $("#btnDelete" + id).click();
                            }
                        })
                    })
                })

                <?php if (isset($deleted)) : ?>
                    Swal.fire(
                        'Suppression',
                        'Suppression effectuee !',
                        'success'
                    )
                <?php endif; ?>

                <?php if (isset($exists)) : ?>
                    Swal.fire(
                        'Attention',
                        'Cette information existe deja dans la base de donnees !',
                        'warning'
                    )
                <?php endif; ?>
            </script>
</body>

</html>