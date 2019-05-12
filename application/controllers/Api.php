<?php

defined('BASEPATH') OR exit('No direct script access allowed');

include(APPPATH . 'include/ApiConnectorPl.php');

class Api extends CI_Controller {


    public function updateTrackingLog() {
        
        
        $this->load->model('Tracking');
        $this->load->model('Log');
        $trackingNumbers = $this->Tracking->getTrackings();
        $connector = new SoapConnectorPl();
        
        foreach ($trackingNumbers as $tracking) {
            $data = [];
            $resultObject = $connector->checkTrackingNumberPl($tracking->realTracking);
            if (!isset($resultObject->return->eventsList)) {
                continue;
            }
            $result = $resultObject->return->eventsList;
            foreach ($result as $singleResult) {
                $descriptionLibrary = array(
                    'Zarejestrowano dane przesyłki, przesyłka jeszcze nie nadana' => 'Parcel Registered, waiting for pickup.',
                    'Przyjęcie przesyłki w oddziale DPD ' => 'Parcel has been picked up in office',
                    'Przekazano za granicę' => 'In transit',
                    'Przesyłka doręczona ' => 'Parcel delivered',
                    'Przesyłka odebrana przez Kuriera' => 'Parcel has been picked up by our agent'
                );
                $isDelivered = false;
                if($singleResult->description == 'Przesyłka doręczona '){
                    $this->Tracking->updateDeliveryStatus($singleResult->waybill);
                }
                $singleResult->description = $descriptionLibrary[$singleResult->description];
                array_push($data, array(
                    'Date' => $singleResult->eventTime,
                    'Description' => $singleResult->description,
                    'Tracking_idTracking' => $this->Tracking->getTrackingIdByNumber((string) $singleResult->waybill),
                    ));
                $this->load->helper('compareDate');
                usort($data, "compareFuncbyDate");
            }
            foreach($data as $singleLog){
                $this->Log->insertTracking($singleLog);
            }
        }
    }

}
