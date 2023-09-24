<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Listes extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ListesModel', 'listes');
        $this->load->model('CategorieModel', 'categorie');
        $this->load->model("FichesModel", "fiches");
        $this->load->model("QuestionnaireModel", "questionnaire");
    }
    public function __auth()
    {
        if (!$this->session->userdata('connected')) {
            $this->load->view('login');
        }
    }
    public function index()
    {
        $this->__auth();
        $this->load->view('admin/listes', array(
            'listes' => $this->listes->getAllListes(),
            'categorie' => $this->categorie->getCategories(),
            'section' => $this->categorie->getSections(),
            'fiches' => $this->fiches->getAllFiches(),
        ));
    }
    public function del()
    {
        $this->__auth();
        $this->listes->dropQuestion($this->input->post('id'));
        echo 'deleted';
    }
    public function rechercher()
    {
        if ($this->input->post('question') != '') {

            if ($this->input->post('categorie') == "" && $this->input->post('section') == "" && $this->input->post('fiche') == "") {
                $data = [

                    'question' => $this->input->post('question'),
                ];
                $res = $this->listes->searchWithQuestionOnly($data);
            } else {
                $data = [
                    'categ' => $this->input->post('categorie'),
                    'section' => $this->input->post('section'),
                    'fiche' => $this->input->post('fiche'),
                    'question' => $this->input->post('question'),
                ];
                $res = $this->listes->searchWithQuestion($data);
            }
        } else {
            $data = [
                'categ' => $this->input->post('categorie'),
                'section' => $this->input->post('section'),
                'fiche' => $this->input->post('fiche'),
            ];
            $res = $this->listes->search($data);
        }



        $affichage = "";
        for ($i = 0; $i < count($res); $i++) {
            $affichage .= "<tr>";
            $affichage .= "<td>{$res[$i]->question_text}</td>";
            if ($res[$i]->question_image == '') {
                $affichage .= "<td>Pas d'image</td>";
            } else {
                $affichage .= "<td>";
                $affichage .= '<img src="' . base_url() . 'public/' . $res[$i]->question_image . '" style="height: 200px; width:200px; object-fit:contain ;" alt="Placeholder">';

                $affichage .= "</td>";
            }

            $affichage .= "<td>{$res[$i]->section_nom}</td>";
            $affichage .= "<td>{$res[$i]->categorie_nom}</td>";
            $affichage .= "<td>{$res[$i]->titre}</td>";
            $dd = $res[$i]->reponse;

            $affichage .= "<td>";
            if (count($dd) > 0) {
                $affichage .= "<ul>";
                for ($a = 0; $a < count($res[$i]->reponse); $a++) {
                    $affichage .= "<li>";
                    // $affichage .=  $dd[$a]->reponse_image;
                    if ($dd[$a]->reponse_image == "") {
                        $affichage .= "<div class='row'>";
                        $affichage .= "<div class='col-md-4'>";
                        $affichage .=  $dd[$a]->reponse_contenu;
                        $affichage .= "</div>";
                        $affichage .= "<div class='col-md-4'>";
                        $affichage .= '<span>Pas d\'image</span>';
                        $affichage .= "</div>";
                        $affichage .= "<div class='col-md-4'>";
                        $affichage .=  $dd[$a]->reponse_remarque;
                        $affichage .= "</div>";
                        $affichage .= "</div>";
                    } else {
                        $affichage .= "<div class='row'>";
                        $affichage .= "<div class='col-md-4'>";
                        $affichage .=  $dd[$a]->reponse_contenu;
                        $affichage .= "</div>";
                        $affichage .= "<div class='col-md-4'>";
                        $affichage .= '<img src="' . base_url() . 'public/' . $dd[$a]->reponse_image . '" style="height: 100px; width:100px; object-fit:contain ;" alt="Placeholder" >';
                        $affichage .= "</div>";
                        $affichage .= "<div class='col-md-4'>";
                        $affichage .=  $dd[$a]->reponse_remarque;
                        $affichage .= "</div>";
                        $affichage .= "</div>";
                    }

                    $affichage .= "</li>";
                    $affichage .= '<hr>';
                }
                $affichage .= "</ul>";
            } else {
                $affichage .= "Pas de réponse";
            }
            $affichage .= "</td>";

            $affichage .= "<td>";
            $affichage .= "<a data-id='" . $res[$i]->question_id . "' href='#' class='badge bg-label-info me-1 update'>Modifier</a>";
            $affichage .= "<a data-id='" . $res[$i]->question_id . "' href='#' class='badge bg-label-danger me-1 remove'>Supprimer</a>";
            $affichage .= "</td>";
            $affichage .= "</tr>";
        }
        echo json_encode(array('templ' => $affichage, 'nbre' => count($res)));
    }

    public function getSectionByCategorie()
    {
        $section_id = $this->input->post('categorie');
        $data = $this->listes->getSection($section_id);
        $fiche = $this->listes->getFiches($section_id);
        $affichage = '';
        $affichage_fiche = '';
        $affichage .= '<option value="">Choisir section</option>';
        for ($i = 0; $i < count($data); $i++) {
            $affichage .= "<option value='{$data[$i]->section_id}'>{$data[$i]->section_nom}</option>";
        }
        $affichage_fiche .= '<option value="">Choisir fiche</option>';
        for ($f = 0; $f < count($fiche); $f++) {
            $affichage_fiche .= "<option value='{$fiche[$f]->fiches_contenu}'>{$fiche[$f]->fiches_contenu}</option>";
        }
        echo json_encode(array(
            'section' => $affichage,
            'fiches' => $affichage_fiche,
        ));
    }

    public function enregistrer()
    {
        // var_dump($_FILES) ;
        //     die() ;
        if ($this->input->post('idquestion') != '') {



            $idQst = $this->input->post('idquestion');
            // question image section:
            $imageQuestion = $_FILES['imageQuestion'];
            $reponseImage1 = $_FILES['reponse1-image'];
            $reponseImage2 = $_FILES['reponse2-image'];
            $reponseImage3 = $_FILES['reponse3-image'];
            $reponseImage4 = $_FILES['reponse4-image'];
            $reponseImage5 = $_FILES['reponse5-image'];
            $reponseImage6 = $_FILES['reponse6-image'];
            $reponseImage7 = $_FILES['reponse7-image'];

            // input 
            $question = $this->input->post('question');
            $reponse1 = $this->input->post('reponse1');
            $reponse2 = $this->input->post('reponse2');
            $reponse3 = $this->input->post('reponse3');
            $reponse4 = $this->input->post('reponse4');
            $reponse5 = $this->input->post('reponse5');
            $reponse6 = $this->input->post('reponse6');
            $reponse7 = $this->input->post('reponse7');


            $target_dir = "qr/uploads/";
            $target_file = $target_dir . basename($imageQuestion["name"]);
            if ($imageQuestion['size'] > 0) {
                if (!file_exists($target_file)) {
                    move_uploaded_file($imageQuestion["tmp_name"], 'public/' . $target_file);
                }

                $data = [
                    'question_text' => $question,
                    'question_image' => $target_file,
                    'section_id' => $this->input->post('idsection'),
                    'titre' => $this->input->post('titre'),
                    'mot_cle' => 'Aucun',
                ];
                $this->questionnaire->updateQuestion($data, $idQst);
            } else {
                $data = [
                    'question_image' => $this->input->post('question-modal-anchor'),
                    'question_text' => $question,
                    'section_id' => $this->input->post('idsection'),
                    'titre' => $this->input->post('titre'),
                    'mot_cle' => 'Aucun', // Mot cle
                ];
                $this->questionnaire->updateQuestion($data, $idQst);
            }

            $this->questionnaire->deleteReponse($idQst);





            if ($reponse1 != '' || $reponseImage1['size'] > 0) {

                if ($reponseImage1['size'] > 0) {
                    if (!file_exists($target_file)) {
                        move_uploaded_file($reponseImage1["tmp_name"], 'public/qr/uploads/' . basename($reponseImage1["name"]));
                    }
                    $data = [
                        'reponse_contenu' => $reponse1,
                        'reponse_remarque' => $this->input->post('reponse1-remarque'),
                        'reponse_image' => 'qr/uploads/' . $reponseImage1['name'],
                        'question_id' => $idQst,
                    ];
                    $this->questionnaire->addReponse($data);
                } else {
                    $data = [
                        'reponse_contenu' => $reponse1,
                        'reponse_remarque' => $this->input->post('reponse1-remarque'),
                        'reponse_image' => $this->input->post('image1'),
                        'question_id' => $idQst,
                    ];
                    $this->questionnaire->addReponse($data);
                }
            } else {
                $data = [
                    'reponse_contenu' => $reponse1,
                    'reponse_remarque' => $this->input->post('reponse1-remarque'),
                    'reponse_image' => "",
                    'question_id' => $idQst,
                ];
                $this->questionnaire->addReponse($data);
            }

            if ($this->input->post('categorie') != '24') {
                if (($reponse5 != '' || $reponseImage5['size'] > 0) && $this->input->post('categorie') != 24) {
                    if ($reponseImage5['size'] > 0) {
                        if (!file_exists($target_file)) {
                            move_uploaded_file($reponseImage5["tmp_name"], 'public/qr/uploads/' . basename($reponseImage5["name"]));
                        }
                        $data = [
                            'reponse_contenu' => $reponse5,
                            'reponse_remarque' => $this->input->post('reponse5-remarque'),
                            'reponse_image' => 'qr/uploads/' . $reponseImage5['name'] ?? '',
                            'question_id' => $idQst,
                        ];
                        $this->questionnaire->addReponse($data);
                    } else {
                        $data = [
                            'reponse_contenu' => $reponse5,
                            'reponse_remarque' => $this->input->post('reponse5-remarque'),
                            'reponse_image' => $this->input->post('image5'),
                            'question_id' => $idQst,
                        ];
                        $this->questionnaire->addReponse($data);
                    }
                } else {
                    $data = [
                        'reponse_contenu' => $reponse5,
                        'reponse_remarque' => $this->input->post('reponse5-remarque'),
                        'reponse_image' => "",
                        'question_id' => $idQst,
                    ];
                    $this->questionnaire->addReponse($data);
                }
            }



            if ($reponse2 != '' || $reponseImage2['size'] > 0) {
                if ($reponseImage2['size'] > 0) {
                    if (!file_exists($target_file)) {
                        move_uploaded_file($reponseImage2["tmp_name"], 'public/qr/uploads/' . basename($reponseImage2["name"]));
                    }
                    $data = [
                        'reponse_contenu' => $reponse2,
                        'reponse_remarque' => $this->input->post('reponse2-remarque'),
                        'reponse_image' => 'qr/uploads/' . $reponseImage2['name'] ?? '',
                        'question_id' => $idQst,
                    ];
                    $this->questionnaire->addReponse($data);
                } else {
                    $data = [
                        'reponse_contenu' => $reponse2,
                        'reponse_remarque' => $this->input->post('reponse2-remarque'),
                        'reponse_image' => $this->input->post('image2'),
                        'question_id' => $idQst,
                    ];
                    $this->questionnaire->addReponse($data);
                }
            } else {
                $data = [
                    'reponse_contenu' => $reponse2,
                    'reponse_remarque' => $this->input->post('reponse2-remarque'),
                    'reponse_image' => "",
                    'question_id' => $idQst,
                ];
                $this->questionnaire->addReponse($data);
            }

            if ($reponse3 != '' || $reponseImage3['size'] > 0) {
                if ($reponseImage3['size'] > 0) {
                    if (!file_exists($target_file)) {
                        move_uploaded_file($reponseImage3["tmp_name"], 'public/qr/uploads/' . basename($reponseImage3["name"]));
                    }
                    $data = [
                        'reponse_contenu' => $reponse3,
                        'reponse_remarque' => $this->input->post('reponse3-remarque'),
                        'reponse_image' => 'qr/uploads/' . $reponseImage3['name'] ?? '',
                        'question_id' => $idQst,
                    ];
                    $this->questionnaire->addReponse($data);
                } else {
                    $data = [
                        'reponse_contenu' => $reponse3,
                        'reponse_remarque' => $this->input->post('reponse3-remarque'),
                        'reponse_image' => $this->input->post('image3'),
                        'question_id' => $idQst,
                    ];
                    $this->questionnaire->addReponse($data);
                }
            } else {
                $data = [
                    'reponse_contenu' => $reponse3,
                    'reponse_remarque' => $this->input->post('reponse3-remarque'),
                    'reponse_image' => "",
                    'question_id' => $idQst,
                ];
                $this->questionnaire->addReponse($data);
            }

            if ($this->input->post('categorie') != '24') {
                if (($reponse4 != '' || $reponseImage4['size'] > 0) && $this->input->post('categorie') != 24) {
                    if ($reponseImage4['size'] > 0) {
                        if (!file_exists($target_file)) {
                            move_uploaded_file($reponseImage4["tmp_name"], 'public/qr/uploads/' . basename($reponseImage4["name"]));
                        }
                        $data = [
                            'reponse_contenu' => $reponse4,
                            'reponse_remarque' => $this->input->post('reponse4-remarque'),
                            'reponse_image' => 'qr/uploads/' . $reponseImage4['name'] ?? '',
                            'question_id' => $idQst,
                        ];
                        $this->questionnaire->addReponse($data);
                    } else {
                        $data = [
                            'reponse_contenu' => $reponse4,
                            'reponse_remarque' => $this->input->post('reponse4-remarque'),
                            'reponse_image' => $this->input->post('image4'),
                            'question_id' => $idQst,
                        ];
                        $this->questionnaire->addReponse($data);
                    }
                } else {
                    $data = [
                        'reponse_contenu' => $reponse4,
                        'reponse_remarque' => $this->input->post('reponse4-remarque'),
                        'reponse_image' => "",
                        'question_id' => $idQst,
                    ];
                    $this->questionnaire->addReponse($data);
                }
            }


            if ($this->input->post('categorie') != '24') {
                if (($reponse6 != '' || $reponseImage6['size'] > 0) && $this->input->post('categorie') != 24) {
                    if ($reponseImage6['size'] > 0) {
                        if (!file_exists($target_file)) {
                            move_uploaded_file($reponseImage6["tmp_name"], 'public/qr/uploads/' . basename($reponseImage6["name"]));
                        }
                        $data = [
                            'reponse_contenu' => $reponse6,
                            'reponse_remarque' => $this->input->post('reponse6-remarque'),
                            'reponse_image' => 'qr/uploads/' . $reponseImage6['name'] ?? '',
                            'question_id' => $idQst,
                        ];
                        $this->questionnaire->addReponse($data);
                    } else {
                        $data = [
                            'reponse_contenu' => $reponse6,
                            'reponse_remarque' => $this->input->post('reponse6-remarque'),
                            'reponse_image' => $this->input->post('image6'),
                            'question_id' => $idQst,
                        ];
                        $this->questionnaire->addReponse($data);
                    }
                } else {
                    $data = [
                        'reponse_contenu' => $reponse6,
                        'reponse_remarque' => $this->input->post('reponse6-remarque'),
                        'reponse_image' => "",
                        'question_id' => $idQst,
                    ];
                    $this->questionnaire->addReponse($data);
                }
            }

            if ($this->input->post('categorie') != '24') {
                if (($reponse7 != '' || $reponseImage7['size'] > 0) && $this->input->post('categorie') != 24) {
                    if ($reponseImage7['size'] > 0) {
                        if (!file_exists($target_file)) {
                            move_uploaded_file($reponseImage7["tmp_name"], 'public/qr/uploads/' . basename($reponseImage7["name"]));
                        }
                        $data = [
                            'reponse_contenu' => $reponse7,
                            'reponse_remarque' => $this->input->post('reponse7-remarque'),
                            'reponse_image' => 'qr/uploads/' . $reponseImage7['name'] ?? '',
                            'question_id' => $idQst,
                        ];
                        $this->questionnaire->addReponse($data);
                    } else {
                        $data = [
                            'reponse_contenu' => $reponse7,
                            'reponse_remarque' => $this->input->post('reponse7-remarque'),
                            'reponse_image' => $this->input->post('image7'),
                            'question_id' => $idQst,
                        ];
                        $this->questionnaire->addReponse($data);
                    }
                } else {
                    $data = [
                        'reponse_contenu' => $reponse7,
                        'reponse_remarque' => $this->input->post('reponse7-remarque'),
                        'reponse_image' => "",
                        'question_id' => $idQst,
                    ];
                    $this->questionnaire->addReponse($data);
                }
            }


            echo 'updated';
        } else {
            // question image section:
            $imageQuestion = $_FILES['imageQuestion'];
            $reponseImage1 = $_FILES['reponse1-image'];
            $reponseImage2 = $_FILES['reponse2-image'];
            $reponseImage3 = $_FILES['reponse3-image'];
            $reponseImage4 = $_FILES['reponse4-image'];
            $reponseImage5 = $_FILES['reponse5-image'];
            $reponseImage6 = $_FILES['reponse6-image'];
            $reponseImage7 = $_FILES['reponse7-image'];

            // input 
            $question = $this->input->post('question');
            $reponse1 = $this->input->post('reponse1');
            $reponse2 = $this->input->post('reponse2');
            $reponse3 = $this->input->post('reponse3');
            $reponse4 = $this->input->post('reponse4');
            $reponse5 = $this->input->post('reponse5');
            $reponse6 = $this->input->post('reponse6');
            $reponse7 = $this->input->post('reponse7');


            // traitement:

            // question traitement:

            $target_dir = "qr/uploads/";
            $target_file = $target_dir . basename($imageQuestion["name"]);
            if ($imageQuestion['size'] > 0) {
                if (!file_exists($target_file)) {
                    move_uploaded_file($imageQuestion["tmp_name"], 'public/' . $target_file);
                }

                $data = [
                    'question_text' => $question,
                    'question_image' => $target_file,
                    'section_id' => $this->input->post('idsection'),
                    'titre' => $this->input->post('titre'),
                    'mot_cle' => 'Aucun',
                ];
                $this->questionnaire->addQuestion($data);
            } else {
                $data = [
                    'question_text' => $question,
                    'question_image' => '',
                    'section_id' => $this->input->post('idsection'),
                    'titre' => $this->input->post('titre'),
                    'mot_cle' => 'Aucun', // Mot cle
                ];
                $this->questionnaire->addQuestion($data);
            }



            // Traitement reponse:
            $idQuestion = $this->questionnaire->getLatestQuestion();

            if ($reponse1 != '' || $reponseImage1['size'] > 0) {

                if ($reponseImage1['size'] > 0) {
                    if (!file_exists($target_file)) {
                        move_uploaded_file($reponseImage1["tmp_name"], 'public/qr/uploads/' . basename($reponseImage1["name"]));
                    }
                    $data = [
                        'reponse_contenu' => $reponse1,
                        'reponse_remarque' => $this->input->post('reponse1-remarque'),
                        'reponse_image' => 'qr/uploads/' . $reponseImage1['name'],
                        'question_id' => $idQuestion,
                    ];
                    $this->questionnaire->addReponse($data);
                } else {
                    $data = [
                        'reponse_contenu' => $reponse1,
                        'reponse_remarque' => $this->input->post('reponse1-remarque'),
                        'reponse_image' => '',
                        'question_id' => $idQuestion,
                    ];
                    $this->questionnaire->addReponse($data);
                }
            }
            if ($this->input->post('categorie') != '24') {
                if (($reponse5 != '' || $reponseImage5['size'] > 0) && $this->input->post('categorie') != 24) {
                    if ($reponseImage5['size'] > 0) {
                        if (!file_exists($target_file)) {
                            move_uploaded_file($reponseImage5["tmp_name"], 'public/qr/uploads/' . basename($reponseImage5["name"]));
                        }
                        $data = [
                            'reponse_contenu' => $reponse5,
                            'reponse_remarque' => $this->input->post('reponse5-remarque'),
                            'reponse_image' => 'qr/uploads/' . $reponseImage5['name'] ?? '',
                            'question_id' => $idQuestion,
                        ];
                        $this->questionnaire->addReponse($data);
                    } else {
                        $data = [
                            'reponse_contenu' => $reponse5,
                            'reponse_remarque' => $this->input->post('reponse5-remarque'),
                            'reponse_image' => '',
                            'question_id' => $idQuestion,
                        ];
                        $this->questionnaire->addReponse($data);
                    }
                }
            }


            if ($reponse2 != '' || $reponseImage2['size'] > 0) {
                if ($reponseImage2['size'] > 0) {
                    if (!file_exists($target_file)) {
                        move_uploaded_file($reponseImage2["tmp_name"], 'public/qr/uploads/' . basename($reponseImage2["name"]));
                    }
                    $data = [
                        'reponse_contenu' => $reponse2,
                        'reponse_remarque' => $this->input->post('reponse2-remarque'),
                        'reponse_image' => 'qr/uploads/' . $reponseImage2['name'] ?? '',
                        'question_id' => $idQuestion,
                    ];
                    $this->questionnaire->addReponse($data);
                } else {
                    $data = [
                        'reponse_contenu' => $reponse2,
                        'reponse_remarque' => $this->input->post('reponse2-remarque'),
                        'reponse_image' => '',
                        'question_id' => $idQuestion,
                    ];
                    $this->questionnaire->addReponse($data);
                }
            }

            if ($reponse3 != '' || $reponseImage3['size'] > 0) {
                if ($reponseImage3['size'] > 0) {
                    if (!file_exists($target_file)) {
                        move_uploaded_file($reponseImage3["tmp_name"], 'public/qr/uploads/' . basename($reponseImage3["name"]));
                    }
                    $data = [
                        'reponse_contenu' => $reponse3,
                        'reponse_remarque' => $this->input->post('reponse3-remarque'),
                        'reponse_image' => 'qr/uploads/' . $reponseImage3['name'] ?? '',
                        'question_id' => $idQuestion,
                    ];
                    $this->questionnaire->addReponse($data);
                } else {
                    $data = [
                        'reponse_contenu' => $reponse3,
                        'reponse_remarque' => $this->input->post('reponse3-remarque'),
                        'reponse_image' => '',
                        'question_id' => $idQuestion,
                    ];
                    $this->questionnaire->addReponse($data);
                }
            }

            if ($this->input->post('categorie') != '24') {
                if (($reponse4 != '' || $reponseImage4['size'] > 0) && $this->input->post('categorie') != 24) {
                    if ($reponseImage4['size'] > 0) {
                        if (!file_exists($target_file)) {
                            move_uploaded_file($reponseImage4["tmp_name"], 'public/qr/uploads/' . basename($reponseImage4["name"]));
                        }
                        $data = [
                            'reponse_contenu' => $reponse4,
                            'reponse_remarque' => $this->input->post('reponse4-remarque'),
                            'reponse_image' => 'qr/uploads/' . $reponseImage4['name'] ?? '',
                            'question_id' => $idQuestion,
                        ];
                        $this->questionnaire->addReponse($data);
                    } else {
                        $data = [
                            'reponse_contenu' => $reponse4,
                            'reponse_remarque' => $this->input->post('reponse4-remarque'),
                            'reponse_image' => '',
                            'question_id' => $idQuestion,
                        ];
                        $this->questionnaire->addReponse($data);
                    }
                }
            }


            if ($this->input->post('categorie') != '24') {
                if (($reponse6 != '' || $reponseImage6['size'] > 0) && $this->input->post('categorie') != 24) {
                    if ($reponseImage6['size'] > 0) {
                        if (!file_exists($target_file)) {
                            move_uploaded_file($reponseImage6["tmp_name"], 'public/qr/uploads/' . basename($reponseImage6["name"]));
                        }
                        $data = [
                            'reponse_contenu' => $reponse6,
                            'reponse_remarque' => $this->input->post('reponse6-remarque'),
                            'reponse_image' => 'qr/uploads/' . $reponseImage6['name'] ?? '',
                            'question_id' => $idQuestion,
                        ];
                        $this->questionnaire->addReponse($data);
                    } else {
                        $data = [
                            'reponse_contenu' => $reponse6,
                            'reponse_remarque' => $this->input->post('reponse6-remarque'),
                            'reponse_image' => '',
                            'question_id' => $idQuestion,
                        ];
                        $this->questionnaire->addReponse($data);
                    }
                }
            }


            if ($this->input->post('categorie') != '24') {
                if (($reponse7 != '' || $reponseImage7['size'] > 0) && $this->input->post('categorie') != 24) {
                    if ($reponseImage7['size'] > 0) {
                        if (!file_exists($target_file)) {
                            move_uploaded_file($reponseImage7["tmp_name"], 'public/qr/uploads/' . basename($reponseImage7["name"]));
                        }
                        $data = [
                            'reponse_contenu' => $reponse7,
                            'reponse_remarque' => $this->input->post('reponse7-remarque'),
                            'reponse_image' => 'qr/uploads/' . $reponseImage7['name'] ?? '',
                            'question_id' => $idQuestion,
                        ];
                        $this->questionnaire->addReponse($data);
                    } else {
                        $data = [
                            'reponse_contenu' => $reponse7,
                            'reponse_remarque' => $this->input->post('reponse7-remarque'),
                            'reponse_image' => '',
                            'question_id' => $idQuestion,
                        ];
                        $this->questionnaire->addReponse($data);
                    }
                }
            }


            echo 'success';
        }
    }

    public function getForm()
    {
        $id = $this->input->post('id');
        if ($this->input->post('categorie') == '' && $this->input->post('section') == '' && $this->input->post('fiche') == '') {
            $data = [
                'question_id' => $this->input->post('id'),
            ];

            $res = $this->listes->getSpecificDataWithOnlyID($data);
            $res[0]->section_content = ($this->listes->getSection($res[0]->categorie_id));


            $reponses = $res[0]->reponse;
            $data = [];
            $data_T = [];
            $data_A = [];
            $data_O = [];
            for ($i = 0; $i < count($reponses); $i++) {
                if ($reponses[$i]->reponse_contenu == 'T - Toutes les réponses sont correctes' || $reponses[$i]->reponse_contenu == 'A - Aucune des réponses n’est correcte' || $reponses[$i]->reponse_contenu == 'O - Omission') {
                    if ($reponses[$i]->reponse_contenu == 'T - Toutes les réponses sont correctes') {
                        $data_T = $reponses[$i];
                    } else if ($reponses[$i]->reponse_contenu == 'A - Aucune des réponses n’est correcte') {
                        $data_A = $reponses[$i];
                    } else if ($reponses[$i]->reponse_contenu == 'O - Omission') {
                        $data_O = $reponses[$i];
                    }
                } else {
                    array_push($data, $reponses[$i]);
                }
            }
            if (count($data) > 3) {
                array_push($data, $data_T);
                array_push($data, $data_A);
                array_push($data, $data_O);
            }
            $res[0]->reponse = $data;

            echo json_encode($res);
        } else {
            $data = [
                'categ' => $this->input->post('categorie'),
                'section' => $this->input->post('section'),
                'fiche' => $this->input->post('fiche'),
                'question_id' => $this->input->post('id'),
            ];
            $res = $this->listes->getSpecificData($data);
            $res[0]->section_content = ($this->listes->getSection($res[0]->categorie_id));

            $reponses = $res[0]->reponse;
            $data = [];
            $data_T = [];
            $data_A = [];
            $data_O = [];
            for ($i = 0; $i < count($reponses); $i++) {
                if ($reponses[$i]->reponse_contenu == 'T - Toutes les réponses sont correctes' || $reponses[$i]->reponse_contenu == 'A - Aucune des réponses n’est correcte' || $reponses[$i]->reponse_contenu == 'O - Omission') {
                    if ($reponses[$i]->reponse_contenu == 'T - Toutes les réponses sont correctes') {
                        $data_T = $reponses[$i];
                    } else if ($reponses[$i]->reponse_contenu == 'A - Aucune des réponses n’est correcte') {
                        $data_A = $reponses[$i];
                    } else if ($reponses[$i]->reponse_contenu == 'O - Omission') {
                        $data_O = $reponses[$i];
                    }
                } else {
                    array_push($data, $reponses[$i]);
                }
            }
            if (count($data) > 3) {
                array_push($data, $data_T);
                array_push($data, $data_A);
                array_push($data, $data_O);
            }

            $res[0]->reponse = $data;

            echo json_encode($res);
        }
    }
    public function getOnlyFichesByCategorie()
    {
        $id = $this->input->post('categorie');
        $data = $this->listes->getFiches($id);
        $affichage = '';
        $affichage .= "Choisir fiche";
        for ($i = 0; $i < count($data); $i++) {
            $affichage .= "<option value='" . $data[$i]->fiches_contenu . "'>" . $data[$i]->fiches_contenu . "</option>";
        }

        echo $affichage;
    }
}
