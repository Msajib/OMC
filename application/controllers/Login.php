<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Login_Model', 'L', TRUE);
    }
    public function index(){
        $this->load->view('Admin/login_Page');
    }
    public function checkLogin(){
        $userEmail = $this->input->post('userEmail',TRUE);
        $userPassword = $this->input->post('userPassword',TRUE);
        
        $result = $this->L->checkLogin($userEmail,$userPassword);
        
        if ($result == TRUE) {
            $userInfo = array();
            $userInfo['userName'] = $result->userName;
            $userInfo['userEmail'] = $result->userEmail;
            $userInfo['userImage'] = $result->picture;
            $userInfo['userID'] = $result->userID;
            $userInfo['user_total_meal'] = $result->total_meal;
            
            $this->session->set_userdata($userInfo);

            redirect('Welcome/index');
        }else {
            $error_Message = array();
            $error_Message['Message'] = "Email or Password incorrect...";
            $this->session->set_flashdata($error_Message);
            redirect('Login/index');
        }
    }
}

