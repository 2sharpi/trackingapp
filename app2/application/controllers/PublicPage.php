<?php

defined('BASEPATH') or exit ('access denied ');

class PublicPage extends CI_Controller{
    
    public function index(){
        $this->load->view('web/header.php');
        $this->load->view('web/index.php');
        $this->load->view('web/footer.php');
    }
    
    public function tracking($input = null){
        $this->load->model('Log');
        $this->load->model('Tracking');
        if($input == null){
            $tracking = $this->Tracking->checkGeneratedTrackingNumber($this->input->post('trackingNumber'));
        } else {
            $tracking = $this->Tracking->checkGeneratedTrackingNumber($input);
        }
        if(sizeof($tracking)==0){
            show_error('Parcel with this tracking number is not available');
        }
        $trackingLog = $this->Log->getPublicTrackingLogById($tracking[0]->idTracking);
        $data = array('tracking' => $tracking[0], 'trackingLog' => $trackingLog);
        $this->load->view('web/header.php');
        $this->load->view('web/tracking.php',$data);
        $this->load->view('web/footer.php');
    }
    
    public function privacyPolicy(){
        $this->load->view('web/header.php');
        $this->load->view('web/privacypolicy.php');
        $this->load->view('web/footer.php');
    }
    
    public function termsAndConditions(){
        $this->load->view('web/header.php');
        $this->load->view('web/terms.php');
        $this->load->view('web/footer.php');
    }
    
    public function offer(){
        $this->load->view('web/header.php');
        $this->load->view('web/offer.php');
        $this->load->view('web/footer.php');
    }
}

   


