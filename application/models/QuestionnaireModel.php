<?php

class QuestionnaireModel extends CI_Model
{

    public function addQuestion($data)
    {
        $this->db->insert('question', $data);
    }
    public function updateQuestion($data,$id)
    {

        $this->db->where('question_id', $id);
        $this->db->update('question', $data);
    }
    public function getLatestQuestion()
    {
        $this->db->select('*');
        $this->db->from('question');
        $this->db->order_by('question_id', 'DESC');
        $data = $this->db->get()->result();
        return $data[0]->question_id;
    }

    public function addReponse($data)
    {
        $this->db->insert('reponse', $data);
    }
    public function deleteReponse($id)
    {
        $this->db->where('question_id', $id);
        $this->db->delete('reponse');
    }
    public function deleteQuestionnaire($id)
    {
        $this->db->where('reponses_id', $id);
        $this->db->delete('reponses');
    }
}
