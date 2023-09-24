<?php

class Calibrage extends CI_Controller
{
    public function __construct()
    {
        parent::__construct() ;
        $this->load->model("ModeModel", "mode");
        $this->load->model('CategorieModel', "categorie");
        $this->load->model("ClasseModel", "classe");
        $this->load->model("QuestionnaireModel", "questionnaire");
        $this->load->model("CalibrageModel", "calibrage");
        $this->load->model("FichesModel", "fiches");
    }
    public function __auth() {
        if(!$this->session->userdata('connected')) {
            $this->load->view('login') ;
        }
    }
    public function index() {
        $this->__auth() ;
        $this->load->view('admin/calibrage', array(
            'categorie' => $this->categorie->getAllCategorie(),
            'fiches' => $this->fiches->getAllFiches(),
        )) ;
    }
    public function rechercheSpecifique() {
        $this->__auth() ;
        $titre = $this->input->post('titre') ;
        $mot_cle = $this->input->post('mot_cle') ;
        $categ = $this->input->post('categ') ;

        $d = array(
            'titre' => $titre ,
            'mot_cle' => $mot_cle ,
            'categ' => $categ ,
        ) ;

        if($d['titre'] == "" && $d['mot_cle'] == "") {
            echo json_encode(array()) ;
            exit() ;
        }

        $data = $this->calibrage->getBy($d) ;
        
        echo json_encode($data) ;        
    }

    public function getQR($slug = '') {
        $this->__auth() ;
        $titre = $this->input->post('titre') ;
        $mot_cle = $this->input->post('mot_cle') ;

        $d = array(
            'titre' => $titre ,
            'mot_cle' => $mot_cle ,
            'id' => $this->input->post('id') ,
        ) ; 
        if($d['titre'] == "" && $d['mot_cle'] == "") {
            echo json_encode(array()) ;
            exit() ;
        }
        $data = $this->calibrage->getQRModel($d) ;
        echo json_encode($data) ;
    }

    public function getQRShowAll() {
        $this->__auth() ;
        $titre = $this->input->post('titre') ;
        $mot_cle = $this->input->post('mot_cle') ;

        $d = array(
            'titre' => $titre ,
            'mot_cle' => $mot_cle ,
            'id' => $this->input->post('id') ,
        ) ; 
        if($d['titre'] == "" && $d['mot_cle'] == "") {
            echo json_encode(array()) ;
            exit() ;
        }
        $data = $this->calibrage->getQRModelShowAll($d) ;
        echo json_encode($data) ;
    }

    public function del() {
        $this->__auth() ;
        
        
        $d = $this->calibrage->getSectionId($this->input->post('id')) ;
        $id = $d[0]->section_id ;

        $this->calibrage->deleteQR($this->input->post('id')) ;

        echo json_encode(array(
            'success' => true ,
            'id' => $id ,
        )) ;
    }

    public function delReponse() {
        $this->__auth() ;
        
        $this->calibrage->deleteQRByIDQuestion($this->input->post('id')) ;

        echo json_encode(array(
            'success' => true ,
            'id' => $this->input->post('id') ,
        )) ;
    }

    public function show() {
        $this->__auth() ;
        $id = $this->input->post("id") ;

        $data = $this->calibrage->getQRById($id) ;

        echo json_encode(array(
            'data' => $data ,
        )) ;
    }
}
