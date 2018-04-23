<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Question extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'request'));
        $this->load->library(array('pagination', 'session'));
    }

    //Getting all Questions
    public function index() {
        if (!file_exists(APPPATH . 'views/pages/questionView.php')) {
            show_404();
        }

        if ($this->input->server('REQUEST_METHOD') == "GET") {
            if (!isset($_SESSION['admin'])) {
                redirect('/login');
            }

            $data['title'] = ('Questions');
            $admin_id = $this->session->admin_id;

            //-----Pagination-------//
            $config["base_url"] = base_url() . "question";
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
            $result = sendPostRequest('api/questions?admin_id=' . $admin_id, $pagination_data);

            $data['subtitle'] = ('Questions');
            if ($result->status == ("error")) {
                show_error("Error in Questions", "500", "Unauthorized.");
            }



            $config["total_rows"] = $result->question_total;
            $this->pagination->initialize($config);
            $data["links"] = $this->pagination->create_links();
            $data['questions'] = $result->questions;
            $data['faqs'] = $result->faq; //frequently asked question

            $this->load->view('template/header.php', $data);
            $this->load->view('pages/questionView.php', $data);
        }
    }

    public function question_new() {
        if (!file_exists(APPPATH . 'views/pages/questionNewView.php')) {
            show_404();
        }

        if ($this->input->server('REQUEST_METHOD') == "GET") {
            if (!isset($_SESSION['admin'])) {
                redirect('/login');
            }

            $data['title'] = ('Questions New');
            $admin_id = $this->session->admin_id;

            //-----Pagination-------//
            $config["base_url"] = base_url() . "question/question_new";
            $config['per_page'] = 10;
            $page = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) * 10 : 0;
            //If $page = -1
            if ($page < 0) {
                $page = 0;
            }
            $pagination_data = array(
                'limit' => $config['per_page'],
                'start' => $page
            );
            //-----Sending request to API-----//
            $result = sendPostRequest('api/questionsnew/?admin_id=' . $admin_id, $pagination_data);
            $data['subtitle'] = ('Questions');
            if ($result->status == ("error")) {
                show_error("Error in Questions", "500", "Unauthorized.");
            }

            $config["total_rows"] = $result->questionNew_total;
            $this->pagination->initialize($config);
            $data["links"] = $this->pagination->create_links();
            $data['questions'] = $result->questions;
            $data['new_total'] = $result->questionNew_total;
            $data['assigned_total'] = $result->questionAssigned_total;
            $data['answered_total'] = $result->questionAnswered_total;
            $data['uploaded_total'] = $result->questionUploaded_total;
            $data['faq_total'] = $result->questionFaq_total;
            $data['ignoredEtc_total'] = $result->questionIgnoreEtc_total;
            $data['faqs'] = $result->faq; //frequently asked question
            $data['left_sidebar'] = $this->load->view('template/left_sidebar.php', $data, TRUE);
            $this->load->view('template/header.php', $data);
            $this->load->view('pages/questionNewView.php', $data);
        }
    }

    public function question_assigned() {
        if (!file_exists(APPPATH . 'views/pages/questionAssignedView.php')) {
            show_404();
        }

        if ($this->input->server('REQUEST_METHOD') == "GET") {
            if (!isset($_SESSION['admin'])) {
                redirect('/login');
            }

            $data['title'] = ('Questions Assigned');
            $admin_id = $this->session->admin_id;

            //-----Pagination-------//
            $config["base_url"] = base_url() . "question/question_assigned";
            $config['per_page'] = 10;
            $page = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) * 10 : 0;
            //If $page = -1
            if ($page < 0) {
                $page = 0;
            }
            $pagination_data = array(
                'limit' => $config['per_page'],
                'start' => $page
            );
            //-----Sending request to API-----//
            $result = sendPostRequest('api/questionsassigned/?admin_id=' . $admin_id, $pagination_data);
            $data['subtitle'] = ('Questions');
            if ($result->status == ("error")) {
                show_error("Error in Questions", "500", "Unauthorized.");
            }
            $config["total_rows"] = $result->questionAssigned_total;
            $this->pagination->initialize($config);
            $data["links"] = $this->pagination->create_links();
            $data['questions'] = $result->questions;
            $data['new_total'] = $result->questionNew_total;
            $data['assigned_total'] = $result->questionAssigned_total;
            $data['answered_total'] = $result->questionAnswered_total;
            $data['uploaded_total'] = $result->questionUploaded_total;
            $data['faq_total'] = $result->questionFaq_total;
            $data['ignoredEtc_total'] = $result->questionIgnoreEtc_total;
            $data['left_sidebar'] = $this->load->view('template/left_sidebar.php', $data, TRUE);
            $this->load->view('template/header.php', $data);
            $this->load->view('pages/questionAssignedView.php', $data);
        }
    }

    public function question_answered() {
        if (!file_exists(APPPATH . 'views/pages/questionAnsweredView.php')) {
            show_404();
        }

        if ($this->input->server('REQUEST_METHOD') == "GET") {
            if (!isset($_SESSION['admin'])) {
                redirect('/login');
            }

            $data['title'] = ('Questions Answered');
            $admin_id = $this->session->admin_id;

            //-----Pagination-------//
            $config["base_url"] = base_url() . "question/question_answered";
            $config['per_page'] = 10;
            $page = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) * 10 : 0;
            //If $page = -1
            if ($page < 0) {
                $page = 0;
            }
            $pagination_data = array(
                'limit' => $config['per_page'],
                'start' => $page
            );
            //-----Sending request to API-----//
            $result = sendPostRequest('api/questionanswered/?admin_id=' . $admin_id, $pagination_data);
            $data['subtitle'] = ('Questions');
            if ($result->status == ("error")) {
                show_error("Error in Questions", "500", "Unauthorized.");
            }
            $config["total_rows"] = $result->questionAnswered_total;
            $this->pagination->initialize($config);
            $data["links"] = $this->pagination->create_links();
            $data['questions'] = $result->questions;
            $data['new_total'] = $result->questionNew_total;
            $data['assigned_total'] = $result->questionAssigned_total;
            $data['answered_total'] = $result->questionAnswered_total;
            $data['uploaded_total'] = $result->questionUploaded_total;
            $data['faq_total'] = $result->questionFaq_total;
            $data['ignoredEtc_total'] = $result->questionIgnoreEtc_total;
            $data['left_sidebar'] = $this->load->view('template/left_sidebar.php', $data, TRUE);
            $this->load->view('template/header.php', $data);
            $this->load->view('pages/questionAnsweredView.php', $data);
        }
    }

    public function question_uploaded() {
        if (!file_exists(APPPATH . 'views/pages/questionUploadedView.php')) {
            show_404();
        }

        if ($this->input->server('REQUEST_METHOD') == "GET") {
            if (!isset($_SESSION['admin'])) {
                redirect('/login');
            }

            $data['title'] = ('Questions Uploaded');
            $admin_id = $this->session->admin_id;

            //-----Pagination-------//
            $config["base_url"] = base_url() . "question/question_uploaded";
            $config['per_page'] = 10;
            $page = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) * 10 : 0;
            //If $page = -1
            if ($page < 0) {
                $page = 0;
            }
            $pagination_data = array(
                'limit' => $config['per_page'],
                'start' => $page
            );
            //-----Sending request to API-----//
            $result = sendPostRequest('api/questionuploaded/?admin_id=' . $admin_id, $pagination_data);
            $data['subtitle'] = ('Questions');
            if ($result->status == ("error")) {
                show_error("Error in Questions", "500", "Unauthorized.");
            }
            $config["total_rows"] = $result->questionUploaded_total;
            $this->pagination->initialize($config);
            $data["links"] = $this->pagination->create_links();
            $data['questions'] = $result->questions;
            $data['new_total'] = $result->questionNew_total;
            $data['assigned_total'] = $result->questionAssigned_total;
            $data['answered_total'] = $result->questionAnswered_total;
            $data['uploaded_total'] = $result->questionUploaded_total;
            $data['faq_total'] = $result->questionFaq_total;
            $data['ignoredEtc_total'] = $result->questionIgnoreEtc_total;
            $data['uploadedTime'] = $result->uploadedTime;
            $data['left_sidebar'] = $this->load->view('template/left_sidebar.php', $data, TRUE);
            $this->load->view('template/header.php', $data);
            $this->load->view('pages/questionUploadedView.php', $data);
        }
    }

    public function question_faq() {
        if (!file_exists(APPPATH . 'views/pages/questionFaqView.php')) {
            show_404();
        }

        if ($this->input->server('REQUEST_METHOD') == "GET") {
            if (!isset($_SESSION['admin'])) {
                redirect('/login');
            }

            $data['title'] = ('Questions Faq');
            $admin_id = $this->session->admin_id;

            //-----Pagination-------//
            $config["base_url"] = base_url() . "question/question_faq";
            $config['per_page'] = 10;
            $page = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) * 10 : 0;
            //If $page = -1
            if ($page < 0) {
                $page = 0;
            }
            $pagination_data = array(
                'limit' => $config['per_page'],
                'start' => $page
            );
            //-----Sending request to API-----//
            $result = sendPostRequest('api/questionsfaq/?admin_id=' . $admin_id, $pagination_data);
            $data['subtitle'] = ('Questions');
            if ($result->status == ("error")) {
                show_error("Error in Questions", "500", "Unauthorized.");
            }
            $config["total_rows"] = $result->questionFaq_total;
            $this->pagination->initialize($config);
            $data["links"] = $this->pagination->create_links();
            
            $data['questions'] = $result->questions;
            $data['new_total'] = $result->questionNew_total;
            $data['assigned_total'] = $result->questionAssigned_total;
            $data['answered_total'] = $result->questionAnswered_total;
            $data['uploaded_total'] = $result->questionUploaded_total;
            $data['faq_total'] = $result->questionFaq_total;
            $data['ignoredEtc_total'] = $result->questionIgnoreEtc_total;
            $data['totalFaqAssigned'] = $result->totalFaqAssigned;
            $data['left_sidebar'] = $this->load->view('template/left_sidebar.php', $data, TRUE);
            $this->load->view('template/header.php', $data);
            $this->load->view('pages/questionFaqView.php', $data);
        }
    }

    public function question_ignored_etc() {
        if (!file_exists(APPPATH . 'views/pages/questionIgnoredEtcView.php')) {
            show_404();
        }

        if ($this->input->server('REQUEST_METHOD') == "GET") {
            if (!isset($_SESSION['admin'])) {
                redirect('/login');
            }

            $data['title'] = ('Questions Ignored');
            $admin_id = $this->session->admin_id;

            //-----Pagination-------//
            $config["base_url"] = base_url() . "question/question_ignored_etc";
            $config['per_page'] = 10;
            $page = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) * 10 : 0;
            //If $page = -1
            if ($page < 0) {
                $page = 0;
            }
            $pagination_data = array(
                'limit' => $config['per_page'],
                'start' => $page
            );
            //-----Sending request to API-----//
            $result = sendPostRequest('api/questionsignoredetc/?admin_id=' . $admin_id, $pagination_data);
            $data['subtitle'] = ('Questions');
            if ($result->status == ("error")) {
                show_error("Error in Questions", "500", "Unauthorized.");
            }
            $config["total_rows"] = $result->questionIgnoreEtc_total;
            $this->pagination->initialize($config);
            $data["links"] = $this->pagination->create_links();
            $data['questions'] = $result->questions;
            $data['new_total'] = $result->questionNew_total;
            $data['assigned_total'] = $result->questionAssigned_total;
            $data['answered_total'] = $result->questionAnswered_total;
            $data['uploaded_total'] = $result->questionUploaded_total;
            $data['faq_total'] = $result->questionFaq_total;
            $data['ignoredEtc_total'] = $result->questionIgnoreEtc_total;
            $data['left_sidebar'] = $this->load->view('template/left_sidebar.php', $data, TRUE);
            $this->load->view('template/header.php', $data);
            $this->load->view('pages/questionIgnoredEtcView.php', $data);
        }
    }

    //Getting all Questions
    public function questionTranscription() {
        if (!file_exists(APPPATH . 'views/pages/questionTranscriptionView.php')) {
            show_404();
        }

        if ($this->input->server('REQUEST_METHOD') == "GET") {
            if (!isset($_SESSION['admin'])) {
                redirect('/login');
            }

            $data['title'] = ('Question Transcription');
            $admin_id = $this->session->admin_id;

            //-----Pagination-------//
            $config["base_url"] = base_url() . "question/transcription";
            $config['per_page'] = 10;
            $page = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) * 10 : 0;
            //If $page = -1
            if ($page < 0) {
                $page = 0;
            }
            $pagination_data = array(
                'limit' => $config['per_page'],
                'start' => $page
            );
            //-----Sending request to API-----//
            $result = sendPostRequest('api/question/transcription?admin_id=' . $admin_id, $pagination_data);

            if ($result->status == ("error")) {
                show_error("Error in Questions", "500", "Unauthorized.");
            }
            $config["total_rows"] = $result->question_total;
            $this->pagination->initialize($config);
            $data["links"] = $this->pagination->create_links();
            $data['questions'] = $result->questions;
            $this->load->view('template/header.php', $data);
            $this->load->view('pages/questionTranscriptionView.php', $data);
        }
    }

}
