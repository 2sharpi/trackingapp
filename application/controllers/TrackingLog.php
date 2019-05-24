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
            'Date' => $this->input->post('date').'T'.$this->input->post('time'),
            'Description' => $this->input->post('description'),
            'realDescription' => $this->input->post('realDescription'),
            'address' => $this->input->post('address'),
            'isHidden' => $this->input->post('isHidden')
        );
        //var_dump($data);die();
        $this->Log->updateTrackingLog($idLog,$data);
        redirect('TrackingLog/showTrackingDetails/'.$this->input->post('idTracking'));
    }
    
    public function updateTracking($idTracking){
        $data = array(
          'generatedTracking' => $this->input->post('generatedTracking'),
          'address' => $this->input->post('address'),
          'overallStatus' => $this->input->post('overallStatus')
        );
        $this->load->model('Tracking');
        $this->Tracking->updateTracking($idTracking,$data);
        redirect('TrackingLog/showTrackingDetails/'.$idTracking);
    }
    
    public function deleteLog($idLog,$idTracking){
        $this->load-model('Log');
        $this->Log->deleteTrackingLog($idLog);
        redirect('TrackingLog/showTrackingDetails/'.$idTracking);
    }
    
    public function updateDisplayParcelInfo($realTracking,$value,$idTracking){
        $this->load->model('Tracking');
        $this->Tracking->updateIsParcelInfoHidden($realTracking,urldecode($value),$idTracking);
        redirect('TrackingLog/showTrackingDetails/'.$idTracking);
    }

}

