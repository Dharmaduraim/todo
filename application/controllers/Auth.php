<?php
class Auth extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->helper('url');
        $this->load->library('form_validation');
           $this->load->library('session');
    }

    public function register() {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('register');
        } else {
            $user_data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'password' =>$this->input->post('password')
                
            );
            $user_id = $this->user_model->create_user($user_data);
            // You may redirect the user to login page or any other page after successful registration
            redirect('auth/login');
        }
    }

        public function login() {
              $this->load->library('session');

          $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login');
        } else {
            $email = $this->input->post('email');
            $password =$this->input->post('password');
            $user = $this->user_model->authenticate($email, $password);
            // print_r($user);exit;
            if ($user) {
$newdata = array(
                   'username'  => $this->input->post('email'),
                   'logged_in' => TRUE
               );

$this->session->set_userdata($newdata);                
                // echo "aaa";exit;
                // Login successful, redirect to dashboard or any other page
                redirect('todo');
            } else {
                // Login failed, show error message
                $data['error'] = 'Invalid username or password';
                $this->load->view('login', $data);
            }
        }
            // $this->load->view('login');


        }


 
    public function logout() {
        $this->session->unset_userdata('username');
                $this->load->view('login');
    }


}
?>
