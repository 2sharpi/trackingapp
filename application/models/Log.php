<?php

defined('BASEPATH') or exit('access denied');

class Log extends CI_Model {

    public function getTrackingLogById($id) {
        $query = $this->db->get_where('Log', ["Tracking_idTracking" => $id]);
        $result = $query->result();
        return $result;
    }
    
    public function getPublicTrackingLogById($id) {
        $query = $this->db->get_where('Log', ["Tracking_idTracking" => $id, 'isHidden' => '0']);
        $result = $query->result();
        return $result;
    }

    public function insertTracking(array $trackingLog) {
        $modifiedData = $trackingLog;
        unset($modifiedData['Description']);
        $query = $this->db->get_where('Log', $modifiedData);
        if (sizeof($query->result()) === 0) {
            $this->db->insert('Log', $trackingLog);
        }
    }
    
    public function updateTrackingLog($idLog, array $trackingLog) {
        
        $this->db->where('idLog', $idLog);
        $this->db->update('Log', $trackingLog);
    }
    
    public function deleteTrackingLog($idLog){
        $this->db->where('idLog',$idLog);
        $this->db->delete('Log');
    }

}
