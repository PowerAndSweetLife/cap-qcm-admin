<?php

    class ListesModel extends CI_Model {
        public function getAllListes() {
            return $this->db->query('SELECT * FROM question INNER JOIN section ON section.section_id=question.section_id INNER JOIN categorie ON categorie.categorie_id=section.categorie_id')->result() ;
        }
        public function dropQuestion($id) {
            $this->db->where('question_id', $id);
            $this->db->delete('reponse');

            $this->db->where('question_id', $id);
            $this->db->delete('question');
        }
        public function search($data) {
            $data =  $this->db->query('SELECT * FROM question INNER JOIN section ON section.section_id=question.section_id INNER JOIN categorie ON categorie.categorie_id=section.categorie_id WHERE section.section_id="'.$data['section'].'" AND section.categorie_id="'.$data['categ'].'" AND question.titre="'.$data['fiche'].'"')->result() ;
            if(count($data) > 0) {
                for($i = 0; $i < count($data); $i++) {
                    $d = $this->db->query("SELECT * FROM reponse WHERE question_id='".$data[$i]->question_id."'")->result() ;
                    if(count($d) > 0) {
                        $data[$i]->reponse = $d ;
                    }
                    else {
                        $data[$i]->reponse = [] ;
                    }
                }
                return $data ;
            }
            else {
                return $data ;
            }
        }
        public function searchWithQuestion($data) {
            $data =  $this->db->query('SELECT * FROM question INNER JOIN section ON section.section_id=question.section_id INNER JOIN categorie ON categorie.categorie_id=section.categorie_id WHERE section.section_id="'.$data['section'].'" AND section.categorie_id="'.$data['categ'].'" AND question.titre="'.$data['fiche'].'" AND question.question_text LIKE "%'.$data['question'].'%"')->result() ;
            if(count($data) > 0) {
                for($i = 0; $i < count($data); $i++) {
                    $d = $this->db->query("SELECT * FROM reponse WHERE question_id='".$data[$i]->question_id."'")->result() ;
                    if(count($d) > 0) {
                        $data[$i]->reponse = $d ;
                    }
                    else {
                        $data[$i]->reponse = [] ;
                    }
                }
                return $data ;
            }
            else {
                return $data ;
            }
        }
        public function searchWithQuestionOnly($data) {
            $data =  $this->db->query('SELECT * FROM question INNER JOIN section ON section.section_id=question.section_id INNER JOIN categorie ON categorie.categorie_id=section.categorie_id WHERE question.question_text LIKE "%'.$data['question'].'%"')->result() ;
            if(count($data) > 0) {
                for($i = 0; $i < count($data); $i++) {
                    $d = $this->db->query("SELECT * FROM reponse WHERE question_id='".$data[$i]->question_id."'")->result() ;
                    if(count($d) > 0) {
                        $data[$i]->reponse = $d ;
                    }
                    else {
                        $data[$i]->reponse = [] ;
                    }
                }
                return $data ;
            }
            else {
                return $data ;
            }
        }

        public function getSpecificData($data) {
            $req =  $this->db->query('SELECT * FROM question INNER JOIN section ON section.section_id=question.section_id INNER JOIN categorie ON categorie.categorie_id=section.categorie_id WHERE section.section_id="'.$data['section'].'" AND section.categorie_id="'.$data['categ'].'" AND question.titre="'.$data['fiche'].'" AND question.question_id="'.$data['question_id'].'"')->result() ;
            $res = $this->db->query("SELECT * FROM reponse WHERE question_id='".$data['question_id']."'")->result() ;
            if(count($res) > 0) {
                $req[0]->reponse = $res ;
            }
            else {
                $req[0]->reponse = [] ;
            }
            // if(count($data) > 0) {
            //     for($i = 0; $i < count($data); $i++) {
            //         $d = 
                    
            //     }
            //     return $data ;
            // }
            // else {
            //     return $data ;
            // }
            return $req ;
        }
        public function getSpecificDataWithOnlyID($data) {
            $req =  $this->db->query('SELECT * FROM question INNER JOIN section ON section.section_id=question.section_id INNER JOIN categorie ON categorie.categorie_id=section.categorie_id WHERE question.question_id="'.$data['question_id'].'"')->result() ;
            $res = $this->db->query("SELECT * FROM reponse WHERE question_id='".$data['question_id']."'")->result() ;
            if(count($res) > 0) {
                $req[0]->reponse = $res ;
            }
            else {
                $req[0]->reponse = [] ;
            }
            // if(count($data) > 0) {
            //     for($i = 0; $i < count($data); $i++) {
            //         $d = 
                    
            //     }
            //     return $data ;
            // }
            // else {
            //     return $data ;
            // }
            return $req ;
        }
        public function getSection($id) {
            return $this->db->query("SELECT * FROM section WHERE categorie_id='".$id."'")->result() ;
        }
        public function getFicheBySectionId($id) {
            return $this->db->query("SELECT DISTINCT(titre) FROM question WHERE section_id='".$id."'")->result() ;
        }
        public function getSectionOne($id) {
            return $this->db->query("SELECT * FROM section WHERE section_id='".$id."'")->result() ;
        }
        public function getFiches($id) {
            return $this->db->query("SELECT * FROM fiches INNER JOIN categorie ON fiches.categorie_id=categorie.categorie_id WHERE fiches.categorie_id='".$id."'")->result() ;
        }
    }