<?php

defined('BASEPATH') or exit('access denied');

class Login extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
    }

    public function index() {
        $this->load->model('User');
        if ($this->form_validation->run() == false) {
           if (isset($this->session->userdata['logged_in'])){
                redirect('/Dashboard', 'refresh');
            } else {
//                $this->load->view('header');
                $this->load->view('login');
//                $this->load->view('footer');
            }
        } else {
            $post = array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password')
            );
            $loggedIn = $this->User->login($post['username'], $post['password']);
            if ($loggedIn !== false) {
                $this->session->set_userdata('logged_in', [
                    'id' => $loggedIn->idUser,
                    'username' => $loggedIn->username
                ]);
                redirect('Dashboard');
            } else {
                show_error('niepoprawne dane logowania');
            }
        }
    }

}
