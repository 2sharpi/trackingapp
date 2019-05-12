<?php

defined('BASEPATH') or exit('access denied');

class Tracking extends CI_Model {

    public function checkTrackingNumber($trackingNumber) {
        $query = $this->db->get_where('Tracking', array('realTracking' => $trackingNumber));
        return $query->result();
    }
    
    public function checkGeneratedTrackingNumber($trackingNumber) {
        $query = $this->db->get_where('Tracking', array('generatedTracking' => $trackingNumber));
        return $query->result();
    }

    public function getTrackings($limit = null) {
        $query = null;
        if ($limit === null) {
            $query = $this->db->get('Tracking');
        } else {
            $query = $this->db->get('Tracking', $limit);
        }
        return $query->result();
    }
    
    public function getUndeliveredTrackings(){
        $query= $this->db->get_where('Tracking',array('isDelivered' => false));
         return $query->result();
    }  

    public function getTrackingById($idTracking) {
        $query = $this->db->get_where('Tracking', array("idTracking" => $idTracking));
        $result = $query->result();
        if (sizeof($result) === 0) {
            return $result;
        } else {
            return $result[0];
        }
    }

    public function insertTracking($trackingNumber, $generatedTracking = null) {
        if ($generatedTracking === null) {
            $generatedTracking = strrev($trackingNumber);
        }
        $data = array('realTracking' => $trackingNumber, 'generatedTracking' => $generatedTracking);
        $this->db->insert('Tracking', $data);
    }
    
    public function updateDeliveryStatus($realTracking,$value = true){
        $data = array('isDelivered' => $value);
        $this->db->where('realTracking',$realTracking);
        $this->db->update('Tracking',$data);
    }
    
    

    public function getTrackingIdByNumber($realTracking) {
        $query = $this->db->select('idTracking')->where(array('realTracking' => $realTracking));
        $query = $this->db->get('Tracking');
        $result = $query->result();
        if(sizeof($result)===0){
            return null;
        }
        return $result[0]->idTracking;
    }

}
