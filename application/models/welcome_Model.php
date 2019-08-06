<?php
class welcome_Model extends CI_Model{
    public function addMeal($data){
        $this->db->insert('totalmeal',$data);
    }
    public function getTotalMeal(){
        $thisMonth = date("m") ;
 
        $this->db->select('*');
        $this->db->from('totalmeal');
        $this->db->where('month',$thisMonth);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function search_Meal() {
        $thisMonth = date("Y-m-d");

        $this->db->select('*');
        $this->db->from('totalmeal');
        $this->db->where('date', $thisMonth);
        $query_result = $this->db->get();
        $result = $query_result->result();
        if ($result == TRUE) {
            return "TRUE";
        } else {
            return "False";
        }
    }
    public function add_employee($em_info){
        $this->db->insert('user',$em_info);
    }
    
    public function all_employee(){
        $this->db->select('*');
        $this->db->from('user');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    function update_personal_info($data,$userID){
        $this->db->where('userID', $userID); //which row want to upgrade  
        $this->db->update('user', $data);  //table name
    }
    function profile(){
        $userID = $this->session->userdata('userID'); 
        
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('userID',$userID);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    function change_profile($picture){
        $userID = $this->session->userdata('userID'); 
        $this->db->where('userID', $userID); //which row want to upgrade  
        $this->db->update('user', $picture);  //table name
    }
    
    function check_Password($old_pass,$userID){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('userID',$userID);
        $this->db->where('userPassword',$old_pass);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    public function reset_Password($userID,$data){
        $this->db->where('userID', $userID); //which row want to upgrade  
        $this->db->update('user', $data);  //table name
    }
    function employee_profile(){
        $userID = $this->uri->segment(3);
        
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('userID',$userID);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    function number_of_employee(){
        $this->db->select('*');
        $this->db->from('user');
        $query_result = $this->db->get()->num_rows();
        return $query_result;
    }

    function update_meal_of_user($userID, $total_meal) {
        $this->db->set('total_meal', $total_meal);
        $this->db->where('userID', $userID);
        $this->db->update('user');
    }
    function month_list(){
        $this->db->select('month');
        $this->db->from('totalmeal');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function getPDF($thisMonth){
        $this->db->select('*');
        $this->db->from('totalmeal');
        $this->db->where('month',$thisMonth);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

}

?>