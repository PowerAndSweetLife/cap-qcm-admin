<?php

class CalibrageModel extends CI_Model
{
    // public function getAllData
    public function getBy($data)
    {
        // $this->db->select('*');
        // $this->db->from('question');
        // $this->db->join('section', 'section.section_id=question.section_id');
        // $this->db->like('question.titre', $data['titre'],'both');
        // $this->db->or_like('question.mot_cle', $data['mot_cle'],'both');
        // $this->db->query("SELECT * FROM question INNER JOIN section ON question.section_id=section.section_id WHERE question.titre LIKE '%".$data['titre']."%' OR question.mot_cle LIKE '%".$data['mot_cle']."%'") ;
        // $d = $this->db->get()->result();

        if ($data["titre"] != "") {
            if ($data["mot_cle"] != "") {
                $d = $this->db->query("SELECT DISTINCT(section.section_id) FROM question INNER JOIN section ON question.section_id=section.section_id WHERE question.titre LIKE '%" . $data['titre'] . "%' OR question.mot_cle LIKE '%" . $data['mot_cle'] . "%' AND section.categorie_id='" . $data['categ'] . "'")->result();
            } else {
                $d = $this->db->query("SELECT DISTINCT(section.section_id) FROM question INNER JOIN section ON question.section_id=section.section_id WHERE question.titre LIKE '%" . $data['titre'] . "%' AND section.categorie_id='" . $data['categ'] . "'")->result();
            }
        } else if ($data["mot_cle"] != "") {
            if ($data["titre"] != "") {
                $d = $this->db->query("SELECT DISTINCT(section.section_id) FROM question INNER JOIN section ON question.section_id=section.section_id WHERE question.titre LIKE '%" . $data['titre'] . "%' OR question.mot_cle LIKE '%" . $data['mot_cle'] . "%' AND section.categorie_id='" . $data['categ'] . "'")->result();
            } else {
                $d = $this->db->query("SELECT DISTINCT(section.section_id) FROM question INNER JOIN section ON question.section_id=section.section_id WHERE question.mot_cle LIKE '%" . $data['mot_cle'] . "%' AND section.categorie_id='" . $data['categ'] . "'")->result();
            }
        }
        if (count($d) > 0) {
            for ($q = 0; $q < count($d); $q++) {
                if ($data["titre"] != "") {
                    if ($data["mot_cle"] != "") {
                        $de = $this->db->query("SELECT * FROM question INNER JOIN section ON question.section_id=section.section_id WHERE (question.titre LIKE '%" . $data['titre'] . "%' OR question.mot_cle LIKE '%" . $data['mot_cle'] . "%') AND section.section_id='{$d[$q]->section_id}' AND section.categorie_id='" . $data['categ'] . "'")->result();
                    } else {
                        $de = $this->db->query("SELECT * FROM question INNER JOIN section ON question.section_id=section.section_id WHERE (question.titre LIKE '%" . $data['titre'] . "%') AND section.section_id='{$d[$q]->section_id}' AND section.categorie_id='" . $data['categ'] . "'")->result();
                    }
                } else if ($data["mot_cle"] != "") {
                    if ($data["titre"] != "") {
                        $de = $this->db->query("SELECT * FROM question INNER JOIN section ON question.section_id=section.section_id WHERE (question.titre LIKE '%" . $data['titre'] . "%' OR question.mot_cle LIKE '%" . $data['mot_cle'] . "%') AND section.section_id='{$d[$q]->section_id}' AND section.categorie_id='" . $data['categ'] . "'")->result();
                    } else {
                        $de = $this->db->query("SELECT * FROM question INNER JOIN section ON question.section_id=section.section_id WHERE (question.mot_cle LIKE '%" . $data['mot_cle'] . "%') AND section.section_id='{$d[$q]->section_id}' AND section.categorie_id='" . $data['categ'] . "'")->result();
                    }
                }
                if (count($de) > 0) {
                    $count = 0;
                    for ($a = 0; $a < count($de); $a++) {
                        $dx = $this->db->query("SELECT COUNT(reponse_id) AS nbre_reponse FROM reponse WHERE question_id='" . $de[$a]->question_id . "'")->result();
                        $nbre_reponse = +$dx[0]->nbre_reponse;

                        if ($nbre_reponse > 0) {
                            $count++;
                        }
                    }


                    $d[$q]->question = $de;
                    $d[$q]->nbre_question = count($de);
                    $d[$q]->nbre_reponse =  $count;
                    $d[$q]->section_nom = $de[0]->section_nom;
                } else {
                    $d = null ;
                }
            }
        }

        return $d;
    }

    public function getQRModel($data)
    {


        if ($data["titre"] != "") {
            if ($data["mot_cle"] != "") {
                $d = $this->db->query("SELECT * FROM question WHERE (question.titre LIKE '%" . $data['titre'] . "%' OR question.mot_cle LIKE '%" . $data['mot_cle'] . "%') AND section_id='" . $data['id'] . "'")->result();

                for ($i = 0; $i < count($d); $i++) {
                    $r = $this->db->query("SELECT COUNT(reponse_id) AS nbre_reponse FROM reponse WHERE question_id='" . $d[$i]->question_id . "'")->result();
                    if ($r[0]->nbre_reponse > 0) {
                        $count = 0;
                        $count++;
                        $d[$i]->nbre_reponse = $count;
                    } else {
                        $d[$i]->nbre_reponse = 0;
                    }
                }

                return $d;
            } else {
                $d = $this->db->query("SELECT * FROM question WHERE question.titre LIKE '%" . $data['titre'] . "%' AND section_id='" . $data['id'] . "'")->result();
                for ($i = 0; $i < count($d); $i++) {
                    $r = $this->db->query("SELECT COUNT(reponse_id) AS nbre_reponse FROM reponse WHERE question_id='" . $d[$i]->question_id . "'")->result();
                    if ($r[0]->nbre_reponse > 0) {
                        $count = 0;
                        $count++;
                        $d[$i]->nbre_reponse = $count;
                    } else {
                        $d[$i]->nbre_reponse = 0;
                    }
                }
                return $d;
            }
        } else if ($data["mot_cle"] != "") {
            if ($data["titre"] != "") {
                $d = $this->db->query("SELECT * FROM question WHERE (question.titre LIKE '%" . $data['titre'] . "%' OR question.mot_cle LIKE '%" . $data['mot_cle'] . "%') AND section_id='" . $data['id'] . "'")->result();
                for ($i = 0; $i < count($d); $i++) {
                    $r = $this->db->query("SELECT COUNT(reponse_id) AS nbre_reponse FROM reponse WHERE question_id='" . $d[$i]->question_id . "'")->result();
                    if ($r[0]->nbre_reponse > 0) {
                        $count = 0;
                        $count++;
                        $d[$i]->nbre_reponse = $count;
                    } else {
                        $d[$i]->nbre_reponse = 0;
                    }
                }
                return $d;
            } else {
                $d = $this->db->query("SELECT * FROM question WHERE question.mot_cle LIKE '%" . $data['mot_cle'] . "%' AND section_id='" . $data['id'] . "'")->result();
                for ($i = 0; $i < count($d); $i++) {

                    $r = $this->db->query("SELECT COUNT(reponse_id) AS nbre_reponse FROM reponse WHERE question_id='" . $d[$i]->question_id . "'")->result();

                    if ($r[0]->nbre_reponse > 0) {
                        $count = 0;
                        $count++;
                        $d[$i]->nbre_reponse = $count;
                    } else {
                        $d[$i]->nbre_reponse = 0;
                    }
                }
                return $d;
            }
        }
    }

    public function getQRModelShowAll($data)
    {
        if ($data["titre"] != "") {
            if ($data["mot_cle"] != "") {
                $d = $this->db->query("SELECT * FROM question WHERE (question.titre LIKE '%" . $data['titre'] . "%' OR question.mot_cle LIKE '%" . $data['mot_cle'] . "%') AND section_id='" . $data['id'] . "'")->result();

                for ($i = 0; $i < count($d); $i++) {
                    $r = $this->db->query("SELECT COUNT(reponse_id) AS nbre_reponse FROM reponse WHERE question_id='" . $d[$i]->question_id . "'")->result();
                    $x = $this->db->query("SELECT * FROM reponse WHERE question_id='" . $d[$i]->question_id . "'")->result();
                    if ($r[0]->nbre_reponse > 0) {

                        $count = 0;
                        $count++;
                        $d[$i]->nbre_reponse = $count;
                        $d[$i]->reponses = $x;
                    } else {
                        $d[$i]->nbre_reponse = 0;
                        $d[$i]->reponses = [];
                    }
                }

                return $d;
            } else {
                $d = $this->db->query("SELECT * FROM question WHERE question.titre LIKE '%" . $data['titre'] . "%' AND section_id='" . $data['id'] . "'")->result();
                for ($i = 0; $i < count($d); $i++) {
                    $r = $this->db->query("SELECT COUNT(reponse_id) AS nbre_reponse FROM reponse WHERE question_id='" . $d[$i]->question_id . "'")->result();
                    $x = $this->db->query("SELECT * FROM reponse WHERE question_id='" . $d[$i]->question_id . "'")->result();
                    if ($r[0]->nbre_reponse > 0) {
                        $count = 0;
                        $count++;
                        $d[$i]->nbre_reponse = $count;
                        $d[$i]->reponses = $x;
                    } else {
                        $d[$i]->nbre_reponse = 0;
                        $d[$i]->reponses = [];
                    }
                }
                return $d;
            }
        } else if ($data["mot_cle"] != "") {
            if ($data["titre"] != "") {
                $d = $this->db->query("SELECT * FROM question WHERE (question.titre LIKE '%" . $data['titre'] . "%' OR question.mot_cle LIKE '%" . $data['mot_cle'] . "%') AND section_id='" . $data['id'] . "'")->result();
                for ($i = 0; $i < count($d); $i++) {
                    $r = $this->db->query("SELECT COUNT(reponse_id) AS nbre_reponse FROM reponse WHERE question_id='" . $d[$i]->question_id . "'")->result();
                    $x = $this->db->query("SELECT * FROM reponse WHERE question_id='" . $d[$i]->question_id . "'")->result();
                    if ($r[0]->nbre_reponse > 0) {
                        $count = 0;
                        $count++;
                        $d[$i]->nbre_reponse = $count;
                        $d[$i]->reponses = $x;
                    } else {
                        $d[$i]->nbre_reponse = 0;
                        $d[$i]->reponses = [];
                    }
                }
                return $d;
            } else {
                $d = $this->db->query("SELECT * FROM question WHERE question.mot_cle LIKE '%" . $data['mot_cle'] . "%' AND section_id='" . $data['id'] . "'")->result();
                for ($i = 0; $i < count($d); $i++) {

                    $r = $this->db->query("SELECT COUNT(reponse_id) AS nbre_reponse FROM reponse WHERE question_id='" . $d[$i]->question_id . "'")->result();
                    $x = $this->db->query("SELECT * FROM reponse WHERE question_id='" . $d[$i]->question_id . "'")->result();
                    if ($r[0]->nbre_reponse > 0) {
                        $count = 0;
                        $count++;
                        $d[$i]->nbre_reponse = $count;
                        $d[$i]->reponses = $x;
                    } else {
                        $d[$i]->nbre_reponse = 0;
                        $d[$i]->reponses = [];
                    }
                }
                return $d;
            }
        }
    }

    public function deleteQR($id)
    {
        $this->db->where('question_id', $id);
        $this->db->delete('reponse');

        $this->db->where('question_id', $id);
        $this->db->delete('question');
    }

    public function deleteQRByIDQuestion($id)
    {
        $this->db->where('question_id', $id);
        $this->db->delete('reponse');
    }

    public function getSectionId($id)
    {
        $this->db->select("*");
        $this->db->from("question");
        $this->db->join("section", "section.section_id=question.section_id");
        $this->db->where("question_id", $id);
        return $this->db->get()->result();
    }

    public function getQRById($id)
    {
        $this->db->select('*');
        $this->db->from("reponse");
        $this->db->where("question_id", $id);
        return $this->db->get()->result();
    }

    public function authentification()
    {
    }
}
