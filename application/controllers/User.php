<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url', 'request'));
        $this->load->library(array('pagination', 'session'));
    }

    //Getting all Users
    public function index()
    {
        if(!file_exists(APPPATH. 'views/pages/userListView.php')) {
            show_404();
        }

        if($this->input->server('REQUEST_METHOD') == "GET") {
            if(!isset($_SESSION['admin']))
            {
                redirect('/login');
            }

            $data['title'] = ('Users');
            $admin_id = $this->session->admin_id;

            //-----Pagination-------//
            $config["base_url"] = base_url() . "users";
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
            $result = sendPostRequest('api/users?admin_id='.$admin_id ,$pagination_data);
           
            if($result->status == ("error"))
            {
                show_error("Error in Users", "500", "Unauthorized.");
            }

            $config["total_rows"] = $result->user_total;
            $this->pagination->initialize($config);
            $data["links"] = $this->pagination->create_links();
            $data['users'] = $result->users;

            $this->load->view('template/header.php', $data);
            $this->load->view('pages/userListView.php', $data);
        }
    }

    //Getting single user
    public function getUserProfile()
    {
        if(!file_exists(APPPATH. 'views/pages/userView.php')) {
            show_404();
        }

        if($this->input->server('REQUEST_METHOD') == "GET")
        {
            if(!isset($_SESSION['admin']))
            {
                redirect('/login');
            }

            $data['title'] = ('Caller Profile');

            $user_id = $this->input->get("user_id");

            //-----Pagination-------//
            $config["base_url"] = base_url() . "user";
            $config['per_page'] = 50;

            //-----Sending request to API-----//
            $result = sendGetRequest('api/user?user_id='.$user_id);


            if($result->status == ("error")) {
                show_error("Error in user", "500", "Unauthorized.");
            }

            $data['user'] = $result->user;


            $this->load->view('template/header.php', $data);
            $this->load->view('pages/userView.php', $data);
        }
    }

    //Getting single user questions
    public function getUserQuestions()
    {
        if(!file_exists(APPPATH. 'views/pages/userQuestionView.php')) {
            show_404();
        }

        if($this->input->server('REQUEST_METHOD') == "GET")
        {
            if(!isset($_SESSION['admin']))
            {
                redirect('/login');
            }

            if($_GET)
            {
                $user_id = $this->input->get('user_id');
                $this->session->set_userdata('user_id',$user_id);
            }
            else
            {
                $user_id = $this->session->user_id;
            }

            $data['title'] = ('User ID: '.$user_id.' Questions');

            //-----Pagination-------//
            $config["base_url"] = base_url() . "user_questions";
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
            $result = sendPostRequest('api/user/questions?user_id='.$user_id ,$pagination_data);
            if($result->status == ("error")) {
                show_error("Error in user", "500", "Unauthorized.");
            }


            $config["total_rows"] = $result->question_total;
            $this->pagination->initialize($config);
            $data["links"] = $this->pagination->create_links();

            $data['questions'] = $result->questions;
            $this->load->view('template/header.php', $data);
            $this->load->view('pages/userQuestionView.php', $data);
        }
    }

    //Getting single user stories
    public function getUserStories()
    {
        if(!file_exists(APPPATH. 'views/pages/userStoryView.php')) {
            show_404();
        }

        if($this->input->server('REQUEST_METHOD') == "GET")
        {
            if(!isset($_SESSION['admin']))
            {
                redirect('/login');
            }

            if($_GET)
            {
                $user_id = $this->input->get('user_id');
                $this->session->set_userdata('user_id',$user_id);
            }
            else
            {
                $user_id = $this->session->user_id;
            }

            $data['title'] = ('User ID: '.$user_id.' Stories');

            //-----Pagination-------//
            $config["base_url"] = base_url() . "user_stories";
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
            $result = sendPostRequest('api/user/stories?user_id='.$user_id ,$pagination_data);
            if($result->status == ("error")) {
                show_error("Error in user", "500", "Unauthorized.");
            }


            $config["total_rows"] = $result->story_total;
            $this->pagination->initialize($config);
            $data["links"] = $this->pagination->create_links();

            $data['stories'] = $result->stories;
            $this->load->view('template/header.php', $data);
            $this->load->view('pages/userStoryView.php', $data);
        }
    }

    //Getting single user feedback
    public function getUserFeedback()
    {
        if(!file_exists(APPPATH. 'views/pages/userFeedbackView.php')) {
            show_404();
        }

        if($this->input->server('REQUEST_METHOD') == "GET")
        {
            if(!isset($_SESSION['admin']))
            {
                redirect('/login');
            }

            if($_GET)
            {
                $user_id = $this->input->get('user_id');
                $this->session->set_userdata('user_id',$user_id);
            }
            else
            {
                $user_id = $this->session->user_id;
            }

            $data['title'] = ('User ID: '.$user_id.' Feedback');

            //-----Pagination-------//
            $config["base_url"] = base_url() . "user_feedback";
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
            $result = sendPostRequest('api/user/feedback?user_id='.$user_id ,$pagination_data);
            if($result->status == ("error")) {
                show_error("Error in user", "500", "Unauthorized.");
            }


            $config["total_rows"] = $result->feedback_total;
            $this->pagination->initialize($config);
            $data["links"] = $this->pagination->create_links();

            $data['feedbacks'] = $result->feedbacks;
            $this->load->view('template/header.php', $data);
            $this->load->view('pages/userFeedbackView.php', $data);
        }
    }
}