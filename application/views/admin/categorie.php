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
                    <li class="menu-item active">
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
                            <div class="col-lg-12 mb-4 order-0">
                                <div class="card" style='height: 600px;overflow-y:auto;'>
                                    <div class="card-body">
                                        <div class="row">
                                            <?= form_open('categorie/register', array("id" => "form-categorie")) ?>
                                            <div class="mb-3">
                                                <label class="form-label" for="categorie">Categorie</label>
                                                <input type="text" class="form-control" id="categorie" placeholder="Inserer categorie" name="categorie_nom" />
                                                <?php echo form_error('categorie_nom'); ?>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="section">Sections</label>
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control" id="section" placeholder="Inserer section" name="categorie_nom" />
                                                    </div>
                                                    <div class="col-md-2">
                                                        <a href="#" class="btn btn-info btn-block" id="btn-addList">Ajouter</a>
                                                    </div>
                                                </div>

                                                <?php echo form_error('categorie_nom'); ?>
                                            </div>
                                            <div style="height: 300px; font-weight:bold; overflow-y:auto" class="mb-3 p-3 border" id="section-list">
                                                <!-- <p> - Francais</p> -->
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
                                                            <th>Categorie</th>
                                                            <th>Sections</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="table-border-bottom-0" id="tbody">

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
                            // ajout des sections
                            $(document).on('click', '#btn-addList', function() {
                                if ($("#section").val() == "") {
                                    alert("remplir ce champ");
                                } else {
                                    var val = $("#section").val();
                                    $("#section").val('');
                                    $("#section").focus();
                                    $("#section-list").append(`
                        <p>
                            <i class="menu-icon text-danger tf-icons bx bx-trash-alt delete-section" style='cursor: pointer;'></i>
                            <span class='text-danger'>|</span>
                            <span class='section-content'>${val}</span>
                        </p>
                        <hr>
                    `);

                                    $(document).on('click', '.delete-section', function() {
                                        $(this).parent().next().remove();
                                        $(this).parent().remove();
                                    })

                                }
                            });

                            // envoie des donnees:
                            $(document).on('submit', '#form-categorie', function(e) {
                                e.preventDefault();

                                if ($("#categorie").val() == "" || ($('.section-content')).length == 0) {
                                    alert('Remplir les champs');
                                } else {
                                    const url = $(this).attr('action');
                                    const type = $(this).attr('method');
                                    var content = $(".section-content");
                                    var contentTab = [];
                                    for (let i = 0; i < content.length; i++) {
                                        contentTab.push(content[i].innerText);
                                    }
                                    // data:
                                    var contentTabJson = JSON.stringify(contentTab);
                                    var categorie = $("#categorie").val();
                                    $.ajax({
                                            url: url,
                                            type: type,
                                            data: {
                                                'categorie': categorie,
                                                'content': contentTabJson,
                                            },
                                            dataType: 'json',
                                        })
                                        .done(function(data) {
                                            if (data.success) {
                                                $("#section-list").empty();
                                                $("#categorie").val('');
                                                Swal.fire(
                                                    'Enregistrement',
                                                    'Enregistrement effectue !',
                                                    'success'
                                                )
                                                getCategorieSection();
                                            }
                                        })
                                }




                            })

                            $(document).on('click', '.delete', function(e) {
                                e.preventDefault();
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
                                        $.ajax({
                                                url: $(this).attr('href'),
                                                type: 'get',
                                                data: {},
                                                dataType: 'json',
                                            })
                                            .done(function(data) {
                                                if (data.success) {
                                                    Swal.fire(
                                                        'Suppression',
                                                        'Suppression effectuee !',
                                                        'success'
                                                    )
                                                    getCategorieSection();
                                                }
                                            })


                                    }
                                })
                            })

                            getCategorieSection();

                            function getCategorieSection() {
                                $.ajax({
                                        url: '<?php echo base_url(); ?>Categorie/getCateg',
                                        type: 'get',
                                        data: {},
                                        dataType: 'json',
                                    })
                                    .done(function(data) {
                                        var affichage = '';
                                        var modal = '';
                                        for (let j = 0; j < data.length; j++) {

                                            affichage += `<tr><td>${data[j].categorie_nom}</td>`;
                                            affichage += '<td>';
                                            affichage += '<ul>';
                                            var d = data[j].section;
                                            for (let a = 0; a < d.length; a++) {
                                                affichage += '<li>' + d[a].section_nom + '</li>';
                                            }
                                            affichage += '</ul>';
                                            affichage += '</td>';
                                            affichage += `<td>
                                        
                                        <a data-id="${data[j].categorie_id}" class="badge bg-label-danger me-1 delete" href="<?= base_url() ?>Categorie/supprimer/${data[j].categorie_id}">Supprimer</a>
                                `;

                                            affichage += '</td><tr>';
                                            modal += `
                                                <div class="modal fade" id="basicModal${data[j].categorie_id}" tabindex="-1" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel1">Modification</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <?= form_open('categorie/modifier/${data[j].categorie_id}') ?>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col mb-3">
                                                                        <label for="categorie" class="form-label">Categorie</label>
                                                                        <input type="text" id="categorie" class="form-control" placeholder="Inserer la categorie" name="categorie_nom" value="${data[j].categorie_nom}" />
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
                                            `;
                                        }

                                        $("#tbody").html(affichage);
                                        $("#modal").html(modal);
                                    })
                            }



                        })
                    </script>
</body>

</html>