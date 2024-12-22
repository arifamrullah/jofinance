<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    session_start();
    class home extends CI_Controller {
        public function __construct() {
            parent::__construct();
            if (!$this->session->userdata('username')) {
                redirect('CLogin');
            }
        }
        function index() {
            $this->load->view('header');
            $this->load->view('manajer/menu');
            $this->load->view('manajer/home');
            $this->load->view('footer');
        }
    }
?>