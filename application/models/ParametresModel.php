<?php
class ParametresModel extends CI_Model
{
    public function changeUserInfo($data)
    {
        $this->db->select('*');
        $this->db->from('users');
        $req = $this->db->get()->result();
        $id = $req[0]->users_id;
        $this->db->where('users_id', $id);
        $this->db->update('users', $data);
    }
    public function getUser() {
        $this->db->select('*');
        $this->db->from('users');
        $req = $this->db->get()->result();
        return $req ;
    }
}
