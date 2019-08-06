<?php
class Login_Model extends CI_Model{
    public function checkLogin($userEmail,$userPassword){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('userEmail',$userEmail);
        $this->db->where('userPassword',$userPassword);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
}

