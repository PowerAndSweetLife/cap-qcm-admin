<?php

    class TitresModel extends CI_Model {
        public function getAllTitres() {
            $data = $this->db->query("SELECT DISTINCT(titre) FROM question")->result() ;
            $d = [] ;
            for($i = 0; $i < count($data); $i++) {
                $hey = $this->db->query("SELECT DISTINCT(mot_cle) FROM question WHERE titre='{$data[$i]->titre}'")->result() ;
                $data[$i]->mot_cle = $hey[0]->mot_cle ;
            }
            return $data ;
        }
    }