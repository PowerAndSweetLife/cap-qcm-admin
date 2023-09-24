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
            "agent_fipu_compte" => $this->utilisateur->getFiPuUsers() ,
            "attache_compte" => $this->utilisateur->getAttacheUsers() ,
            "agent_fipu_connexion" => $this->utilisateur->getFiPuUsersConnexion() ,
            "attache_connexion" => $this->utilisateur->getAttacheUsersConnexion() ,
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

    public function getCompteCree() {
        $date1 = $this->input->post('date1') ;
        $date2 = $this->input->post('date2') ;
        // var_dump($date1) ;
        // var_dump($date2) ;
        $resultat1 = $this->utilisateur->getFiPuUsers($date1,$date2) ;
        $resultat2 = $this->utilisateur->getAttacheUsers($date1,$date2) ;
        echo json_encode(["total" => (count($resultat1) + count($resultat2)), "resultat1" => count($resultat1), "resultat2" => count($resultat2)]) ;
    }

    public function getCompteConnexion() {
        $date1 = $this->input->post('date1') ;
        $date2 = $this->input->post('date2') ;
        // var_dump($date1) ;
        // var_dump($date2) ;
        $resultat1 = $this->utilisateur->getFiPuUsersConnexion($date1,$date2) ;
        $resultat2 = $this->utilisateur->getAttacheUsersConnexion($date1,$date2) ;
        echo json_encode(["total" => (count($resultat1) + count($resultat2)), "resultat1" => count($resultat1), "resultat2" => count($resultat2)]) ;
    }
}
