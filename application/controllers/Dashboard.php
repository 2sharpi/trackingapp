<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User');
    }

    public function index() {

        $this->load->view('dashboard/header');
        $this->load->model('Tracking');
        $data = ['trackingArray' => $this->Tracking->getTrackings()];
        $this->load->view('dashboard/trackingList', $data);
        $this->load->view('dashboard/footer');
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('Login', 'refresh');
    }

    public function addNewTracking() {
        $this->load->model('Tracking');
        $data = array(
            'realTracking' => $this->input->post('realTracking'),
            'generatedTracking' => $this->input->post('generatedTracking'),
            'address' => $this->input->post('address'),
            'overallStatus' => 'Delivered'
        );
        $this->Tracking->insertTracking($data);
        redirect('Dashboard');
    }

}
