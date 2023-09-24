<?php

class FichesModel extends CI_Model
{
    public function registerFiches($data)
    {
        $this->db->insert('fiches', $data);
    }
    public function getAllFiches()
    {
        $query = $this->db->query("SELECT * FROM fiches LEFT JOIN categorie ON fiches.categorie_id=categorie.categorie_id");
        return $query->result();
    }
    public function getFicheByCategorieAndFiche($id,$fiche) {
        $query = $this->db->query("SELECT * FROM fiches WHERE categorie_id='".$id."' AND fiches_contenu='".$fiche."'") ;
        return $query->result() ;
    }
    public function deleteFiches($id)
    {
        $this->db->where('fiches_id', $id);
        $this->db->delete('fiches');
    }

    public function updateFiches($data, $id)
    {
        // $data = array(
        //     'fiches_contenu' => $nom,
        // );

        $this->db->where('fiches_id', $id);
        $this->db->update('fiches', $data);
    }
}
