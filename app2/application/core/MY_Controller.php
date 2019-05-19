<?php

defined('BASEPATH') or exit('access denied');

class MY_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User');
        if (!isset($this->session->userdata['logged_in'])) {
            show_error('Brak dostepu!');
        }
    }

}
