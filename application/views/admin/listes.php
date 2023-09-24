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
    <style>
        .swal2-container {
            z-index: 30000;
        }

        .list-hover {
            cursor: pointer;
        }

        #list-view {
            list-style-type: none;
            padding: 0;
            margin: 0;
            width: 100%;
        }

        #list-view li {
            border: 1px solid #ddd;
            margin-top: -1px;
            /* Prevent double borders */
            background-color: #f6f6f6;
            padding: 12px;
            text-decoration: none;
            font-size: 18px;
            color: black;
            display: block;
            position: relative;

        }

        #list-view li:hover {
            background-color: #eee;
            cursor: pointer;
        }

        .close {
            cursor: pointer;
            position: absolute;
            top: 50%;
            right: 0%;
            padding: 12px 16px;
            transform: translate(0%, -50%);
        }

        .close:hover {
            background: #bbb;
        }
    </style>
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

                    <li class="menu-item active">
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
                        <div class="bs-toast toast toast-placement-ex m-2 fade bg-success top-0 end-0" role="alert" aria-live="assertive" aria-atomic="true" data-delay="200">
                            <div class="toast-header">
                                <i class="bx bx-bell me-2"></i>
                                <div class="me-auto fw-semibold">Enregistrement</div>
                                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                            <div class="toast-body">Enregistrement avec succès</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 mb-4 order-0">
                                <div class="card" style="min-height: 200px ;">
                                    <h5 class="card-header">Questions / Réponses</h5>
                                    <div class="row px-3">
                                        <div class="col-md-2">
                                            <label>Catégorie</label>
                                            <?php echo form_open("Listes/rechercher", array('id' => 'form-rechercher')); ?>
                                            <select class="form-select" name="categorie" id="categorie">
                                                <option value="">Choisir catégorie</option>
                                                <?php for ($categ = 0; $categ < count($categorie); $categ++) : ?>
                                                    <option value="<?php echo $categorie[$categ]->categorie_id ?>"><?php echo $categorie[$categ]->categorie_nom ?></option>
                                                <?php endfor; ?>

                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label>Section</label>
                                            <select class="form-select" name="section" id="section">
                                                <option value="">Choisir section</option>
                                                <!-- <?php for ($sect = 0; $sect < count($section); $sect++) : ?>
                                                    <option value="<?php echo $section[$sect]->section_id ?>"><?php echo $section[$sect]->section_nom ?> - <?php echo $section[$sect]->categorie_nom ?></option>
                                                <?php endfor; ?> -->

                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label>Fiche</label>
                                            <select class="form-select" name="fiche" id="fiches">
                                                <option value="">Choisir fiche</option>

                                                <!-- <?php for ($f = 0; $f < count($fiches); $f++) : ?>
                                                    <option value="<?php echo $fiches[$f]->fiches_contenu ?>"><?php echo $fiches[$f]->fiches_contenu ?></option>
                                                <?php endfor; ?> -->
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Rechercher question</label>
                                            <input type="text" placeholder="Question" class="form-control" id="question-recherche">
                                        </div>
                                        <div class="col-md-3">
                                            <br>
                                            <a href="#" class="btn btn-info" id="btn-rechercher">Rechercher</a>

                                            </form>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row p-3">
                                        <div class="col-md-3">
                                            Nombre de questions: <span id="nbreQst">0</span>
                                        </div>
                                        <div class="col-md-3">

                                        </div>
                                        <div class="col-md-3">

                                        </div>

                                        <div class="col-md-3">
                                            Nouvel question: <span id=""><a href="#" class="btn btn-primary" id="btn-add" data-bs-toggle="modal" data-bs-target="#fullscreenModal">Ajouter</a></span>
                                        </div>

                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-12">
                                            <div class="table-responsive text-wrap">
                                                <table class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th style="width:100px">Question texte</th>
                                                            <th>Question image</th>
                                                            <th>Section</th>
                                                            <th>Catégorie</th>
                                                            <th>Titre fiche</th>
                                                            <th style="width:350px">Réponse/Réponse image/remarque</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="table-border-bottom-0" id="table-list">

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>


                <div id="modalModif">

                </div>
                <div id="modalShow">

                </div>



                <!-- Modal -->
                <div class="modal fade" id="fullscreenModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-fullscreen" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalFullTitle">Ajout Questions/Réponses</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <form id='form-addQuestion' enctype='multipart/form-data' action='<?php echo base_url(); ?>Listes/enregistrer' method='post'>
                                    <input type="hidden" name="idquestion" id="idquestion" class="reset-selected">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label class="form-label">Catégorie</label>
                                                <?php echo form_open("Listes/rechercher", array('id' => 'form-rechercher')); ?>
                                                <select class="form-select" name="categorie" id="categorie-modal">
                                                    <option value="">Choisir catégorie</option>
                                                    <?php for ($categ = 0; $categ < count($categorie); $categ++) : ?>
                                                        <option value="<?php echo $categorie[$categ]->categorie_id ?>"><?php echo $categorie[$categ]->categorie_nom ?></option>
                                                    <?php endfor; ?>

                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label">Section</label>
                                                <select class="form-select" name="idsection" id="section-modal">
                                                    <option value="">Choisir section</option>


                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label">Fiche</label>
                                                <select class="form-select" name="titre" id="fiches-modal">
                                                    <option value="">Choisir fiche</option>

                                                    <!-- <?php for ($f = 0; $f < count($fiches); $f++) : ?>
                                                        <option value="<?php echo $fiches[$f]->fiches_contenu ?>"><?php echo $fiches[$f]->fiches_contenu ?></option>
                                                    <?php endfor; ?> -->
                                                </select>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6 changeTo12 mb-3">
                                                <label for="classe" class="form-label">Question</label>
                                                <input autocomplete="off" type="text" required id="question-modal" class="form-control reset-selected" placeholder="Inserer question" name="question" value="" />
                                            </div>
                                            <div class="col-md-6 toHide mb-3">
                                                <label for="classe" class="form-label">Image</label>
                                                <div class="row">
                                                    <div class="col-md-6 ">
                                                        <input type='file' id="imageQuestion" name='imageQuestion' class='form-control reset-selected' onchange="previewFile('imageQuestion','previewImgqst');" />

                                                    </div>
                                                    <div class="col-md-6 ">
                                                        <img id="previewImgqst" class="image-reset" src="<?php echo base_url() ?>public/vide.png" style="height: 200px; width:200px; object-fit:cover ;" alt="Placeholder">
                                                        <input type="hidden" id="question-modal-anchor" name="question-modal-anchor" class="image-reset-input">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-4 changeTo6 mb-3">
                                                <label for="classe" class="form-label">Réponse 1</label>
                                                <input autocomplete="off" type="text" id="reponse1" class="form-control reponse reset-selected" placeholder="Inserer réponse" name="reponse1" value="" />
                                            </div>
                                            <div class="col-md-4 toHide mb-3">
                                                <label for="classe" class="form-label">Image</label>


                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <input type='file' id="reponse1-image" name='reponse1-image' class='form-control reset-selected' onchange="previewFile('reponse1-image','previewImg1');" />
                                                    </div>
                                                    <div class="col-md-6">
                                                        <img id="previewImg1" src="<?php echo base_url() ?>public/vide.png" style="height: 200px; width:200px; object-fit:cover ;" alt="Placeholder" class="image-show image-reset">
                                                        <input type="hidden" name="image1" class="images image-reset-input">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 changeTo6 mb-3">
                                                <label for="classe" class="form-label">Remarque (Réponse juste)</label>
                                                <select name='reponse1-remarque' class='form-select remarque reset-select'>
                                                    <option value='non'>Non</option>
                                                    <option value='oui'>Oui</option>
                                                </select>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-4 changeTo6 mb-3">
                                                <label for="classe" class="form-label">Réponse 2</label>
                                                <input autocomplete="off" type="text" id="reponse2" class="form-control reponse reset-selected" placeholder="Inserer réponse" name="reponse2" value="" />
                                            </div>
                                            <div class="col-md-4 toHide mb-3">
                                                <label for="classe" class="form-label">Image</label>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <input type='file' id="reponse2-image" name='reponse2-image' class='form-control reset-selected' onchange="previewFile('reponse2-image','previewImg2');" />
                                                    </div>
                                                    <div class="col-md-6">
                                                        <img id="previewImg2" src="<?php echo base_url() ?>public/vide.png" style="height: 200px; width:200px; object-fit:cover ;" alt="Placeholder" class="image-show image-reset">
                                                        <input type="hidden" name="image2" class="images image-reset-input">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 changeTo6 mb-3">
                                                <label for="classe" class="form-label">Remarque (Réponse juste)</label>
                                                <select name='reponse2-remarque' class='form-select remarque reset-select'>
                                                    <option value='non'>Non</option>
                                                    <option value='oui'>Oui</option>
                                                </select>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-4 changeTo6 mb-3">
                                                <label for="classe" class="form-label">Réponse 3</label>
                                                <input autocomplete="off" type="text" id="reponse3" class="form-control reponse reset-selected" placeholder="Inserer réponse" name="reponse3" value="" />
                                            </div>
                                            <div class="col-md-4 toHide mb-3">
                                                <label for="classe" class="form-label">Image</label>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <input type='file' id="reponse3-image" name='reponse3-image' class='form-control reset-selected' onchange="previewFile('reponse3-image','previewImg3');" />
                                                    </div>
                                                    <div class="col-md-6">
                                                        <img id="previewImg3" src="<?php echo base_url() ?>public/vide.png" style="height: 200px; width:200px; object-fit:cover ;" alt="Placeholder" class="image-show image-reset">
                                                        <input type="hidden" name="image3" class="images image-reset-input">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-4 changeTo6 mb-3">
                                                <label for="classe" class="form-label">Remarque (Réponse juste)</label>
                                                <select name='reponse3-remarque' class='form-select remarque reset-select'>
                                                    <option value='non'>Non</option>
                                                    <option value='oui'>Oui</option>
                                                </select>
                                            </div>
                                        </div>
                                        <hr class="toHide">
                                        <div class="row toHide">
                                            <div class="col-md-4 mb-3">
                                                <label for="classe" class="form-label">Reponse 4</label>
                                                <input autocomplete="off" type="text" id="reponse4" class="form-control reponse reset-selected" placeholder="Inserer réponse" name="reponse4" value="" />
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="classe" class="form-label">Image</label>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <input type='file' id="reponse4-image" name='reponse4-image' class='form-control reset-selected' onchange="previewFile('reponse4-image','previewImg4');" />
                                                    </div>
                                                    <div class="col-md-6">
                                                        <img id="previewImg4" src="<?php echo base_url() ?>public/vide.png" style="height: 200px; width:200px; object-fit:cover ;" alt="Placeholder" class="image-show image-reset">
                                                        <input type="hidden" name="image4" class="images image-reset-input">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="classe" class="form-label">Remarque (Réponse juste)</label>
                                                <select name='reponse4-remarque' class='form-select remarque reset-select'>
                                                    <option value='non'>Non</option>
                                                    <option value='oui'>Oui</option>
                                                </select>
                                            </div>
                                        </div>
                                        <hr class="toHide">
                                        <div class="row toHide">
                                            <div class="col-md-4 mb-3">
                                                <label for="classe" class="form-label">Réponse 5</label>
                                                <input autocomplete="off" type="text" id="reponse5" class="form-control reponse" placeholder="Inserer réponse" name="reponse5" value="T - Toutes les réponses sont correctes" />
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="classe" class="form-label">Image</label>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <input type='file' id="reponse5-image" name='reponse5-image' class='form-control reset-selected' onchange="previewFile('reponse5-image','previewImg5');" />
                                                    </div>
                                                    <div class="col-md-6">
                                                        <img id="previewImg5" src="<?php echo base_url() ?>public/vide.png" style="height: 200px; width:200px; object-fit:cover ;" alt="Placeholder" class="image-show image-reset">
                                                        <input type="hidden" name="image5" class="images image-reset-input">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="classe" class="form-label">Remarque (Réponse juste)</label>
                                                <select name='reponse5-remarque' class='form-select remarque reset-select'>
                                                    <option value='non'>Non</option>
                                                    <option value='oui'>Oui</option>
                                                </select>
                                            </div>
                                        </div>
                                        <hr class="toHide">
                                        <div class="row toHide">
                                            <div class="col-md-4 mb-3">
                                                <label for="classe" class="form-label">Réponse 6</label>
                                                <input type="text" id="reponse6" class="form-control reponse" placeholder="Inserer réponse" name="reponse6" value="A - Aucune des réponses n’est correcte" />
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="classe" class="form-label">Image</label>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <input autocomplete="off" type='file' id="reponse6-image" name='reponse6-image' class='form-control reset-selected' onchange="previewFile('reponse6-image','previewImg6');" />
                                                    </div>
                                                    <div class="col-md-6">
                                                        <img id="previewImg6" src="<?php echo base_url() ?>public/vide.png" style="height: 200px; width:200px; object-fit:cover ;" alt="Placeholder" class="image-show image-reset">
                                                        <input type="hidden" name="image6" class="images image-reset-input">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="classe" class="form-label">Remarque (Réponse juste)</label>
                                                <select name='reponse6-remarque' class='form-select remarque reset-select'>
                                                    <option value='non'>Non</option>
                                                    <option value='oui'>Oui</option>
                                                </select>
                                            </div>
                                        </div>
                                        <hr class="toHide">
                                        <div class="row toHide">
                                            <div class="col-md-4 mb-3">
                                                <label for="classe" class="form-label">Réponse 7</label>
                                                <input autocomplete="off" type="text" id="reponse7" class="form-control reponse" placeholder="Inserer réponse" name="reponse7" value="O - Omission" />
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="classe" class="form-label">Image</label>
                                                <!-- <input type='file' id="reponse7-image" name='reponse7-image' class='form-control' onchange="previewFile(this,'previewImgqst');" /> -->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <input type='file' id="reponse7-image" name='reponse7-image' class='form-control reset-selected' onchange="previewFile('reponse7-image','previewImg7');" />
                                                    </div>
                                                    <div class="col-md-6">
                                                        <img id="previewImg7" src="<?php echo base_url() ?>public/vide.png" style="height: 200px; width:200px; object-fit:cover ;" alt="Placeholder" class="image-show image-reset">
                                                        <input type="hidden" name="image7" class="images image-reset-input">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="classe" class="form-label">Remarque (Réponse juste)</label>
                                                <select name='reponse7-remarque' class='form-select remarque reset-select'>
                                                    <option value='non'>Non</option>
                                                    <option value='oui'>Oui</option>
                                                </select>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                            Fermer
                                        </button>
                                        <button type="button" class="btn btn-primary" id="register-qr">Enregistrer</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Core JS -->
                <!-- build:js assets/vendor/js/core.js -->
                <script src="<?= base_url(); ?>public/assets/vendor/libs/jquery/jquery.js"></script>
                <script src="<?= base_url(); ?>public/assets/vendor/libs/popper/popper.js"></script>
                <script src="<?= base_url(); ?>public/assets/vendor/js/bootstrap.js"></script>
                <script src="<?= base_url(); ?>public/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
                <script src="<?= base_url() ?>public/assets/js/sweetalert2.min.js"></script>
                <script src="<?= base_url(); ?>public/assets/vendor/js/menu.js"></script>
                <!-- endbuild -->

                <!-- Vendors JS -->
                <script src="<?= base_url(); ?>public/assets/vendor/libs/apex-charts/apexcharts.js"></script>

                <!-- Main JS -->
                <script src="<?= base_url(); ?>public/assets/js/main.js"></script>

                <!-- Page JS -->
                <script src="<?= base_url(); ?>public/assets/js/dashboards-analytics.js"></script>

                <script>
                    function previewFile(input, anchor) {
                        var file = $("#" + input).get(0).files[0];

                        if (file) {
                            var reader = new FileReader();

                            reader.onload = function() {
                                $("#" + anchor).attr("src", reader.result);
                            }

                            reader.readAsDataURL(file);
                        }
                    }

                    function resetForm() {
                        $(".reset-selected").val("");
                        $(".reset-select").val('non');
                        $(".image-reset-input").val('');
                        var img = $(".image-reset");
                        for (let i = 0; i < img.length; i++) {
                            img[i]['src'] = '<?php echo base_url() ?>public/vide.png';
                        }
                    }
                    $(document).ready(function() {

                        $("#nbreQst").text('0');
                        $(document).on('change', '#categorie', function() {
                            $.ajax({
                                    url: '<?php echo base_url(); ?>Listes/getSectionByCategorie',
                                    type: 'post',
                                    data: {
                                        'categorie': $("#categorie").val(),
                                    },
                                    dataType: 'json',
                                })
                                .done(function(data) {
                                    console.log(data);
                                    $("#section").html(data.section);
                                    $("#fiches").html(data.fiches);
                                })
                        });
                        $(document).on('change', '#categorie-modal', function() {

                            if ($(this).val() == 24) {
                                $(".toHide").addClass("d-none");
                                $(".changeTo6").attr('class', 'col-md-6 changeTo6 mb-3');
                                $(".changeTo12").attr('class', 'col-md-12 changeTo12 mb-3')
                            } else {
                                $(".toHide").removeClass("d-none");
                                $(".changeTo6").attr('class', 'col-md-4 changeTo6 mb-3');
                                $(".changeTo12").attr('class', 'col-md-6 changeTo12')
                            }

                            $.ajax({
                                    url: '<?php echo base_url(); ?>Listes/getSectionByCategorie',
                                    type: 'post',
                                    data: {
                                        'categorie': $("#categorie-modal").val(),
                                    },
                                    dataType: 'json',
                                })
                                .done(function(data) {
                                    $("#section-modal").html(data.section);
                                    $("#fiches-modal").html(data.fiches);
                                })
                        });

                        $(document).on('click', '#btn-rechercher', function() {
                            $.ajax({
                                    url: '<?php echo base_url(); ?>Listes/rechercher',
                                    type: 'post',
                                    data: {
                                        'section': $("#section").val(),
                                        'categorie': $("#categorie").val(),
                                        'fiche': $("#fiches").val(),
                                        'question': $("#question-recherche").val(),
                                    },
                                    dataType: 'json',
                                })
                                .done(function(data) {
                                    // $("#fiches").html(data) ;

                                    $("#table-list").html(data.templ);
                                    $("#nbreQst").text(data.nbre);
                                    // $("#table-list").html(data.templ);
                                })
                        });



                        function showDatas() {
                            $.ajax({
                                    url: '<?php echo base_url(); ?>Listes/rechercher',
                                    type: 'post',
                                    data: {
                                        'section': $("#section").val(),
                                        'categorie': $("#categorie").val(),
                                        'fiche': $("#fiches").val(),
                                    },
                                    dataType: 'json',
                                })
                                .done(function(data) {
                                    // $("#fiches").html(data) ;

                                    $("#table-list").html(data.templ);
                                    $("#nbreQst").text(data.nbre);
                                })
                        }

                        $(document).on('click', '#register-qr', function(ev) {
                            ev.preventDefault();
                            var form = $("#form-addQuestion")[0];
                            var formData = new FormData(form);
                            $.ajax({
                                url: '<?php echo base_url() ?>Listes/enregistrer',
                                type: "POST",
                                data: formData,
                                success: function(msg) {

                                    if (msg.trim() == 'success') {

                                        resetForm();
                                        $('#fullscreenModal').scrollTop(0, 0)
                                        $("#question-modal").focus();
                                        // Swal.fire(
                                        //     'Enregistrement',
                                        //     'Enregistrement effectué !',
                                        //     'success'
                                        // ).then((result) => {
                                        //     if(result.isConfirmed) {

                                        //         var anim = setTimeout(function() {

                                        //             clearTimeout(anim) ;


                                        //         },200)

                                        //     }


                                        // })
                                    } else if (msg.trim() == 'updated') {
                                        $("#fullscreenModal").modal('hide');
                                        Swal.fire(
                                            'Modification',
                                            'Modification effectuée !',
                                            'success'
                                        )
                                        showDatas();

                                    }

                                },
                                cache: false,
                                contentType: false,
                                processData: false
                            });
                        })

                        $(document).on('click', '.remove', function() {
                            var id = $(this).data('id');

                            Swal.fire({
                                title: 'Êtes-vous sur ? ?',
                                text: "Cette action sera irréversible !",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Oui, effacer !'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    $.ajax({
                                            url: '<?php echo base_url(); ?>Listes/del',
                                            type: 'post',
                                            data: {
                                                'id': id,
                                            }
                                        })
                                        .done(function(d) {
                                            if (d.trim() == 'deleted') {
                                                Swal.fire(
                                                    'Supprimée !',
                                                    'Suppression avec succès.',
                                                    'success'
                                                )
                                                showDatas();
                                            }
                                        })

                                }
                            })

                        })

                        $(document).on('click', '.update', function() {
                            var id = $(this).data('id');
                            $("#form-addQuestion")[0].reset();
                            $.ajax({
                                    url: '<?php echo base_url(); ?>Listes/getForm',
                                    type: 'post',
                                    data: {
                                        'id': id,
                                        'section': $("#section").val(),
                                        'categorie': $("#categorie").val(),
                                        'fiche': $("#fiches").val(),
                                    },
                                    dataType: 'json',
                                })
                                .done(function(d) {
                                    $("#fullscreenModal").modal('show');
                                    var affichage = '';
                                    for (let i = 0; i < (d[0].section_content).length; i++) {
                                        affichage += '<option value="' + (d[0].section_content)[i].section_id + '">' + (d[0].section_content)[i].section_nom + '</option>';
                                    }
                                    $("#section-modal").html(affichage);
                                    $("#section-modal").val(d[0].section_id);
                                    $("#categorie-modal").val(d[0].categorie_id);
                                    if ($("#categorie-modal").val() == 24) {
                                        $(".toHide").addClass("d-none");
                                        $(".changeTo6").attr('class', 'col-md-6 changeTo6 mb-3');
                                        $(".changeTo12").attr('class', 'col-md-12 changeTo12 mb-3')
                                    } else {
                                        $(".toHide").removeClass("d-none");
                                        $(".changeTo6").attr('class', 'col-md-4 changeTo6 mb-3');
                                        $(".changeTo12").attr('class', 'col-md-6 changeTo12')
                                    }

                                    $.ajax({
                                            url: '<?php echo base_url(); ?>Listes/getOnlyFichesByCategorie',
                                            type: 'post',
                                            data: {
                                                'categorie': d[0].categorie_id,
                                            },
                                            async: false,
                                        })
                                        .done(function(c) {
                                            $("#fiches-modal").html(c);
                                        })
                                    $("#fiches-modal").val(d[0].titre);
                                    $("#question-modal").val(d[0].question_text);
                                    $("#question-modal-anchor").val(d[0].question_image);
                                    if (d[0].question_image == '') {
                                        $("#previewImgqst").attr('src', '<?php echo base_url() ?>public/vide.png')
                                        // img[j]['src'] = '<?php echo base_url() ?>public/vide.png';
                                    } else {
                                        $("#previewImgqst").attr('src', '<?php echo base_url() ?>public/' + d[0].question_image)
                                        // img[j]['src'] = '<?php echo base_url() ?>public/' + d[0].question_image
                                    }
                                    $("#idquestion").val(d[0].question_id);
                                    var reponses = d[0].reponse;
                                    var anchor_reponses = $(".reponse");
                                    var rmq = $(".remarque");
                                    var img = $(".image-show");
                                    var imageAnchor = $(".images");
                                    if (reponses.length > 0) {
                                        for (var j = 0; j < reponses.length; j++) {
                                            anchor_reponses[j]['value'] = reponses[j].reponse_contenu;
                                            rmq[j]['value'] = reponses[j].reponse_remarque;
                                            imageAnchor[j]['value'] = reponses[j].reponse_image;
                                            if (reponses[j].reponse_image == '') {
                                                img[j]['src'] = '<?php echo base_url() ?>public/vide.png';
                                            } else {
                                                img[j]['src'] = '<?php echo base_url() ?>public/' + reponses[j].reponse_image
                                            }



                                        }
                                    }

                                })
                        })

                        $(document).on('click', '#btn-add', function() {
                            $("#form-addQuestion")[0].reset();
                            resetForm()
                        })
                    });
                </script>

</body>

</html>