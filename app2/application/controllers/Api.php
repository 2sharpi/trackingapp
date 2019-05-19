<?php

defined('BASEPATH') OR exit('No direct script access allowed');

include(APPPATH . 'include/ApiConnectorPl.php');

class Api extends CI_Controller {

    private $data = [];
    private $lastHierarchy = 0;

    public function __construct() {
        parent::__construct();
        $this->load->model('Tracking');
        $this->load->model('Log');
        $this->load->model('TrackingCase');
    }

    private function checkParcelDelivery($trackingLog, $tracking) {
        if ($trackingLog->description == 'Przesyłka doręczona ') {
            $this->Tracking->updateDeliveryStatus($tracking);
        }
    }

    private function setTrackingDataArray($result, $tracking, $trackingCase) {
        $data = array();

        $this->lastHierarchy = $trackingCase['hierarchy'];
        $data['Date'] = $result->eventTime;
        $data['Description'] = $trackingCase['description'];
        $data['Tracking_idTracking'] = $tracking->idTracking;
        $data['hierarchy'] = $trackingCase['hierarchy'];
        $data['realDescription'] = $result->description;
        if ($trackingCase['address'] == 'Dane klienta (CSV), API(Panstwo)') {
            $data['address'] = $tracking->address.' / UK';
        } else  if ($trackingCase['address'] == 'Dane klienta (CSV), API(Panstwo)'){
            $data['address'] = $tracking->address.' / UK';
        } else if($trackingCase['address'] == 'Dane klienta (CSV), API(Panstwo) lub Bedford MK42, GB - gdy zwrot'){
            $data['address'] = $tracking->address.' / UK';
        } else if($trackingCase['address'] == 'FDS depot, API(Panstwo)'){
            $data['address'] = 'FDS depot, UK';
        } 
        
        else{
            $data['address'] = $trackingCase['address'];
        }
        array_push($this->data, $data);
    }

    public function testTracking() {

        $connector = new SoapConnectorPl();
        $resultObject = $connector->checkTrackingNumberPl('13439300069038');
        var_dump($resultObject);
    }

    public function updateTrackingLog($redirectToDashboard = null) {
        
        $this->Log->clearLogs();
        $trackingNumbers = $this->Tracking->getTrackings();
        $connector = new SoapConnectorPl();
        foreach ($trackingNumbers as $tracking) {
            $resultObject = $connector->checkTrackingNumberPl($tracking->realTracking);



            if (!isset($resultObject->return->eventsList)) {
                continue;
            }
            $result = $resultObject->return->eventsList;
            if (gettype($result) === "object") {
                $trackingCase = $this->TrackingCase->getTrackingCase(strtolower(rtrim($result->description)));
                $this->setTrackingDataArray($result, $tracking, $trackingCase);
                $this->Tracking->updateOverallStatus($tracking->realTracking, $trackingCase['overallStatus']);
            } else {
                foreach ($result as $key => $singleResult) {
                    $trackingCase = $this->TrackingCase->getTrackingCase(strtolower(rtrim($singleResult->description)));
                    $this->setTrackingDataArray($singleResult, $tracking, $trackingCase);
                    if ($key == 0) {
                        $this->Tracking->updateOverallStatus($tracking->realTracking, $trackingCase['overallStatus']);
                    }
                }
            }
            $this->lastHierarchy = 0;
            $this->data = array_reverse($this->data);
            $uncheckedData = $this->data;
            $isDelivered = false;
            foreach ($uncheckedData as $key => $singleLog) {
                if ((int)$singleLog['hierarchy'] > (int)$this->lastHierarchy AND $this->lastHierarchy <= 3) {
                    $this->lastHierarchy = $singleLog['hierarchy'];
                } else if  ((int)$singleLog['hierarchy'] == (int)$this->lastHierarchy AND $this->lastHierarchy <= 3) {
                    unset($this->data[$key]);
                } else if($isDelivered == true ){
                    continue;
                } else if( $singleLog['Description'] == 'Delivered' AND $isDelivered == false){
                    $isDelivered = true;
                }
            }
            $isDelivered = false;
            $this->lastHierarchy = 0;
            $this->data = array_unique($this->data);
            $this->data = array_reverse($this->data);
            foreach ($this->data as $singleLog) {
                $this->Log->insertTracking($singleLog);
                $this->data = [];
            }
        }



        redirect(base_url('Dashboard'));
    }

}
