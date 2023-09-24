<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Categorie extends CI_Controller {

        public function __construct() {
            parent::__construct() ;
            $this->load->model('CategorieModel',"categorie") ;
        }
        public function __auth() {
            if(!$this->session->userdata('connected')) {
                $this->load->view('login') ;
            }
        }
        public function index() {
            $this->__auth() ;
            $this->load->view('admin/categorie',array(
                'categorie' => $this->showCategorieSection() ,
            )) ;
        }
        
        public function register() {
            $this->__auth() ;
            $categorie = $_POST['categorie'] ;
            $data = json_decode($_POST['content']) ;

            $this->categorie->registerCategorie(['categorie_nom' => $categorie],$data) ;

            echo json_encode(array(
                'success' => true ,
            )) ;
        }

        public function supprimer($id) {
            $this->__auth() ;
            $this->categorie->deleteCategorie($id) ;
            echo json_encode(array(
                'success' => true ,
            )) ;
        }
        public function getCateg() {
            $this->__auth() ;
            echo json_encode($this->showCategorieSection()) ;
        } 
        public function showCategorieSection() {
            $this->__auth() ;
            return $this->categorie->getAllCategorie() ;
        }
    }