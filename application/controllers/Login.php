<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Login extends CI_Controller {
        public function __construct() {
            parent::__construct() ;
            $this->load->model('LoginModel','login') ;
        }
        public function index() {
            $this->load->view('login') ;
        }

        

        public function auth() {
            $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

            $this->form_validation->set_rules('pseudo','pseudo','required',array(
                'required' => "Ce champ est obligatoire" ,
            )) ;
            $this->form_validation->set_rules('password','password','required|min_length[5]',array(
                'required' => "Ce champ est obligatoire" ,
                'min_length' => "Le mot de passe doit contenir au moins 5 carateres !",    
            )) ;
            

            if($this->form_validation->run() === FALSE) {
                $this->load->view('login') ;
            }
            else {
                $pseudo = $this->input->post('pseudo') ;
                $passwd = $this->input->post('password') ;
                $data = $this->login->getUserByPseudoAndPass($pseudo,$passwd) ;
                if(count($data) > 0) {
                    $_SESSION['user'] = $data[0]->users_pseudo ;
                    $_SESSION['connected'] = true ;
                    redirect('overview') ;
                }
                else {
                    $this->load->view('login',array(
                        'error' => 'Vous n\'etes pas autorise a entrer' ,
                    )) ;
                }
            }
        }

        public function deconnect() {
            session_destroy() ;
            $this->load->view('login') ;
        }
    }