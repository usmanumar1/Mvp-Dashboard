<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url', 'request'));
        $this->load->library(array('pagination', 'session'));
    }

    //Getting all feedback
    public function index()
    {
        if(!file_exists(APPPATH. 'views/pages/feedbackView.php'))
        {
            show_404();
        }

        if($this->input->server('REQUEST_METHOD') == "GET")
        {
            if(!isset($_SESSION['admin']))
            {
                redirect('/login');
            }

            $data['title'] = ('Main Feedback');
            $admin_id = $this->session->admin_id;

            //-----Pagination-------//
            $config["base_url"] = base_url() . "feedback";
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
            $result = sendPostRequest('api/feedback?admin_id='.$admin_id ,$pagination_data);

            if($result->status == ("error"))
            {
                show_error("Error in Feedback", "500", "Unauthorized.");
            }

            $config["total_rows"] = $result->feedback_total;
            $this->pagination->initialize($config);
            $data["links"] = $this->pagination->create_links();
            $data['feedbacks'] = $result->feedbacks;

            $this->load->view('template/header.php', $data);
            $this->load->view('pages/feedbackView.php', $data);
        }
    }

    //Getting all feedback transcription
    public function feedbackTranscription()
    {
        if(!file_exists(APPPATH. 'views/pages/feedbackTranscriptionView.php'))
        {
            show_404();
        }

        if($this->input->server('REQUEST_METHOD') == "GET")
        {
            if(!isset($_SESSION['admin']))
            {
                redirect('/login');
            }

            $data['title'] = ('Feedback Transcription');
            $admin_id = $this->session->admin_id;

            //-----Pagination-------//
            $config["base_url"] = base_url() . "feedback/transcription";
            $config['per_page'] = 50;
            $page =($this->uri->segment(3)) ? ($this->uri->segment(3) -1) * 50 : 0;
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
            $result = sendPostRequest('api/feedback/transcription?admin_id='.$admin_id ,$pagination_data);


            if($result->status == ("error")) {
                show_error("Error in Feedback Transcription.", "500", "Unauthorized.");
            }
            $config["total_rows"] = $result->feedback_total;
            $this->pagination->initialize($config);
            $data["links"] = $this->pagination->create_links();
            $data['feedbacks'] = $result->feedbacks;

            $this->load->view('template/header.php', $data);
            $this->load->view('pages/feedbackTranscriptionView.php', $data);
        }
    }

}