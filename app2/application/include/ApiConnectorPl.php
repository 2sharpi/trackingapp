<?php

defined('BASEPATH') or exit('access denied');

class authDataV1 {

    public $login = '22241901';
    public $password = 'uSCJqE7o3NDAIKwG';
    public $channel = '222419';

}

class getEventsForCustomerV1 {

    public $limit = '10';
    public $authDataV1;

}

class getEventsForWaybillV1 {

    public $waybill ;
    public $eventsSelectType = 'ALL';
    public $language = 'PL';
    public $authDataV1;

    public function __construct($trackingNumber) {
        $this->waybill = (String)$trackingNumber;
    }

}

class SoapConnectorPl {

    private $parcelInfo;
    private $client;
    private $wsdlXml;


    public function checkTrackingNumberPl($trackingNumber) {
        
        $this->wsdlXml = 'https://dpdinfoservices.dpd.com.pl/DPDInfoServicesObjEventsService/DPDInfoServicesObjEvents?wsdl';

        $this->client = new SoapClient($this->wsdlXml, [
            'trace' => 1
        ]);

        $this->parcelInfo = new getEventsForWaybillV1($trackingNumber);
        $this->parcelInfo->authDataV1 = new authDataV1();

        try {
            return $this->client->getEventsForWaybillV1($this->parcelInfo);
        } catch (\Exception $e) {
            print_r($this->client->__getLastRequest());
            print_r($this->client->__getLastResponseHeaders());
        }
    }

}
