<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'request'));
        $this->load->library(array('session', 'form_validation'));

    }

    //Login form page
    public function index()
    {
        //Redirect to Questions if a user is already logged in
        if(isset($_SESSION['admin']))
        {
            redirect('/question');

        }
        if (!file_exists(APPPATH.'views/pages/loginView.php'))
        {
            show_404(); // Whoops, we don't have a page for that!
        }

        $data['title'] = 'Login';
        $this->load->view('pages/loginView', $data);
    }

    //POST direct from login form redirects here
    public function loginAdmin()
    {
        if($this->input->server("REQUEST_METHOD") == 'POST')
        {
            //Getting data from login form
            $admin_data = array(
                'admin_name' => $this->input->post('admin_name'),
                'password' => $this->input->post('password')
            );

            //Initial Validation of Login on web server
            $this->form_validation->set_data($admin_data);
            $this->form_validation->set_rules('admin_name', 'Admin Name', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            //Reload page if validation fails
            if ($this->form_validation->run() == FALSE) {
                $error_data = array(
                    'error'  => 'login',
                    'message'     => 'Invalid User Name/Password'
                );

                $this->session->set_flashdata($error_data);
                redirect('/Login');
            }


            //Sending request to API
            $result = sendPostRequest('api/loginAdmin', $admin_data);

            if($result->status == ('error in db'))
            {
                $error_data = array(
                    'error'  => 'login',
                    'message'     => 'Invalid Email/Password'
                );

                $this->session->set_flashdata($error_data);
                redirect('/Login');
            }

            if($result->status == ('success'))
            {
                $admin = $result->admin;
                $admin_role = $result->admin_role;
                $this->session->set_userdata('admin', $admin->admin_name);
                $this->session->set_userdata('admin_id', $admin->admin_id);
                $this->session->set_userdata('admin_role',$admin_role->admin_role);
                if ($_SESSION['admin_role'] === "admin") {
                    redirect('/question');
                } 
                elseif($_SESSION['admin_role']==="content_moderator"){
                    redirect('/question/transcription');
                }
                else {
                    redirect('/answer');
                }
            }
        }

        //Call this if a user tries to access this method from URL
        show_404();
    }

    //Logging out user and destroying session
    public function logoutAdmin()
    {
    
        $this->session->sess_destroy();
        redirect('/Login');
    }

}