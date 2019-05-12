<?php

defined('BASEPATH') or exit('access denied');

class CsvImport extends MY_Controller {

    private $uploadData;


    public function index() {
        $this->load->view('dashboard/header');
        $this->load->view('dashboard/uploadForm');
        $this->load->view('dashboard/footer');
    }

    public function doImport() {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'csv';
        $config['max_size'] = 100;

        $this->load->library('upload', $config);
        $this->load->library('CsvImporter');
        if (!$this->upload->do_upload('userfile')) {
            $data = array('message' => $this->upload->display_errors());
            $this->load->view('dashboard/header');
            $this->load->view('dashboard/uploadForm', $data);
            $this->load->view('dashboard/footer');
        } else {
            $this->uploadData = $this->upload->data();
            $this->load->view('/dashboard/uploadForm');
            $this->readCsvFile($this->uploadData['full_path']);
        }
    }

    private function readCsvFile($file) {
        $this->csvimporter->initialize($file, ',', '"');
        $csvArray = $this->csvimporter->read();
        $this->load->model('Tracking');
        foreach($csvArray as $trackingRecord){
            if($trackingRecord['internal'] === null){
                $this->Tracking->insertTracking($trackingRecord['dpd']);
            } else {
                $this->Tracking->insertTracking($trackingRecord['dpd'],$trackingRecord['internal']);
            }
        }
        redirect('Dashboard');
    }

}
