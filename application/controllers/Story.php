<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Story extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'request'));
        $this->load->library(array('pagination', 'session'));
    }

    //Getting all stories
    public function index() {
        if (!file_exists(APPPATH . 'views/pages/storyView.php')) {
            show_404();
        }

        if ($this->input->server('REQUEST_METHOD') == "GET") {
            if (!isset($_SESSION['admin'])) {
                redirect('/login');
            }

            $data['title'] = ('Stories');
            $admin_id = $this->session->admin_id;

            //-----Pagination-------//
            $config["base_url"] = base_url() . "story";
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
            $result = sendPostRequest('api/stories?admin_id=' . $admin_id, $pagination_data);

            if ($result->status == ("error")) {
                show_error("Error in Stories.", "500", "Unauthorized.");
            }

            $config["total_rows"] = $result->story_total;
            $this->pagination->initialize($config);
            $data["links"] = $this->pagination->create_links();
            $data['stories'] = $result->stories;

            $this->load->view('template/header.php', $data);
            $this->load->view('pages/storyView.php', $data);
        }
    }

    public function storyNew() {
        if (!file_exists(APPPATH . 'views/pages/storyNewView.php')) {
            show_404();
        }

        if ($this->input->server('REQUEST_METHOD') == "GET") {
            if (!isset($_SESSION['admin'])) {
                redirect('/login');
            }

            $data['title'] = ('Stories New');
            $admin_id = $this->session->admin_id;

            //-----Pagination-------//
            $config["base_url"] = base_url() . "story/storyNew";
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
            $result = sendPostRequest('api/storiesNew?admin_id=' . $admin_id, $pagination_data);

            if ($result->status == ("error")) {
                show_error("Error in Stories.", "500", "Unauthorized.");
            }

            $config["total_rows"] = $result->story_total;
            $this->pagination->initialize($config);
            $data["links"] = $this->pagination->create_links();
            $data['stories'] = $result->stories;
            $data['new_total'] = $result->story_total;
            $data['story_approved_total'] = $result->story_approved_total;
            $data['story_rejected_total'] = $result->story_rejected_total;
            $data['left_sidebar'] = $this->load->view('template/left_sidebar_stories.php', $data, TRUE);

            $this->load->view('template/header.php', $data);
            $this->load->view('pages/storyNewView.php', $data);
        }
    }

    public function storyApproved() {
        if (!file_exists(APPPATH . 'views/pages/storyApprovedView.php')) {
            show_404();
        }

        if ($this->input->server('REQUEST_METHOD') == "GET") {
            if (!isset($_SESSION['admin'])) {
                redirect('/login');
            }
            $order_by_test = $this->input->get();
            //print_r($order_by_test);
            foreach ($order_by_test as $key => $value) {
                switch ($key) {
                    case 'order_by_time':
                        $order_by = "order by time_approved " . $order_by_test['order_by_time'];
                       // echo $order_by;
                        break;
                    case 'order_by_listens':
                        $order_by = "order by no_of_listens " . $order_by_test['order_by_listens'];

                        //echo $order_by;
                        break;
                    case 'order_by_likes':
                        $order_by = "order by response_like " . $order_by_test['order_by_likes'];

                        //echo $order_by;
                        break;
                    case 'order_by_dislikes':
                        $order_by = "order by response_dislike " . $order_by_test['order_by_dislikes'];

                        //echo $order_by;
                        break;
                    case 'order_by_inappropriate':
                        $order_by = "order by response_inappropriate " . $order_by_test['order_by_inappropriate'];

                        //echo $order_by;
                        break;
                    case 'order_by_comments':
                        $order_by = "order by story_comments " . $order_by_test['order_by_comments'];

                        //echo $order_by;
                        break;
                    default:
                        echo "Error. Order By Not Select";
                }
            }
//            print_r($order_by);
            $data['title'] = ('Stories Approved');
            $admin_id = $this->session->admin_id;

            //-----Pagination-------//
            $config["base_url"] = base_url() . 'story/storyApproved';
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
            // print_r($pagination_data);
            //-----Sending request to API-----//
            if (isset($order_by)) {
                $result = sendPostRequest('api/storiesApproved?admin_id=' . $admin_id . '&order_by=' . $order_by, $pagination_data);
            } else {
                $result = sendPostRequest('api/storiesApproved?admin_id=' . $admin_id, $pagination_data);                  
                
//print_r($result);
                
                
            }
            if ($result->status == ("error")) {
                show_error("Error in Stories.", "500", "Unauthorized.");
            }

            $config["total_rows"] = $result->story_approved_total;
            $config['reuse_query_string'] = true;
            $this->pagination->initialize($config);
            $data["links"] = $this->pagination->create_links();
            $data['stories'] = $result->stories;
            $data['story_approved_total'] = $result->story_approved_total;
            $data['story_rejected_total'] = $result->story_rejected_total;
            $data['new_total'] = $result->story_total;
            $data['left_sidebar'] = $this->load->view('template/left_sidebar_stories.php', $data, TRUE);

            $this->load->view('template/header.php', $data);
            $this->load->view('pages/storyApprovedView.php', $data);
        }
    }

    public function storyRejected() {
        if (!file_exists(APPPATH . 'views/pages/storyRejectedView.php')) {
            show_404();
        }

        if ($this->input->server('REQUEST_METHOD') == "GET") {
            if (!isset($_SESSION['admin'])) {
                redirect('/login');
            }

            $data['title'] = ('Stories Rejected');
            $admin_id = $this->session->admin_id;

            //-----Pagination-------//
            $config["base_url"] = base_url() . "story/storyRejected";
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
            $result = sendPostRequest('api/storiesRejected?admin_id=' . $admin_id, $pagination_data);

            if ($result->status == ("error")) {
                show_error("Error in Stories.", "500", "Unauthorized.");
            }

            $config["total_rows"] = $result->story_rejected_total;
            $this->pagination->initialize($config);
            $data["links"] = $this->pagination->create_links();
            $data['stories'] = $result->stories;
            $data['story_rejected_total'] = $result->story_rejected_total;
            $data['story_approved_total'] = $result->story_approved_total;
            $data['new_total'] = $result->story_total;
            $data['left_sidebar'] = $this->load->view('template/left_sidebar_stories.php', $data, TRUE);

            $this->load->view('template/header.php', $data);
            $this->load->view('pages/storyRejectedView.php', $data);
        }
    }

    //Getting all comments against stories
    public function getCommentsOfStories() {
        if (!file_exists(APPPATH . 'views/pages/commentView.php')) {
            show_404();
        }

        if ($this->input->server('REQUEST_METHOD') == "GET") {
            if (!isset($_SESSION['admin'])) {
                redirect('/login');
            }

            $data['title'] = ('Comment on Story');
            $admin_id = $this->session->admin_id;

            //-----Pagination-------//
            $config["base_url"] = base_url() . "comment";
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
            $result = sendPostRequest('api/comments?admin_id=' . $admin_id, $pagination_data);

            if ($result->status == ("error")) {
                show_error("Error in Comments.", "500", "Unauthorized.");
            }

            $config["total_rows"] = $result->comment_total;
            $this->pagination->initialize($config);
            $data["links"] = $this->pagination->create_links();
            $data['comments'] = $result->comments;

            $this->load->view('template/header.php', $data);
            $this->load->view('pages/commentView.php', $data);
        }
    }

    //Getting all Story transcription
    public function storyTranscription() {
        if (!file_exists(APPPATH . 'views/pages/storyTranscriptionView.php')) {
            show_404();
        }

        if ($this->input->server('REQUEST_METHOD') == "GET") {
            if (!isset($_SESSION['admin'])) {
                redirect('/login');
            }

            $data['title'] = ('Story Transcription');
            $admin_id = $this->session->admin_id;

            //-----Pagination-------//
            $config["base_url"] = base_url() . "story/transcription";
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
            $result = sendPostRequest('api/stories/transcription?admin_id=' . $admin_id, $pagination_data);


            if ($result->status == ("error")) {
                show_error("Error in Story Transcription.", "500", "Unauthorized.");
            }
            $config["total_rows"] = $result->story_total;
            $this->pagination->initialize($config);
            $data["links"] = $this->pagination->create_links();
            $data['stories'] = $result->stories;

            $this->load->view('template/header.php', $data);
            $this->load->view('pages/storyTranscriptionView.php', $data);
        }
    }

    //Getting all Comment transcription
    public function commentTranscription() {
        if (!file_exists(APPPATH . 'views/pages/storyTranscriptionView.php')) {
            show_404();
        }

        if ($this->input->server('REQUEST_METHOD') == "GET") {
            if (!isset($_SESSION['admin'])) {
                redirect('/login');
            }

            $data['title'] = ('Comment Transcription');
            $admin_id = $this->session->admin_id;

            //-----Pagination-------//
            $config["base_url"] = base_url() . "comment/transcription";
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
            $result = sendPostRequest('api/comments?admin_id=' . $admin_id, $pagination_data);


            if ($result->status == ("error")) {
                show_error("Error in Comment Transcription.", "500", "Unauthorized.");
            }
            $config["total_rows"] = $result->comment_total;
            $this->pagination->initialize($config);
            $data["links"] = $this->pagination->create_links();
            $data['comments'] = $result->comments;

            $this->load->view('template/header.php', $data);
            $this->load->view('pages/commentTranscriptionView.php', $data);
        }
    }

}
