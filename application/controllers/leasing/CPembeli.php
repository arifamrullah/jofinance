<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    session_start();
    class CPembeli extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->model('MPembeli');
            if (!$this->session->userdata('username')) {
                redirect('CLogin');
            }
        }
    }
?>