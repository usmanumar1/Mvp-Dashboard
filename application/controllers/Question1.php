<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Question extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url', 'request'));
        $this->load->library(array('pagination', 'session'));
    }

    //Getting all Questions
    public function index()
    {
        if(!file_exists(APPPATH. 'views/pages/questionView.php'))
        {
            show_404();
        }

        if($this->input->server('REQUEST_METHOD') == "GET")
        {
            if(!isset($_SESSION['admin']))
            {
                redirect('/login');
            }

            $data['title'] = ('Questions');
            $admin_id = $this->session->admin_id;

            //-----Pagination-------//
            $config["base_url"] = base_url() . "question";
            $config['per_page'] = 10;
            $page =($this->uri->segment(2)) ? ($this->uri->segment(2) -1) * 10 : 0;
            //If $page = -1
            if($page < 0)
            {
                $page = 0;
            }
            $pagination_data = array(
                'limit' => $config['per_page'],
                'start' => $page
            );
            //-----Sending request to API-----//
            $result = sendPostRequest('api/questions?admin_id='.$admin_id ,$pagination_data);

            $data['subtitle'] = ('Questions');
            if($result->status == ("error"))
            {
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


    //Getting all Questions
    public function questionTranscription()
    {
        if(!file_exists(APPPATH. 'views/pages/questionTranscriptionView.php'))
        {
            show_404();
        }

        if($this->input->server('REQUEST_METHOD') == "GET")
        {
            if(!isset($_SESSION['admin']))
            {
                redirect('/login');
            }

            $data['title'] = ('Question Transcription');
            $admin_id = $this->session->admin_id;

            //-----Pagination-------//
            $config["base_url"] = base_url() . "question/transcription";
            $config['per_page'] = 50;
            $page =($this->uri->segment(2)) ? ($this->uri->segment(2) -1) * 50 : 0;
            //If $page = -1
            if($page < 0)
            {
                $page = 0;
            }
            $pagination_data = array(
                'limit' => $config['per_page'],
                'start' => $page
            );
            //-----Sending request to API-----//
            $result = sendPostRequest('api/question/transcription?admin_id='.$admin_id ,$pagination_data);

            if($result->status == ("error")) {
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
