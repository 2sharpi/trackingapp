<?php

defined('BASEPATH') or exit('access denied');
    
    if(!function_exists('renderFullView')){
        
       function renderFullView($data){
           $this->load->view('header');
           $this->load->view('index',$data);
           $this->load->view('footer');
       }
    }
