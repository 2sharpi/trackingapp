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
        if (true) {
            if ($trackingCase['hierarchy'] != $this->lastHierarchy) {
                $this->lastHierarchy = $trackingCase['hierarchy'];
                $data['Date'] = $result->eventTime;
                $data['Description'] = $trackingCase['description'];
                $data['Tracking_idTracking'] = $tracking->idTracking;
                $data['hierarchy'] = $trackingCase['hierarchy'];
                $data['realDescription'] = $result->description;
                if ($trackingCase['address'] == 'API') {
                    $data['address'] = $tracking->address;
                    $data['countryCode'] = $tracking->countryCode;
                } else {
                    $data['address'] = $trackingCase['address'];
                    $data['countryCode'] = 'UK';
                }
                array_push($this->data, $data);
            }
        } else {
            $data['Date'] = $result->eventTime;
            $data['Description'] = 'Returned to sender';
            $data['Tracking_idTracking'] = $tracking->idTracking;
            $data['hierarchy'] = 6;
            $data['realDescription'] = 'zwrot do nadawcy';
            $data['address'] = 'FDS Depot';
            $data['countryCode'] = 'UK';
        }
    }

    public function testTracking() {

        $connector = new SoapConnectorPl();
        $resultObject = $connector->checkTrackingNumberPl(13439300055644);
    }

    public function updateTrackingLog($redirectToDashboard = null) {

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
        }
        foreach ($this->data as $singleLog) {
            $this->Log->insertTracking($singleLog);
            
        }

        $this->data = [];
        $this->lastHierarchy = 0;
        redirect(base_url('Dashboard'));
    }

}
