<?php

    class CategorieModel extends CI_Model {
        public function registerCategorie($categorie,$datas) {
            $this->db->insert('categorie', $categorie) ;

            $this->db->select('*') ;
            $this->db->from('categorie') ;
            $this->db->order_by('categorie_id','DESC') ;
            $query = $this->db->get() ;
            $data = $query->result() ;
            
            for($i = 0; $i < count($datas); $i++) {
                $this->db->insert('section',array(
                    'categorie_id' => $data[0]->categorie_id ,
                    'section_nom' => $datas[$i] ,
                )) ;
            }
            
        }
        public function getAllCategorie() {
            $query = $this->db->get('categorie');
            $results = $query->result() ;
            $data = [] ;
            

            for($i = 0; $i < count($results); $i++) {
                $id = $results[$i]->categorie_id ;
                $this->db->select('*') ;
                $this->db->from('section') ;
                $this->db->where('categorie_id',$id) ;
                $data = $this->db->get()->result() ;
                $results[$i]->section = $data ;
            }
            return $results ;
        }
        public function getCategories() {
            $query = $this->db->get('categorie');
            $results = $query->result() ;
            return $results ;
        }


        
        public function deleteCategorie($id) {
            $this->db->where('categorie_id', $id);
            $this->db->delete('categorie');

            $this->db->where('categorie_id',$id) ;
            $this->db->delete('section') ;
        }

        public function updateCategorie($nom, $id) {
            $data = array(
                'categorie_nom' => $nom,
            );
            
            $this->db->where('categorie_id', $id);
            $this->db->update('categorie', $data);
        }

        public function getOne($id) {
            $this->db->select('*') ;
            $this->db->from('categorie') ;
            $this->db->where('categorie_id',$id) ;
            $query = $this->db->get();
            $results = $query->result() ;
            $data = [] ;
            

            for($i = 0; $i < count($results); $i++) {
                $id = $results[$i]->categorie_id ;
                $this->db->select('*') ;
                $this->db->from('section') ;
                $this->db->where('categorie_id',$id) ;
                $data = $this->db->get()->result() ;
                $results[$i]->section = $data ;
            }

            if(count($results) > 0) {
                $d = $results[0]->section ;
                for($j = 0; $j < count($d); $j++) {
                    $this->db->select('*') ;
                    $this->db->from('question') ;
                    $this->db->where('section_id',$d[$j]->section_id) ;
                    $q = $this->db->get()->result() ;
                    if(count($q) == 0) {
                        $d[$j]->nbre_question = '0' ;
                        $d[$j]->nbre_reponse = '0' ;
                    }
                    else {
                        $d[$j]->nbre_question = count($q) ;

                        $nbre_reponse = 0 ;
                        for($r = 0; $r < count($q); $r++) {
                            $this->db->select('*') ;
                            $this->db->from('reponse') ;
                            $this->db->where('question_id',$q[$r]->question_id) ;
                            $rep = $this->db->get()->result() ;
                            if(count($rep) > 0) {
                                $nbre_reponse += 1 ;
                            }
                        }
                        $d[$j]->nbre_reponse = $nbre_reponse ;

                    }
                }
            }

            return $results ;
        }

        public function getSections() {
            $query = $this->db->query("SELECT * FROM section INNER JOIN categorie ON section.categorie_id=categorie.categorie_id");
            // $query = $this->db->get('section');

            $results = $query->result() ;
            return $results ;
        }
    }