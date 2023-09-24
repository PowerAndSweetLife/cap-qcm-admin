<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Fiches extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("FichesModel", "fiches");
        $this->load->model('CategorieModel', "categorie");
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
        $this->load->view('admin/fiches', array(
            'fiches' => $this->fiches->getAllFiches(),
            'categorie' => $this->categorie->getAllCategorie(),
        ));
    }
    public function register()
    {
        $this->__auth();
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        $this->form_validation->set_rules('fiches_contenu', 'fiches_contenu', 'required', array(
            'required' => 'Ce champ est obligatoire !'
        ));
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/fiches', array(
                'fiches' => $this->fiches->getAllFiches(),
                'categorie' => $this->categorie->getAllCategorie(),
            ));
        } else {
            $data = array(
                'fiches_contenu' => $this->input->post('fiches_contenu'),
                'categorie_id' => $this->input->post('categorie'),
            );
            $datas = $this->fiches->getFicheByCategorieAndFiche($this->input->post('categorie'),$this->input->post('fiches_contenu')) ;
            if(count($datas) > 0) {
                $this->load->view('admin/fiches', array(
                    'fiches' => $this->fiches->getAllFiches(),
                    'categorie' => $this->categorie->getAllCategorie(),
                    'exists' => true ,
                ));
            }
            else {
                $this->fiches->registerFiches($data);
                $this->load->view('admin/fiches', array(
                    'fiches' => $this->fiches->getAllFiches(),
                    'categorie' => $this->categorie->getAllCategorie(),
                )) ;
            }
            
        }
    }

    public function supprimer()
    {
        $this->__auth();
        $this->fiches->deleteFiches($this->input->post('id'));
        // redirect('fiches') ;
        $this->load->view('admin/fiches', array(
            'fiches' => $this->fiches->getAllFiches(),
            'categorie' => $this->categorie->getAllCategorie(),
            'deleted' => true,
        ));
    }
    public function modifier($id)
    {
        $this->__auth();
        $data = array(
            'fiches_contenu' => $this->input->post('fiches_contenu'),
            'categorie_id' => $this->input->post("categorie"),
        );
        $this->fiches->updateFiches($data, $id);
        redirect('fiches');
    }
}
