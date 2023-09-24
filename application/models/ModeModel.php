<?php

    class ModeModel extends CI_Model {
        public function registerMode($data) {
            $this->db->insert('mode', $data);
        }
        public function getAllMode() {
            $query = $this->db->get('mode');
            return $query->result() ;
        }
        public function deleteMode($id) {
            $this->db->where('mode_id', $id);
            $this->db->delete('mode');
        }

        public function updateMode($nom, $id) {
            $data = array(
                'mode_nom' => $nom,
            );
            
            $this->db->where('mode_id', $id);
            $this->db->update('mode', $data);
        }
    }