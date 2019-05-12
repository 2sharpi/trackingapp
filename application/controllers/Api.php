<?php

defined('BASEPATH') OR exit('No direct script access allowed');

include(APPPATH . 'include/ApiConnectorPl.php');

class Api extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Tracking');
        $this->load->model('Log');
    }

    private $descriptionLibrary = array(
        'Zarejestrowano dane przesyłki, przesyłka jeszcze nie nadana' => 'Parcel Registered, waiting for pickup.',
        'Przyjęcie przesyłki w oddziale DPD ' => 'Parcel has been picked up in office',
        'Przekazano za granicę' => 'In transit',
        'Przesyłka doręczona ' => 'Parcel delivered',
        'Przesyłka odebrana przez Kuriera' => 'Parcel has been picked up by our agent'
    );

    private function checkParcelDelivery($trackingLog, $tracking) {
        if ($trackingLog->description == 'Przesyłka doręczona ') {
            $this->Tracking->updateDeliveryStatus($tracking);
        }
    }

    private function setTrackingDataArray($array, $dataObject, $idTracking) {
        array_push($array, array(
            'Date' => $dataObject->eventTime,
            'Description' => $dataObject->description,
            'Tracking_idTracking' => $idTracking
                )
        );
        return $array;
    }

    public function updateTrackingLog() {



        /* $trackingNumbers = $this->Tracking->getTrackings();
          $connector = new SoapConnectorPl();
          $resultObject = $connector->checkTrackingNumberPl(13439300067559);
          var_dump($resultObject);
          echo(gettype($resultObject->return->eventsList));
          die();
         */
        $trackingNumbers = $this->Tracking->getTrackings();
        $connector = new SoapConnectorPl();
        foreach ($trackingNumbers as $tracking) {
            $data = [];
            $resultObject = $connector->checkTrackingNumberPl($tracking->realTracking);
            //$resultObject = $connector->checkTrackingNumberPl(13439300067559);
            if (!isset($resultObject->return->eventsList)) {
                continue;
            }
            $result = $resultObject->return->eventsList;
            $AAAA = gettype($result);
            if (gettype($result) === "object") {
                $this->checkParcelDelivery($result, $tracking->realTracking);
                $result->description = $this->descriptionLibrary[$result->description];
                $data = $this->setTrackingDataArray($data, $result, $tracking->idTracking);
            } else {
                foreach ($result as $singleResult) {
                    $this->checkParcelDelivery($singleResult, $tracking->realTracking);
                    $singleResult->description = $this->descriptionLibrary[$singleResult->description];
                    $data = $this->setTrackingDataArray($data, $singleResult, $tracking->idTracking);
                }
            }

            foreach ($data as $singleLog) {
                $this->Log->insertTracking($singleLog);
            }
        }
    }

}
