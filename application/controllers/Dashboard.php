<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User');
    }

    public function index() {


        $this->load->model('Tracking');
        $this->load->library('pagination');
        $config['base_url'] = base_url('Dashboard/index');
        $config['total_rows'] = sizeof($this->Tracking->getTrackings());
        $config['per_page'] = 5;

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $this->load->view('dashboard/header');

        $data = ['trackingArray' => $this->Tracking->getTrackings($config['per_page'], $page)];
        $data['pagination'] =  $this->pagination->create_links();
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
            'overallStatus' => 'Parcel handed to FDS'
        );
        $this->Tracking->insertTracking($data);
        redirect('Dashboard');
    }

    public function deleteTracking($idTracking) {
        $this->load->model('Tracking');
        $this->load->model('Log');
        $this->Log->deleteLogByTrackingId($idTracking);
        $this->Tracking->deleteTrackingById($idTracking);
        redirect('Dashboard');
    }
    
    public function search(){
        $arguments = [];
        $arguments['realTracking'] = $this->input->post('realTracking');
        $arguments['generatedTracking'] = $this->input->post('generatedTracking');
        $arguments['address'] = $this->input->post('address');
        $arguments['overallStatus'] = $this->input->post('overallStatus');
        $arguments = array_filter($arguments);
        $this->load->model('Tracking');
        if(sizeof($arguments) == 0){
            $result = [];
        } else {
            $result = $this->Tracking->findTracking($arguments);
        }
        $data['trackingArray'] = $result;
        $this->load->view('dashboard/header');
        $this->load->view('dashboard/search', $data);
        
        $this->load->view('dashboard/footer');
    }
    
    public function batchDelete(){
        $this->load->model('Tracking');
        $this->load->model('Log');
        $data = $this->input->post('idTracking');
        foreach($data as $key => $value){
            $this->Log->deleteLogByTrackingId($value);
            $this->Tracking->deleteTrackingById($value);
        }
        redirect('Dashboard');
    }

}
