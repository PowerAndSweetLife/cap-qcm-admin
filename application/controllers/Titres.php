<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Titres extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('TitresModel', 'titres');
    }
    public function __auth() {
        if(!$this->session->userdata('connected')) {
            $this->load->view('login') ;
        }
    }
    public function index()
    {
        $this->__auth() ;
        $this->load->view('admin/titres', array(
            'titres' => $this->titres->getAllTitres() ,
        ));
    }

    
}
