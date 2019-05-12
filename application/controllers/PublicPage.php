<?php

defined('BASEPATH') or exit ('access denied ');

class PublicPage extends CI_Controller{
    
    public function index(){
        $this->load->view('web/index.php');
    }
    
    public function tracking(){
        $this->load->model('Log');
        $this->load->model('Tracking');
        $tracking = $this->Tracking->checkGeneratedTrackingNumber($this->input->post('trackingNumber'));
        if(sizeof($tracking)==0){
            show_error('Parcel with this tracking number is not available');
        }
        $trackingLog = $this->Log->getPublicTrackingLogById($tracking[0]->idTracking);
        $data = array('tracking' => $tracking[0], 'trackingLog' => $trackingLog);
        $this->load->view('web/tracking.php',$data);
    }
}
