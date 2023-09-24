<?php

    class ClasseModel extends CI_Model {
        public function registerClasse($data) {
            $this->db->insert('classe', $data);
        }
        public function getAllClasse() {
            $query = $this->db->get('classe');
            return $query->result() ;
        }
        public function deleteClasse($id) {
            $this->db->where('classe_id', $id);
            $this->db->delete('classe');
        }

        public function updateClasse($nom, $id) {
            $data = array(
                'classe_nom' => $nom,
            );
            
            $this->db->where('classe_id', $id);
            $this->db->update('classe', $data);
        }
    }