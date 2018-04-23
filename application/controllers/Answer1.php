<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Answer extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'request'));
        $this->load->library(array('pagination', 'session'));
    }

    //Answer upload by voice artist
    public function answerUploadByVoiceArtist() {
        if (!file_exists(APPPATH . 'views/pages/answerUploadView.php')) {
            show_404();
        }

        if ($this->input->server('REQUEST_METHOD') == "GET") {
            if (!isset($_SESSION['admin'])) {
                redirect('/login');
            }

            $data['title'] = ('Answer - Voice Artist');
            $admin_id = $this->session->admin_id;

            //-----Pagination-------//
            $config["base_url"] = base_url() . "answer";
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
            $result = sendPostRequest('api/answers?admin_id=' . $admin_id, $pagination_data);

            if ($result->status == ("error")) {
                show_error("Error in Questions", "500", "Unauthorized.");
            }

            $config["total_rows"] = $result->answer_total;

            $this->pagination->initialize($config);
            $data["links"] = $this->pagination->create_links();
            $data['answers'] = $result->answers;
            $data['admin_id'] = $admin_id;

            $this->load->view('template/header.php', $data);
            $this->load->view('pages/answerUploadView.php', $data);
        }
    }

}
