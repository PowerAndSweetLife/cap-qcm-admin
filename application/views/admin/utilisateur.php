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
                    <li class="menu-item active">
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
                            <div class="col-lg-4 mb-3 order-0">

                            </div>
                            <?php echo form_open("Utilisateur/filter"); ?>
                            <div class="col-lg-4 mb-3 order-0">
                                <h4> Filtre </h4>
                                <select name="select_type" class="form-select">
                                    <option value="attache_admin">Attaché d'administration</option>
                                    <option value="fipu">Finances publiques</option>
                                </select>
                            </div>
                            <div class="col-lg-4 mb-3 order-0">
                                <input type="submit" class="btn btn-outline-success" value="Filtrer" />
                                </form>
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-lg-12 mb-4 order-0">
                                <div class="row mt-4">
                                    <div class="col-lg-12 mb-4 order-0">
                                        <div class="card">
                                            <div class="table-responsive text-nowrap">
                                                <table class="table">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th>E-mail</th>
                                                            <th>Type</th>
                                                            <th>Temps (total)</th>
                                                            <th>Nombre connexion</th>
                                                            <th>Nombre session</th>
                                                            <th>Dernière connexion</th>
                                                            <th>Date de création</th>
                                                            <th>Etat</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="table-border-bottom-0" id="tbody">
                                                        <?php for ($i = 0; $i < count($utilisateur); $i++) : ?>
                                                            <tr>
                                                                <?php
                                                                $heures = $utilisateur[$i]->totalHeureOK;
                                                                $secondes = floatval($heures) * 3600;


                                                                $heures_jour = 0;
                                                                if ($utilisateur[$i]->total_jour != 0) {
                                                                    $heures_jour = $utilisateur[$i]->totalHeureOK / $utilisateur[$i]->total_jour;
                                                                }

                                                                $secondes_par_jour = floatval($heures_jour) * 3600;

                                                                // Calculer les heures, minutes et secondes
                                                                $heure_formattee = floor($secondes / 3600);
                                                                $reste_secondes = $secondes % 3600;
                                                                $minute_formattee = floor($reste_secondes / 60);
                                                                $seconde_formattee = $reste_secondes % 60;

                                                                $heure_formattee_par_jour = floor($secondes_par_jour / 3600);
                                                                $reste_secondes_par_jour = $secondes_par_jour % 3600;
                                                                $minute_formattee_par_jour = floor($reste_secondes_par_jour / 60);
                                                                $seconde_formattee_par_jour = $reste_secondes_par_jour % 60;

                                                                ?>
                                                                <td><?php echo $utilisateur[$i]->email; ?></td>
                                                                <td><?php echo $utilisateur[$i]->user_type; ?></td>
                                                                <td>
                                                                    <span><?php echo $heure_formattee . " h " . $minute_formattee . " m " . $seconde_formattee . " s"; ?></span>
                                                                </td>
                                                                <td><span><?php echo $utilisateur[$i]->utilisation_total; ?></span></td>
                                                                <td><span><?php echo $utilisateur[$i]->total_session; ?></span></td>
                                                                <td><span><?php if ($utilisateur[$i]->last_use != "") {
                                                                                $date = date_create($utilisateur[$i]->last_use);
                                                                                echo date_format($date, "d/m/Y H:i:s");
                                                                            } else {
                                                                                echo "-";
                                                                            } ?></span></td>
                                                                <td><span><?php if ($utilisateur[$i]->created_at != "") {
                                                                                // $date = date_create($utilisateur[$i]->last_use);
                                                                                echo $utilisateur[$i]->created_at;
                                                                            } else {
                                                                                echo "-";
                                                                            } ?></span></td>
                                                                <td>
                                                                    <?php
                                                                    if ($utilisateur[$i]->limit_session == -1) {
                                                                        echo "Bloqué";
                                                                    } else if ($utilisateur[$i]->limit_session == 0) {
                                                                        echo "Actif";
                                                                    } else if ($utilisateur[$i]->limit_session > 0 && ($utilisateur[$i]->total_session > $utilisateur[$i]->limit_session)) {
                                                                        echo "Quota atteint";
                                                                    } else {
                                                                        echo "Actif";
                                                                    }

                                                                    ?>

                                                                </td>
                                                                <td>


                                                                    <?php echo form_open("Utilisateur/supprimer", ["class" => "d-none", "id" => "ID-" . $utilisateur[$i]->id]); ?>
                                                                    <input type="hidden" value="<?php echo $utilisateur[$i]->id ?>" name="id">
                                                                    <input type="submit" class="d-none">
                                                                    </form>

                                                                    <!-- <a href="#" class="badge bg-label-primary me-1" data-id="<?php echo $utilisateur[$i]->id ?>" data-bs-toggle="modal" data-bs-target="#sendMessage<?php echo $utilisateur[$i]->id ?>">envoyer message</a> -->
                                                                    <a href="#" class="badge bg-label-info me-1 " data-id="<?php echo $utilisateur[$i]->id ?>" data-bs-toggle="modal" data-bs-target="#numberOfSession<?php echo $utilisateur[$i]->id ?>">configurer</a>
                                                                    <a href="#" class="badge bg-label-success me-1" data-id="<?php echo $utilisateur[$i]->id ?>" data-bs-toggle="modal" data-bs-target="#consulter<?php echo $utilisateur[$i]->id ?>">consulter</a>
                                                                    <a href="<?php echo base_url(); ?>Utilisateur/block/<?php echo $utilisateur[$i]->id; ?>" class="badge bg-label-secondary me-1">bloquer</a>
                                                                    <a href="#" class="badge bg-label-danger me-1 delete" data-id="<?php echo $utilisateur[$i]->id ?>">supprimer</a>


                                                                    <div class="modal fade" id="sendMessage<?php echo $utilisateur[$i]->id ?>" tabindex="-1" aria-hidden="true">
                                                                        <div class="modal-dialog modal-md" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="modalFullTitle">Envoyer message</h5>
                                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                </div>

                                                                                <div class="modal-body">
                                                                                    <form>
                                                                                        <input type="hidden" value="<?php echo $utilisateur[$i]->id ?>">
                                                                                        <textarea class="form-control" rows="10" placeholder="Contenu du message"></textarea>

                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                                                                        Fermer
                                                                                    </button>
                                                                                    <button type="button" class="btn btn-primary">Envoyer</button>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="modal fade" id="numberOfSession<?php echo $utilisateur[$i]->id ?>" tabindex="-1" aria-hidden="true">
                                                                        <div class="modal-dialog modal-md" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="modalFullTitle">Nombre limite de session</h5>
                                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                </div>
                                                                                <?php echo form_open("Utilisateur/ajoutLimit"); ?>
                                                                                <div class="modal-body">
                                                                                    <!-- <form> -->

                                                                                    <label for="session_number">Nombre limite de session: </label>
                                                                                    <input type="number" class="form-control" min="0" value="<?php echo $utilisateur[$i]->limit_session; ?>" name="session_limit">
                                                                                    <input type="hidden" name="id" value="<?php echo $utilisateur[$i]->id ?>">

                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                                                                        Fermer
                                                                                    </button>
                                                                                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="modal fade" id="consulter<?php echo $utilisateur[$i]->id ?>" tabindex="-1" aria-hidden="true">
                                                                        <div class="modal-dialog modal-fullscreen" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="modalFullTitle">Statistiques utilisateur: <?php echo $utilisateur[$i]->email; ?></h5>
                                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                </div>

                                                                                <div class="modal-body">
                                                                                    <div class="row">
                                                                                        <div class="col-md-8">
                                                                                            <p style="font-weight: bold;">Temps total utilisation application</p>
                                                                                        </div>
                                                                                        <div class="col-md-4">
                                                                                            <span><?php echo $heure_formattee . " heure(s) " . $minute_formattee . " minute(s) " . $seconde_formattee . " seconde(s)"; ?></span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row">
                                                                                        <div class="col-md-8">
                                                                                            <p style="font-weight: bold;">Temps par jour utilisation application</p>
                                                                                        </div>
                                                                                        <div class="col-md-4">
                                                                                            <span><span><?php echo $heure_formattee_par_jour . " heure(s) " . $minute_formattee_par_jour . " minute(s) " . $seconde_formattee_par_jour . " seconde(s)"; ?></span></span>
                                                                                        </div>
                                                                                    </div>

                                                                                    <hr>

                                                                                    <div class="row">
                                                                                        <div class="col-md-8">
                                                                                            <p style="font-weight: bold;">Nombre total connexion application</p>
                                                                                        </div>
                                                                                        <div class="col-md-4">
                                                                                            <span><?php echo $utilisateur[$i]->utilisation_total; ?></span>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="row">
                                                                                        <div class="col-md-8">
                                                                                            <p style="font-weight: bold;">Nombre connexion application par jour</p>
                                                                                        </div>
                                                                                        <div class="col-md-4">
                                                                                            <span><?php
                                                                                                    if ($utilisateur[$i]->total_jour != 0) {
                                                                                                        echo floor($utilisateur[$i]->utilisation_total / $utilisateur[$i]->total_jour);
                                                                                                    } else {
                                                                                                        echo "0";
                                                                                                    }

                                                                                                    ?></span>
                                                                                        </div>
                                                                                    </div>

                                                                                    <hr>

                                                                                    <div class="row">
                                                                                        <div class="col-md-8">
                                                                                            <p style="font-weight: bold;">Nombre total session joué</p>
                                                                                        </div>
                                                                                        <div class="col-md-4">
                                                                                            <span><?php echo $utilisateur[$i]->total_session; ?></span>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="row">
                                                                                        <div class="col-md-8">
                                                                                            <p style="font-weight: bold;">Nombre session joué par jour</p>
                                                                                        </div>
                                                                                        <div class="col-md-4">
                                                                                            <span><?php
                                                                                                    if ($utilisateur[$i]->session_groupement != 0) {
                                                                                                        echo floor($utilisateur[$i]->total_session / $utilisateur[$i]->session_groupement);
                                                                                                    } else {
                                                                                                        echo '0';
                                                                                                    }

                                                                                                    ?></span>
                                                                                        </div>
                                                                                    </div>

                                                                                    <hr>

                                                                                    <div class="row">
                                                                                        <div class="col-md-8">
                                                                                            <p style="font-weight: bold;">Nombre question ajouté dans favori</p>
                                                                                        </div>
                                                                                        <div class="col-md-4">
                                                                                            <span><?php echo $utilisateur[$i]->totalFavoris ?></span>
                                                                                        </div>
                                                                                    </div>


                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                                                                        Fermer
                                                                                    </button>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                                </td>
                                                            </tr>
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

                    <script>
                        $(document).ready(function() {
                            $(document.body).on('click', '.delete', function() {
                                var elem = $(this);
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
                                        var id = elem.data('id');
                                        $("#ID-" + id).submit();

                                    }
                                })
                            })
                        });

                        <?php

                        if (isset($success)) :
                        ?>
                            Swal.fire(
                                'Succès',
                                'Enregistrement effectué !',
                                'success'
                            )
                        <?php endif; ?>
                    </script>

</html>