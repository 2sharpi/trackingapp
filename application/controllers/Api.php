<?php

defined('BASEPATH') OR exit('No direct script access allowed');

include(APPPATH . 'include/ApiConnectorPl.php');

class Api extends CI_Controller {

    private $data = [];
    private $descriptionLibrary = array(
        'zarejestrowano dane przesyłki, przesyłka jeszcze nie nadana' => 'Parcel Registered, waiting for pickup.',
        'przyjęcie przesyłki w oddziale dpd' => 'Parcel has been picked up in office',
        'przekazano za granicę' => 'In transit',
        'przesyłka doręczona' => 'Parcel delivered',
        'przesyłka odebrana przez kuriera' => 'Parcel has been picked up by our agent'
    );

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

    private function setTrackingDataArray($dataObject, $idTracking) {
        array_push($this->data, array(
            'Date' => $dataObject->eventTime,
            'Description' => $dataObject->description,
            'Tracking_idTracking' => $idTracking
                )
        );
        $var = null;
    }

    public function testTracking() {

        $connector = new SoapConnectorPl();
        $resultObject = $connector->checkTrackingNumberPl(13439300055369);
        var_dump($resultObject);
        var_dump($resultObject);
    }

    public function updateTrackingLog() {

        $trackingNumbers = $this->Tracking->getTrackings();
        $connector = new SoapConnectorPl();
        //$resultObject = $connector->checkTrackingNumberPl(13439300055369);var_dump($resultObject);
        //die();
        foreach ($trackingNumbers as $tracking) {
            $resultObject = $connector->checkTrackingNumberPl($tracking->realTracking);
            if (!isset($resultObject->return->eventsList)) {
                continue;
            }
            $result = $resultObject->return->eventsList;
            if (gettype($result) === "object") {
                $this->checkParcelDelivery($result, $tracking->realTracking);
                $trackingCase = $this->TrackingCase->getTrackingCase(strtolower(rtrim($result->description)));
                $result->description = $trackingCase['description'];
                $this->setTrackingDataArray($result, $tracking->idTracking);
            } else {
                foreach ($result as $singleResult) {
                    $this->checkParcelDelivery($singleResult, $tracking->realTracking);
                    $trackingCase = $this->TrackingCase->getTrackingCase(strtolower(rtrim($singleResult->description)));
                    $singleResult->description = $trackingCase['description'];
                    $this->setTrackingDataArray($singleResult, $tracking->idTracking);
                }
            }

            foreach ($this->data as $singleLog) {
                $this->Log->insertTracking($singleLog);
            }
            $this->data = [];
        }
    }

}
