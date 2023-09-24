<?php

    class LoginModel extends CI_Model {
        public function getUserByPseudoAndPass($pseudo, $pass) {
            $this->db->select('users_pseudo, users_password') ;
            $this->db->from('users') ;
            $this->db->where('users_pseudo', $pseudo) ; 
            $this->db->where('users_password', sha1($pass)) ;
            $query = $this->db->get() ;
            return $query->result() ;
        }
    }