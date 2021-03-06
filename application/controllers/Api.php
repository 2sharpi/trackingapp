<?php

defined('BASEPATH') OR exit('No direct script access allowed');

include(APPPATH . 'include/ApiConnectorPl.php');

class Api extends CI_Controller {

    private $data = [];
    private $lastHierarchy = 0;
    private $isOutsidePl = false;
    private $failedDelivery = false;

    public function __construct() {
        parent::__construct();
        $this->load->model('Tracking');
        $this->load->model('Log');
        $this->load->model('TrackingCase');
    }


    private function setTrackingDataArray($result, $tracking, $trackingCase) {

        if($result->country == 'PL' AND $this->isOutsidePl == true AND $trackingCase['hierarchy'] != '5'){
            return false;
        }
        if($result->country == 'PL' and $this->failedDelivery == true AND $trackingCase['description'] != 'Delivered'){
            return false;
        }
        
        if ($result->businessCode == '230405') {
            $this->isOutsidePl = true;
        }
        $this->lastHierarchy = $trackingCase['hierarchy'];
        $data['Date'] = $result->eventTime;
        $data['Description'] = $trackingCase['description'];
        $data['Tracking_idTracking'] = $tracking->idTracking;
        $data['hierarchy'] = $trackingCase['hierarchy'];
        $data['realDescription'] = $result->description;
        $data['businessCode'] = $result->businessCode;
        $data['country'] = $result->country;
	if($result->country === 'PL'){
            $data['country'] = '';
        }
        if (strpos($data['Description'], 'Parcel could not be delivered') !== false) {
            $this->failedDelivery = true;
        }
        if ($trackingCase['address'] == 'Dane klienta (CSV), API(Panstwo)') {
            $data['address'] = $tracking->address . ','.$data['country'];
        } else if ($trackingCase['address'] == 'Dane klienta (CSV), API(Panstwo)') {
            $data['address'] = $tracking->$tracking->address . ','.$data['country'];
        } else if ($trackingCase['address'] == 'Dane klienta (CSV), API(Panstwo) lub Bedford MK42, GB - gdy zwrot') {
            $data['address'] = $tracking->address . ','.$data['country'];
        } else if ($trackingCase['address'] == 'FDS depot, API(Panstwo)') {
            $data['address'] = 'FDS depot , ' .$data['country'];
        } else {
            $data['address'] = $trackingCase['address'];
        }
        if($result->country == 'PL' AND $this->isOutsidePl == true AND $trackingCase['hierarchy'] == '5'){
            $data['address'] = 'Bedford MK42, GB';
        }
         if($result->country == 'PL' AND $this->failedDelivery == true AND $trackingCase['description'] == 'Delivered'){
             $data['address'] = 'Bedford MK42, GB';
         }
        array_push($this->data, $data);
    }

    public function testTracking() {

        $connector = new SoapConnectorPl();
        $resultObject = $connector->checkTrackingNumberPl('13439300069038');
        var_dump($resultObject);
    }

    public function updateTrackingLog($redirectToDashboard = null) {

        //$this->Log->clearLogs();
        $trackingNumbers = $this->Tracking->getUndeliveredTrackings();
        $connector = new SoapConnectorPl();
        foreach ($trackingNumbers as $tracking) {
            
            $resultObject = $connector->checkTrackingNumberPl($tracking->realTracking);



            if (!isset($resultObject->return->eventsList)) {
                continue;
            }
            $result = $resultObject->return->eventsList;
            if(is_array($result)){
            usort($result, function($a, $b) {
                $ad = new DateTime($a->eventTime);
                $bd = new DateTime($b->eventTime);

                if ($ad == $bd) {
                    return 0;
                }

                return $ad < $bd ? -1 : 1;
            });
            }
            if (gettype($result) === "object") {
                $trackingCase = $this->TrackingCase->getTrackingCase(strtolower(rtrim($result->description)));
                $this->setTrackingDataArray($result, $tracking, $trackingCase);
               //$this->Tracking->updateOverallStatus($tracking->realTracking, $trackingCase['overallStatus']);
                $this->Tracking->setLastUpdatetime($tracking->idTracking,date('m/d/Y h:i:s a', time()));
            } else {
                foreach ($result as $key => $singleResult) {
                    $trackingCase = $this->TrackingCase->getTrackingCase(strtolower(rtrim($singleResult->description)));
                    $this->setTrackingDataArray($singleResult, $tracking, $trackingCase);
                    if ($key == 0) {
                        //  $this->Tracking->updateOverallStatus($tracking->realTracking, $trackingCase['overallStatus']);
                        $this->Tracking->setLastUpdatetime($tracking->idTracking,date('m/d/Y h:i:s a', time()));
                    }
                }
            }
            $this->lastHierarchy = 0;
            $uncheckedData = $this->data;
            foreach ($uncheckedData as $key => $singleLog) {
                if ((int) $singleLog['hierarchy'] > (int) $this->lastHierarchy) {
                    $this->lastHierarchy = $singleLog['hierarchy'];
                } else if ($this->lastHierarchy == 5) {
                    unset($this->data[$key]);
                }
            }
            $this->lastHierarchy = 0;
            $uncheckedData = $this->data;
            foreach ($uncheckedData as $key => $singleLog) {
                if ((int) $singleLog['hierarchy'] > (int) $this->lastHierarchy) {
                    $this->lastHierarchy = $singleLog['hierarchy'];
                } else if ((int) $this->lastHierarchy > (int) $singleLog['hierarchy']) {
                    unset($this->data[$key]);
                }
            }
            $this->lastHierarchy = 0;
            $uncheckedData = $this->data;
            foreach ($uncheckedData as $key => $singleLog) {
                if ((int) $singleLog['hierarchy'] > (int) $this->lastHierarchy) {
                    $this->lastHierarchy = $singleLog['hierarchy'];
                } else if ((int) $this->lastHierarchy == (int) $singleLog['hierarchy']) {
                    if((int) $this->lastHierarchy < 4){
                        unset($this->data[$key]);
                    }
                }
            }

            
            $this->data = array_reverse($this->data);
            reset($this->data);
            $lastElement = current($this->data);
            $trackingCase = $this->TrackingCase->getTrackingCase(strtolower(rtrim($lastElement['realDescription'])));
            $this->Tracking->updateOverallStatus($tracking->realTracking, $trackingCase['overallStatus']);
                $this->isOutsidePl = false;
                $this->failedDelivery = false;
            foreach ($this->data as $singleLog) {
                $this->Log->insertTracking($singleLog);
                $this->data = [];
            }
        }



        redirect(base_url('Dashboard'));
    }

}
