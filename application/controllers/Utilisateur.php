<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Utilisateur extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("UtilisateurModel", "utilisateur");
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
        $this->load->view('admin/utilisateur', array(
            'utilisateur' => $this->utilisateur->showAllUtilisateur(),
        ));
    }

    public function filter() {
        $this->__auth() ;
        $this->load->view('admin/utilisateur', array(
            'utilisateur' => $this->utilisateur->showAllUtilisateur($this->input->post('select_type')),
        ));
    }

    public function supprimer()
    {
        $id = $this->input->post('id');

        $this->utilisateur->delete($id);

        $this->load->view('admin/utilisateur', array(
            'utilisateur' => $this->utilisateur->showAllUtilisateur(),
            'success' => true,
        ));
    }

    public function ajoutLimit()
    {
        $id = $this->input->post('id');
        $limit = $this->input->post("session_limit");
        $this->utilisateur->updateLimit($id, $limit);

        $this->load->view('admin/utilisateur', array(
            'utilisateur' => $this->utilisateur->showAllUtilisateur(),
            'success' => true,
        ));
    }
    public function overview()
    {
        $data = array(
            "attache" => $this->utilisateur->getUtilisateurByType("attache_admin"),
            "agent_fipu" => $this->utilisateur->getUtilisateurByType("fipu"),

        );

        $this->load->view("admin/overview", $data);
        
    }

    public function block($id) {
        $this->utilisateur->updateLimit($id, '-1');

        $this->load->view('admin/utilisateur', array(
            'utilisateur' => $this->utilisateur->showAllUtilisateur(),
            'success' => true,
        ));
    }
}
