<?php
class UtilisateurModel extends CI_Model
{
    public function getUtilisateurByType($type) {
        return $this->db->query("SELECT * FROM clients WHERE user_type='$type'")->result() ;
    }
    public function showAllUtilisateur($type = null)
    {
        if($type != null) {

            $req = "SELECT * FROM clients WHERE user_type='$type'" ;

            $results = $this->db->query($req)->result() ;

            if(count($results) > 0) {
                for($i = 0; $i < count($results); $i++) {
                    $totalFavoris = $this->db->query("SELECT * FROM favoris WHERE clients_id='".$results[$i]->email."'")->result() ;
                    $results[$i]->totalFavoris = count($totalFavoris) ;

                    $select_distinct = $this->db->query("SELECT DISTINCT(date_utilisation) FROM historique_utilisation WHERE id_user='".$results[$i]->id."'")->result() ;
                    $total_section_h = count($select_distinct) ;
                    $totalHeure = $this->db->query("SELECT SUM(total_time) as sommeH FROM historique_utilisation WHERE id_user='".$results[$i]->id."'")->result() ;
                    $results[$i]->totalHeureOK = $totalHeure[0]->sommeH ;
                    $results[$i]->total_jour = $total_section_h ;

                    $utilisation_total = $this->db->query("SELECT * FROM historique_utilisation WHERE id_user='".$results[$i]->id."'")->result() ;
                    $total_session = $this->db->query("SELECT * FROM historique_session WHERE id_user='".$results[$i]->id."'")->result() ;
                    $results[$i]->utilisation_total = count($utilisation_total) ;
                    $results[$i]->total_session = count($total_session) ;

                    $select_distinct_session = $this->db->query("SELECT DISTINCT(date_session) FROM historique_session WHERE id_user='".$results[$i]->id."'")->result() ;
                    $total_session_distinct = count($select_distinct_session) ;

                    $results[$i]->session_groupement = $total_session_distinct ;
                }
            }
            // $query = $this->db->get('clients');
            // $results = $query->result();
            return $results;
        }
        else {
            $req = "SELECT * FROM clients" ;

            $results = $this->db->query($req)->result() ;

            if(count($results) > 0) {
                for($i = 0; $i < count($results); $i++) {
                    $totalFavoris = $this->db->query("SELECT * FROM favoris WHERE clients_id='".$results[$i]->email."'")->result() ;
                    $results[$i]->totalFavoris = count($totalFavoris) ;

                    $select_distinct = $this->db->query("SELECT DISTINCT(date_utilisation) FROM historique_utilisation WHERE id_user='".$results[$i]->id."'")->result() ;
                    $total_section_h = count($select_distinct) ;
                    $totalHeure = $this->db->query("SELECT SUM(total_time) as sommeH FROM historique_utilisation WHERE id_user='".$results[$i]->id."'")->result() ;
                    $results[$i]->totalHeureOK = $totalHeure[0]->sommeH ;
                    $results[$i]->total_jour = $total_section_h ;

                    $utilisation_total = $this->db->query("SELECT * FROM historique_utilisation WHERE id_user='".$results[$i]->id."'")->result() ;
                    $total_session = $this->db->query("SELECT * FROM historique_session WHERE id_user='".$results[$i]->id."'")->result() ;
                    $results[$i]->utilisation_total = count($utilisation_total) ;
                    $results[$i]->total_session = count($total_session) ;

                    $select_distinct_session = $this->db->query("SELECT DISTINCT(date_session) FROM historique_session WHERE id_user='".$results[$i]->id."'")->result() ;
                    $total_session_distinct = count($select_distinct_session) ;

                    $results[$i]->session_groupement = $total_session_distinct ;
                }
            }
            // $query = $this->db->get('clients');
            // $results = $query->result();
            return $results;
        }
        
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('clients');
    }
    public function updateLimit($id,$limit) {
        $this->db->query("UPDATE clients SET limit_session='$limit' WHERE id='$id'") ;
    }

}
