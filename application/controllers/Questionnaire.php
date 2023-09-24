<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Questionnaire extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("ModeModel", "mode");
        $this->load->model('CategorieModel', "categorie");
        $this->load->model("ClasseModel", "classe");
        $this->load->model("QuestionnaireModel", "questionnaire");
        $this->load->model("FichesModel", "fiches");
    }

    public function index()
    {
        $this->load->view('admin/questionnaire', array(
            // 'mode' => $this->mode->getAllMode() ,
            'categorie' => $this->categorie->getAllCategorie(),
            'fiches' => $this->fiches->getAllFiches(),
            // 'classe' => $this->classe->getAllClasse() ,
            // 'questions' => $this->questionnaire->getAllQuestionnaire() ,
        ));
    }
    public function enregistrer()
    {

        if (isset($_POST['idquestion'])) {
            $idQst = $this->input->post('idquestion');
            // question image section:
            // $imageQuestion = $_FILES['imageQuestion'];
            $reponseImage1 = $_FILES['reponse1-image'];
            $reponseImage2 = $_FILES['reponse2-image'];
            $reponseImage3 = $_FILES['reponse3-image'];
            $reponseImage4 = $_FILES['reponse4-image'];
            $reponseImage5 = $_FILES['reponse5-image'];
            $reponseImage6 = $_FILES['reponse6-image'];
            $reponseImage7 = $_FILES['reponse7-image'];

            // input 
            // $question = $this->input->post('question');
            $reponse1 = $this->input->post('reponse1');
            $reponse2 = $this->input->post('reponse2');
            $reponse3 = $this->input->post('reponse3');
            $reponse4 = $this->input->post('reponse4');
            $reponse5 = $this->input->post('reponse5');
            $reponse6 = $this->input->post('reponse6');
            $reponse7 = $this->input->post('reponse7');

            if ($reponse1 != '' || $reponseImage1['size'] > 0) {

                if ($reponseImage1['size'] > 0) {
                    if (!file_exists($target_file)) {
                        move_uploaded_file($reponseImage1["tmp_name"], 'public/qr/uploads/' . basename($reponseImage1["name"]));
                    }
                    $data = [
                        'reponse_contenu' => $reponse1,
                        'reponse_remarque' => $this->input->post('reponse1-remarque'),
                        'reponse_image' => 'qr/uploads' . $reponseImage1['name'],
                        'question_id' => $idQst,
                    ];
                    $this->questionnaire->addReponse($data);
                } else {
                    $data = [
                        'reponse_contenu' => $reponse1,
                        'reponse_remarque' => $this->input->post('reponse1-remarque'),
                        'reponse_image' => '',
                        'question_id' => $idQst,
                    ];
                    $this->questionnaire->addReponse($data);
                }
            }

            if ($reponse5 != '' || $reponseImage5['size'] > 0) {
                if ($reponseImage5['size'] > 0) {
                    if (!file_exists($target_file)) {
                        move_uploaded_file($reponseImage5["tmp_name"], 'public/qr/uploads/' . basename($reponseImage5["name"]));
                    }
                    $data = [
                        'reponse_contenu' => $reponse5,
                        'reponse_remarque' => $this->input->post('reponse5-remarque'),
                        'reponse_image' => 'qr/uploads' . $reponseImage5['name'] ?? '',
                        'question_id' => $idQst,
                    ];
                    $this->questionnaire->addReponse($data);
                } else {
                    $data = [
                        'reponse_contenu' => $reponse5,
                        'reponse_remarque' => $this->input->post('reponse5-remarque'),
                        'reponse_image' => '',
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
                        'reponse_image' => 'qr/uploads' . $reponseImage2['name'] ?? '',
                        'question_id' => $idQst,
                    ];
                    $this->questionnaire->addReponse($data);
                } else {
                    $data = [
                        'reponse_contenu' => $reponse2,
                        'reponse_remarque' => $this->input->post('reponse2-remarque'),
                        'reponse_image' => '',
                        'question_id' => $idQst,
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
                        'reponse_image' => 'qr/uploads' . $reponseImage3['name'] ?? '',
                        'question_id' => $idQst,
                    ];
                    $this->questionnaire->addReponse($data);
                } else {
                    $data = [
                        'reponse_contenu' => $reponse3,
                        'reponse_remarque' => $this->input->post('reponse3-remarque'),
                        'reponse_image' => '',
                        'question_id' => $idQst,
                    ];
                    $this->questionnaire->addReponse($data);
                }
            }

            if ($reponse4 != '' || $reponseImage4['size'] > 0) {
                if ($reponseImage4['size'] > 0) {
                    if (!file_exists($target_file)) {
                        move_uploaded_file($reponseImage4["tmp_name"], 'public/qr/uploads/' . basename($reponseImage4["name"]));
                    }
                    $data = [
                        'reponse_contenu' => $reponse4,
                        'reponse_remarque' => $this->input->post('reponse4-remarque'),
                        'reponse_image' => 'qr/uploads' . $reponseImage4['name'] ?? '',
                        'question_id' => $idQst,
                    ];
                    $this->questionnaire->addReponse($data);
                } else {
                    $data = [
                        'reponse_contenu' => $reponse4,
                        'reponse_remarque' => $this->input->post('reponse4-remarque'),
                        'reponse_image' => '',
                        'question_id' => $idQst,
                    ];
                    $this->questionnaire->addReponse($data);
                }
            }
            if ($reponse6 != '' || $reponseImage6['size'] > 0) {
                if ($reponseImage6['size'] > 0) {
                    if (!file_exists($target_file)) {
                        move_uploaded_file($reponseImage6["tmp_name"], 'public/qr/uploads/' . basename($reponseImage6["name"]));
                    }
                    $data = [
                        'reponse_contenu' => $reponse6,
                        'reponse_remarque' => $this->input->post('reponse6-remarque'),
                        'reponse_image' => 'qr/uploads' . $reponseImage6['name'] ?? '',
                        'question_id' => $idQst,
                    ];
                    $this->questionnaire->addReponse($data);
                } else {
                    $data = [
                        'reponse_contenu' => $reponse6,
                        'reponse_remarque' => $this->input->post('reponse6-remarque'),
                        'reponse_image' => '',
                        'question_id' => $idQst,
                    ];
                    $this->questionnaire->addReponse($data);
                }
            }
            if ($reponse7 != '' || $reponseImage7['size'] > 0) {
                if ($reponseImage7['size'] > 0) {
                    if (!file_exists($target_file)) {
                        move_uploaded_file($reponseImage7["tmp_name"], 'public/qr/uploads/' . basename($reponseImage7["name"]));
                    }
                    $data = [
                        'reponse_contenu' => $reponse7,
                        'reponse_remarque' => $this->input->post('reponse7-remarque'),
                        'reponse_image' => 'qr/uploads' . $reponseImage7['name'] ?? '',
                        'question_id' => $idQst,
                    ];
                    $this->questionnaire->addReponse($data);
                } else {
                    $data = [
                        'reponse_contenu' => $reponse7,
                        'reponse_remarque' => $this->input->post('reponse7-remarque'),
                        'reponse_image' => '',
                        'question_id' => $idQst,
                    ];
                    $this->questionnaire->addReponse($data);
                }
            }
            echo 'success';
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
                    'mot_cle' => $this->input->post('mot_cle'),
                ];
                $this->questionnaire->addQuestion($data);
            } else {
                $data = [
                    'question_text' => $question,
                    'question_image' => '',
                    'section_id' => $this->input->post('idsection'),
                    'titre' => $this->input->post('titre'),
                    'mot_cle' => $this->input->post('mot_cle'),
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
                        'reponse_image' => 'qr/uploads' . $reponseImage1['name'],
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

            if ($reponse5 != '' || $reponseImage5['size'] > 0) {
                if ($reponseImage5['size'] > 0) {
                    if (!file_exists($target_file)) {
                        move_uploaded_file($reponseImage5["tmp_name"], 'public/qr/uploads/' . basename($reponseImage5["name"]));
                    }
                    $data = [
                        'reponse_contenu' => $reponse5,
                        'reponse_remarque' => $this->input->post('reponse5-remarque'),
                        'reponse_image' => 'qr/uploads' . $reponseImage5['name'] ?? '',
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

            if ($reponse2 != '' || $reponseImage2['size'] > 0) {
                if ($reponseImage2['size'] > 0) {
                    if (!file_exists($target_file)) {
                        move_uploaded_file($reponseImage2["tmp_name"], 'public/qr/uploads/' . basename($reponseImage2["name"]));
                    }
                    $data = [
                        'reponse_contenu' => $reponse2,
                        'reponse_remarque' => $this->input->post('reponse2-remarque'),
                        'reponse_image' => 'qr/uploads' . $reponseImage2['name'] ?? '',
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
                        'reponse_image' => 'qr/uploads' . $reponseImage3['name'] ?? '',
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

            if ($reponse4 != '' || $reponseImage4['size'] > 0) {
                if ($reponseImage4['size'] > 0) {
                    if (!file_exists($target_file)) {
                        move_uploaded_file($reponseImage4["tmp_name"], 'public/qr/uploads/' . basename($reponseImage4["name"]));
                    }
                    $data = [
                        'reponse_contenu' => $reponse4,
                        'reponse_remarque' => $this->input->post('reponse4-remarque'),
                        'reponse_image' => 'qr/uploads' . $reponseImage4['name'] ?? '',
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

            if ($reponse6 != '' || $reponseImage6['size'] > 0) {
                if ($reponseImage6['size'] > 0) {
                    if (!file_exists($target_file)) {
                        move_uploaded_file($reponseImage6["tmp_name"], 'public/qr/uploads/' . basename($reponseImage6["name"]));
                    }
                    $data = [
                        'reponse_contenu' => $reponse6,
                        'reponse_remarque' => $this->input->post('reponse6-remarque'),
                        'reponse_image' => 'qr/uploads' . $reponseImage6['name'] ?? '',
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
            if ($reponse7 != '' || $reponseImage7['size'] > 0) {
                if ($reponseImage7['size'] > 0) {
                    if (!file_exists($target_file)) {
                        move_uploaded_file($reponseImage7["tmp_name"], 'public/qr/uploads/' . basename($reponseImage7["name"]));
                    }
                    $data = [
                        'reponse_contenu' => $reponse7,
                        'reponse_remarque' => $this->input->post('reponse7-remarque'),
                        'reponse_image' => 'qr/uploads' . $reponseImage7['name'] ?? '',
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

            echo 'success';
        }
    }

    public function getSpecificCategorieById()
    {
        $id = $_POST['id'];
        $data = $this->categorie->getOne($id);
        echo json_encode($data);
    }

    public function supprimer($id)
    {
        $this->questionnaire->deleteQuestionnaire($id);
        redirect('questionnaire');
    }
}
