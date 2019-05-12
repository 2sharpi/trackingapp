<?php

defined('BASEPATH') or exit('access denied');

class TrackingLog extends MY_Controller {

    public function showTrackingDetails($idTracking) {
        $this->load->model('Log');
        $this->load->model('Tracking');
        $trackingLog = $this->Log->getTrackingLogById($idTracking);
        $trackingData = $this->Tracking->getTrackingById($idTracking);
        $data = array('trackingLog' => $trackingLog, "trackingData" => $trackingData);
        $this->load->view('dashboard/header');
        $this->load->view('dashboard/trackingLog', $data);
        $this->load->view('dashboard/footer');
    }

    public function editContent($idLog = null) {
        if ($idLog === null) {
            show_error('NIeznany argument');
        }
        $this->load->model('Log');
        $data = array(
            'Date' => $this->input->post('date'),
            'Description' => $this->input->post('description'),
            'isHidden' => $this->input->post('isHidden')
        );
        //var_dump($data);die();
        $this->Log->updateTrackingLog($idLog,$data);
        redirect('TrackingLog/showTrackingDetails/'.$this->input->post('idTracking'));
    }
    
    public function deleteLog($idLog,$idTracking){
        $this->load-model('Log');
        $this->Log->deleteTrackingLog($idLog);
        echo 'Dupa';die();
        redirect('TrackingLog/showTrackingDetails/'.$idTracking);
    }

}
