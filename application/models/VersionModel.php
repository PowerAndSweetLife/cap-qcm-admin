<?php
    class VersionModel extends CI_Model {
        public function alterVersion($version) {
            $this->db->query("UPDATE etat SET etat_version='$version'") ;
        }
        public function getVersion() {
            return $this->db->query("SELECT * FROM etat WHERE 1")->result() ;
        }
    }