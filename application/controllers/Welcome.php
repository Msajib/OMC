<?php

defined('BASEPATH') OR exit('No direct script access allowed');

//    require_once("./vendor/dompdf/dompdf/autoload.inc.php");
//    use Dompdf\Dompdf;

class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('welcome_Model', 'W', TRUE);
    }

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index() {
        if ($this->session->userdata('userName') == NULL) {
            redirect('Login/index');
        } else {
            $data = array();
            $data['header'] = $this->load->view('OMC/master/header');
            $data['all_employee'] = $this->W->all_employee();
//            echo'<pre>';
//            print_r($data['all_employee']);
//            exit();
//            $data['employee_list'] = $this->W->employeeList();
            $data['home'] = $this->load->view('OMC/home', $data);
                
            $this->load->view('OMC/master/fotter', $data);
        }
    }

    public function totalMeal() {
        if ($this->session->userdata('userName') == NULL) {
            redirect('Login/index');
        } else {
            $data = array();
            $data['header'] = $this->load->view('OMC/master/header');
            $data['all_employee'] = $this->W->all_employee();
            $data['menu'] = $this->load->view('OMC/master/menu', $data);
            $data['totalMeal'] = $this->W->getTotalMeal();
            $data['menu'] = $this->load->view('OMC/total_Meal', $data);

            $this->load->view('OMC/master/fotter', $data);
        }
    }

    public function addMeal() {
        if ($this->session->userdata('userName') == NULL) {
            redirect('Login/index');
        } else {
            $number_of_employee = $this->W->number_of_employee();
            

            $data = array();
            $data['count'] = $this->input->post('meal', TRUE);
            $data['date'] = $this->input->post('date', TRUE);
            $data['month'] = date("m");
            $data['user'] = $this->session->userdata('userName');
            if ($data['count'] == $number_of_employee) {
                 $this->W->addMeal($data);
                 $list_employee = $this->W->all_employee();
                 $addition = 1;
                 foreach ($list_employee as $key =>$list){
                     $userID = $list->userID;
                     $total_meal = $addition;
                     $this->W->update_meal_of_user($userID,$total_meal);
                 }
                 exit();
            }    
            else {
                $this->W->addMeal($data);
                echo 'false';
            }
        }
    }

    public function profile() {
        if ($this->session->userdata('userName') == NULL) {
            redirect('Login/index');
        } else {
            $data = array();
            $data['header'] = $this->load->view('OMC/master/header');
            $data['profile_info'] = $this->W->profile();
            $data['all_employee'] = $this->W->all_employee();
            $data['menu'] = $this->load->view('OMC/master/menu', $data);
            $data['prfile'] = $this->load->view('OMC/profile');
            $this->load->view('OMC/master/fotter', $data);
        }
    }

    public function signout() {
        session_destroy();
        $this->load->view('Admin/login_Page');
    }

    public function search_Meal() {
        $result = $this->W->search_Meal();
        print_r($result);
    }

    public function add_new_member() {
        if ($this->session->userdata('userName') == NULL) {
            redirect('Login/index');
        } else {
            $data = array();
            $data['header'] = $this->load->view('OMC/master/header');
            $data['all_employee'] = $this->W->all_employee();
            $data['menu'] = $this->load->view('OMC/master/menu', $data);
            $data['prfile'] = $this->load->view('OMC/add_new_member');
            $this->load->view('OMC/master/fotter', $data);
        }
    }

    public function getPDF() {
        $thisMonth = $this->uri->segment('3');
        
        $dompdf = new Dompdf\Dompdf();
        $dompdf->set_paper("A4");

        $data = array();
        $data['totalMeal'] = $this->W->getPDF($thisMonth);
        $html = $this->load->view('PDF/totalMeal', $data, true);
//        // load the html content
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream("sample.pdf", array("Attachment" => 0));
    }

    public function add_employee() {
        $config = array(
            'upload_path' => "image/employee/",
            'allowed_types' => "gif|jpg|png|jpeg|pdf",
            'overwrite' => TRUE,
            'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
            'max_height' => "768",
            'max_width' => "1024"
        );

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('image')) {
            echo $this->upload->display_errors();
        } else {
            $data = $this->upload->data();

            $em_info = array();

            $em_info['userEmail'] = $this->input->post('email', TRUE);
            $em_info['userPassword'] = $this->input->post('password', TRUE);
            $em_info['userName'] = $this->input->post('employee_name', TRUE);
            $em_info['picture'] = base_url() . $config['upload_path'] . $data['file_name'];
//            print_r($em_info);
//            exit();
            $this->W->add_employee($em_info);
            redirect('Welcome/add_new_member');
        }
    }

    function update_personal_info() {
        $data = array();
        $data['userName'] = $this->input->post('userName', TRUE);
        $data['userEmail'] = $this->input->post('userEmail', TRUE);
        $data['total_meal'] = $this->input->post('total_meal', TRUE);

        $userID = $this->input->post('userID', TRUE);
//        print_r($userID);
//            exit();
        $this->W->update_personal_info($data, $userID);
        $successfully_update = array();
        $successfully_update['success'] = "Information Updated Successfully";
        $this->session->set_flashdata($successfully_update);
        redirect('Welcome/profile');
    }

    function change_profile() {
        $config = array(
            'upload_path' => "image/employee/",
            'allowed_types' => "gif|jpg|png|jpeg|pdf",
            'overwrite' => TRUE,
            'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
            'max_height' => "768",
            'max_width' => "1024"
        );

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('image')) {
            echo $this->upload->display_errors();
        } else {
            $data = $this->upload->data();
            $picture = array();
            $picture['picture'] = base_url() . $config['upload_path'] . $data['file_name'];

            $this->W->change_profile($picture);
            $successfully_update = array();
            $successfully_update['picture_updated'] = "Information Updated Successfully";
            $this->session->set_flashdata($successfully_update);
            redirect('Welcome/profile');
        }
    }
    function password_change(){
        if ($this->session->userdata('userName') == NULL) {
            redirect('Login/index');
        } else {
            $data = array();
            $data['header'] = $this->load->view('OMC/master/header');
            $data['menu'] = $this->load->view('OMC/master/menu');
            $data['prfile'] = $this->load->view('OMC/change_password');
            $this->load->view('OMC/master/fotter', $data);
        }
    }
    function reset_Password(){
        $userID = $this->session->userdata('userID');
        $old_pass = $this->input->post('userPassword', TRUE);
        $result = $this->W->check_Password($old_pass,$userID);
        if($result == TRUE){
        $data = array();
        $data['userPassword'] = $this->input->post('reType', TRUE);
        $this->W->reset_Password($userID,$data);
        $successfully_update = array();
        $successfully_update['password_change'] = "Password Change Successfully";
        $this->session->set_flashdata($successfully_update);
        redirect('Welcome/password_change');
        }
 else {
     $successfully_update = array();
        $successfully_update['password_change_error'] = "Something Error goin on";
        $this->session->set_flashdata($successfully_update);
        redirect('Welcome/password_change');
 }
    }

    public function employee_profile() {
        if ($this->session->userdata('userName') == NULL) {
            redirect('Login/index');
        } else {
            $data = array();
            $data['header'] = $this->load->view('OMC/master/header');
            $data['all_employee'] = $this->W->all_employee();
            $data['employee_profile'] = $this->W->employee_profile();
            $data['menu'] = $this->load->view('OMC/master/menu', $data);
            $data['prfile'] = $this->load->view('OMC/employee_profile');
            $this->load->view('OMC/master/fotter', $data);
        }
    }
    function add_Today_Meal(){
                $meal_add = array();
                $meal_add['userID'] = $this->input->post('employee_id[]', TRUE);
                $meal_add['total_meal'] = $this->input->post('employee_meal[]', TRUE);
                for($i = 0;$i < count($meal_add['userID']);$i++){
//                $userID = $this->input->post('employee_id', TRUE);
                $userID = $meal_add['userID'][$i];
                $total_meal = $meal_add['total_meal'][$i];
                $this->W->update_meal_of_user($userID,$total_meal);
//                echo'<pre>';
//                print_r($userID."</br>");
//                print_r($total_meal);
//                exit();
                }
                redirect('Welcome/index');

                
            
    }
    function monthly_reports_pdf(){
        if ($this->session->userdata('userName') == NULL) {
            redirect('Login/index');
        } else {
            $data = array();
            $data['header'] = $this->load->view('OMC/master/header');
            $data['all_employee'] = $this->W->all_employee();
            $data['menu'] = $this->load->view('OMC/master/menu', $data);
            $data['prfile'] = $this->load->view('OMC/monthly_report');
            $this->load->view('OMC/master/fotter', $data);
        }
    }
    function meal_update(){
        $data = array();
        $data['date'] = $this->input->post('date', TRUE);
    }

}
