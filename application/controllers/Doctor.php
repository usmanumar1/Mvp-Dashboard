<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Doctor extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'request'));
        $this->load->library(array('pagination', 'session'));
    }

    //Getting all Doctors
    public function index() {
        if (!file_exists(APPPATH . 'views/pages/docListView.php')) {
            show_404();
        }

        if ($this->input->server('REQUEST_METHOD') == "GET") {
            if (!isset($_SESSION['admin'])) {
                redirect('/login');
            }

            $data['title'] = ('Doctors');
            $admin_id = $this->session->admin_id;

            //-----Pagination-------//
            $config["base_url"] = base_url() . "doctors";
            $config['per_page'] = 10;
            $page = ($this->uri->segment(2)) ? ($this->uri->segment(2) - 1) * 10 : 0;
            //If $page = -1
            if ($page < 0) {
                $page = 0;
            }
            $pagination_data = array(
                'limit' => $config['per_page'],
                'start' => $page
            );
            //-----Sending request to API-----//
            $result = sendPostRequest('api/doctors?admin_id=' . $admin_id, $pagination_data);


            if ($result->status == ("error")) {
                show_error("Error in Doctors", "500", "Unauthorized.");
            }

            $config["total_rows"] = $result->doctor_total;
            $this->pagination->initialize($config);
            $data["links"] = $this->pagination->create_links();
            $data['doctors'] = $result->doctors;

            $this->load->view('template/header.php', $data);
            $this->load->view('pages/docListView.php', $data);
        }
    }

    //Getting single doctor
    public function getDoctorProfile() {
        if (!file_exists(APPPATH . 'views/pages/doctorView.php')) {
            show_404();
        }

        if ($this->input->server('REQUEST_METHOD') == "GET") {
            if (!isset($_SESSION['admin'])) {
                redirect('/login');
            }

            $data['title'] = ('Doctor');

            $doctor_id = $this->input->get("doctor_id");

            //-----Pagination-------//
            $config["base_url"] = base_url() . "doctor";
            $config['per_page'] = 10;

            //-----Sending request to API-----//
            $result = sendGetRequest('api/doctor?doctor_id=' . $doctor_id);


            if ($result->status == ("error")) {
                show_error("Error in Doctor", "500", "Unauthorized.");
            }


            $data['doctor'] = $result->doctor;
            $this->load->view('template/header.php', $data);
            $this->load->view('pages/doctorView.php', $data);
        }
    }

    //Getting all Doctors
    public function getDoctorHelp() {
        if (!file_exists(APPPATH . 'views/pages/doctorHelpView.php')) {
            show_404();
        }

        if ($this->input->server('REQUEST_METHOD') == "GET") {
            if (!isset($_SESSION['admin'])) {
                redirect('/login');
            }

            $data['title'] = ('Chat Portal');
            if ($_GET) {
                $doctor_id = $this->input->get('doctor_id');
                $this->session->set_userdata('doctor_id', $doctor_id);
            } else {
                $doctor_id = $this->session->doctor_id;
            }

            //-----Pagination-------//
            $config["base_url"] = base_url() . "help";
            $config['per_page'] = 10;
            $page = ($this->uri->segment(2)) ? ($this->uri->segment(2) - 1) * 10 : 0;
            //If $page = -1
            if ($page < 0) {
                $page = 0;
            }
            $pagination_data = array(
                'limit' => $config['per_page'],
                'start' => $page
            );
            //-----Sending request to API-----//
            $result = sendPostRequest('api/doctor/help?doctor_id=' . $doctor_id, $pagination_data);


            if ($result->status == ("error")) {
                show_error("Error in Doctors", "500", "Unauthorized.");
            }

            $config["total_rows"] = $result->response_total;
            $this->pagination->initialize($config);
            $data["links"] = $this->pagination->create_links();
            $data['responses'] = $result->responses;
            $data['doctor_id'] = $doctor_id;
            $this->load->view('template/header.php', $data);
            $this->load->view('pages/doctorHelpView.php', $data);
        }
    }

    public function newDocSignup() {
        if (!file_exists(APPPATH . 'views/pages/newDocSignupView.php')) {
            show_404();
        }

        if ($this->input->server('REQUEST_METHOD') == "GET") {
            if (!isset($_SESSION['admin'])) {
                redirect('/login');
            }

            $data['title'] = ('Doctors New');
            $admin_id = $this->session->admin_id;

            //-----Pagination-------//
            $config["base_url"] = base_url() . "doctor_new";
            $config['per_page'] = 10;
            $page = ($this->uri->segment(2)) ? ($this->uri->segment(2) - 1) * 10 : 0;
            //If $page = -1
            if ($page < 0) {
                $page = 0;
            }
            $pagination_data = array(
                'limit' => $config['per_page'],
                'start' => $page
            );
            //-----Sending request to API-----//
            $result = sendPostRequest('api/new/doctorsSignup?admin_id=' . $admin_id, $pagination_data);
            //print_r($result);die;

            if ($result->status == ("error")) {
                show_error("Error in Doctors", "500", "Unauthorized.");
            }

            $config["total_rows"] = $result->doctor_total;
            $this->pagination->initialize($config);
            $data["links"] = $this->pagination->create_links();
            $data['doctors'] = $result->doctors;

            $this->load->view('template/header.php', $data);
            $this->load->view('pages/newDocSignupView.php', $data);
        }
    }

    public function resetPassword() {
        if (!file_exists(APPPATH . 'views/pages/resetPasswordView.php')) {
            show_404();
        }

        $action = $this->input->get('action');
        $code = $this->input->get('code');
        $_SESSION['code'] = $code;
        if (isset($code)) {

//            $this->load->view('template/header.php', $data);
            $this->load->view('pages/resetPasswordView.php');
        } else {
        show_404();    
        }
    }

    public function reset_password() {
        if (!file_exists(APPPATH . 'views/pages/newDocSignupView.php')) {
            show_404();
        }
        $errors = array();
        $code = 0;
        if (isset($_SESSION['code'])) {
            $code = $_SESSION['code'];
            $reg = "/^[a-z0-9]{32}$/";
        if (!preg_match($reg, $code)) {
            $errors['error_in_code'] = "Invalid/MIssing Activation Code";
        }
        }
        
        
        if ($this->input->server('REQUEST_METHOD') == "POST") {
            $data['title'] = ('Password');
            $password1 = $this->input->post('password1');
            $password2 = $this->input->post('password2');
            if (empty(trim($password2)) || trim($password2) != trim($password1)) {
                $errors['password_error'] = "Password Mismatched";
            }
            $reg = "/^[a-z0-9]{5,15}$/i";
            if (!preg_match($reg, $password1)) {
                $errors['new_password'] = "Password must be alphabetic/alphanumeric and between 6 to 15 characters";
            }
            if (count($errors) == 0) {

                if (isset($_SESSION['errors'])) {
                    unset($_SESSION['errors']);
                }
                $new_password = array(
                    'doc_password' => $password1,
                    'code' => $code
                );
                //-----Sending request to API-----//
                $result = sendPostRequest('api/resetPassword?code=' . $code, $new_password);
                // print_r($result);
                if ($result->status == ("error")) {
                    show_error("Error in Doctors", "500", $result->msg);
                }
                unset($_SESSION['code']);
//                $this->load->view('template/header.php', $data);
                $this->load->view('pages/resetPasswordSuccessView.php', $data);
            } else {
                $_SESSION['errors'] = $errors;
                $data['errors'] = $_SESSION['errors'];
                $this->load->view('pages/resetPasswordView.php', $data);
            }
        }
    }
    
     public function resetPin() {
        if (!file_exists(APPPATH . 'views/pages/resetPinView.php')) {
            show_404();
        }

        $action = $this->input->get('action');
        $code = $this->input->get('code');
        $_SESSION['code'] = $code;
        if (isset($code)) {

//            $this->load->view('template/header.php', $data);
            $this->load->view('pages/resetPinView.php');
        } else {
        show_404();    
        }
    }

    public function reset_pin() {
        if (!file_exists(APPPATH . 'views/pages/newDocSignupView.php')) {
            show_404();
        }
        $errors = array();
        $code = 0;
        if (isset($_SESSION['code'])) {
            $code = $_SESSION['code'];
            $reg = "/^[a-z0-9]{32}$/";
        if (!preg_match($reg, $code)) {
            $errors['error_in_code'] = "Invalid/MIssing Activation Code";
        }
        }
        
        
        if ($this->input->server('REQUEST_METHOD') == "POST") {
            $data['title'] = ('Pin');
            $pin1 = $this->input->post('pin1');
            $pin2 = $this->input->post('pin2');
            if (empty(trim($pin2)) || trim($pin2) != trim($pin1)) {
                $errors['password_error'] = "Pin Mismatched";
            }
            $reg = "/^[a-z0-9]{3,15}$/i";
            if (!preg_match($reg, $pin1)) {
                $errors['new_password'] = "Pin must be alphabetic/alphanumeric and between 4 to 15 characters";
            }
            if (count($errors) == 0) {

                if (isset($_SESSION['errors'])) {
                    unset($_SESSION['errors']);
                }
                $new_pin = array(
                    'doc_pin' => $pin1,
                    'code' => $code
                );
                //-----Sending request to API-----//
                $result = sendPostRequest('api/resetPin?code=' . $code, $new_pin);
                if ($result->status == ("error")) {
                    show_error("Error in Doctors", "500", $result->msg);
                }
                unset($_SESSION['code']);
//                $this->load->view('template/header.php', $data);
                $this->load->view('pages/resetPasswordSuccessView.php', $data);
            } else {
                $_SESSION['errors'] = $errors;
                $data['errors'] = $_SESSION['errors'];
                $this->load->view('pages/resetPinView.php', $data);
            }
        }
    }

}
