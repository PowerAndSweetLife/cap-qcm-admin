<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Parametres extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ParametresModel', 'parametres');
    }
    public function __auth() {
        if(!$this->session->userdata('connected')) {
            $this->load->view('login') ;
        }
    }
    public function index()
    {
        $this->__auth() ;
        $this->load->view('admin/params', array(
            'users' => $this->parametres->getUser() ,
        ));
    }

    public function updateUser()
    {
        $this->__auth() ;
        $data = array(
            'users_pseudo' => $this->input->post('users_pseudo') ,
            'users_password' => sha1($this->input->post('users_password')) ,
            'users_plain_password' => $this->input->post('users_password') ,
        ) ;
        $this->parametres->changeUserInfo($data);
        session_destroy() ;
        $this->load->view('login') ;
    }
}
