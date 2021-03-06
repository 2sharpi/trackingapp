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

    public function getTrackings($limit = null, $offset = null) {
        $query = null;
        if ($limit === null) {
            $query = $this->db->get('Tracking');
        } else {
            $this->db->limit($limit,$offset);
            $query = $this->db->get('Tracking');
        }
         
        $result = $query->result();
        return $result;
    }

    public function getUndeliveredTrackings() {
        $query = null;
        $this->db->where('overallStatus !=','Delivered');
        $this->db->or_where('overallStatus',null);
        $query = $this->db->get('Tracking');
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

    public function insertTracking($trackingArray) {
        if (!isset($trackingArray['generatedTracking']) OR $trackingArray['generatedTracking'] == '') {
            $trackingArray['generatedTracking'] = strrev($trackingArray['realTracking']);
        }
        $this->db->trans_start(FALSE);
        $this->db->insert('Tracking', $trackingArray);
        $this->db->trans_complete();
    }
    
   public function updateOverallStatus($realTracking, $value = true) {
        $data = array('overallStatus' => $value);
        $this->db->where('realTracking', $realTracking);
        $this->db->update('Tracking', $data);
    }

    public function updateTracking($idTracking, $data) {
        $this->db->where('idTracking',$idTracking);
        $this->db->update('Tracking', $data);
    }

    public function getTrackingIdByNumber($realTracking) {
        $query = $this->db->select('idTracking')->where(array('realTracking' => $realTracking));
        $query = $this->db->get('Tracking');
        $result = $query->result();
        if (sizeof($result) === 0) {
            return null;
        }
        return $result[0]->idTracking;
    }
    
    //setParcelInfo($tracking->realTracking, $SingleResult->PackageReference)
            
    public function setParcelInfo($realTracking, $value){
        $data = array('parcelInfo' => $value);
        $this->db->where('realTracking',$realTracking);
        $this->db->update('parcelInfo',$value); 
    }     
    
    public function updateIsParcelInfoHidden($realTracking, $value){
        $data = array('isParcelInfoHidden' => $value);
        $this->db->where('realTracking', $realTracking);
        $this->db->update('Tracking', $data);
    }
    
    public function deleteTrackingById($idTracking){
          $this->db->delete('Tracking',array('idTracking' => $idTracking));
    }
    
    public function setLastUpdatetime($idTracking,$value){
        $data = array('lastUpdate' => $value);
        $this->db->where('idTracking',$idTracking);
        $this->db->update('Tracking',$data);
    }
    
    public function findTracking($data){
        $this->db->where($data);
        $query = $this->db->get('Tracking');
        return $query->result();
    }

}
