<?php

defined('BASEPATH') or exit('access denied');

class Log extends CI_Model {
    
    public function clearLogs() {
        $this->db->empty_table('Log');
    }

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

    public function insertTracking(array $trackingLogs) {
        $this->db->reset_query();
        $modifiedData = $trackingLogs;
        unset($modifiedData['Description']);
        $query = $this->db->get_where('Log', $modifiedData);
        
        if (sizeof($query->result()) === 0) {
            $this->db->insert('Log', $trackingLogs);
        }
    }
    
    public function updateTrackingLog($idLog, array $trackingLog) {
        
        $this->db->where('idLog', $idLog);
        $this->db->update('Log', $trackingLog);
    }
    
    public function deleteTrackingLog($idLog){
        $this->db->delete('Log', array('idLog' => $idLog)); 
    }
    
    public function deleteLogByTrackingId($idTracking){
        $this->db->delete('Log',array('Tracking_idTracking' => $idTracking));
    }

}
