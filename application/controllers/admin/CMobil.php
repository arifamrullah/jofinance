<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    session_start();
    class CMobil extends CI_Controller {        
        public function __construct() {
            parent::__construct();
            $this->load->model('MMobil');
            if (!$this->session->userdata('username')) {
                redirect('CLogin');
            }
        }
        function index() {
            $data['hasil'] = $this->MMobil->get();
            $this->load->view('header');
            $this->load->view('admin/menu');
            $this->load->view('admin/VMobil', $data);
            $this->load->view('footer');
        }
        function search() {
            $data['hasil'] = $this->MMobil->search();
            if ($data['hasil']==NULL) {
                echo "<script>
                        alert('Data Tidak Ditemukan');
                        history.go(-1);
                    </script>";
            } else {
                $this->load->view('header');
                $this->load->view('admin/menu');
                $this->load->view('admin/VMobil', $data);
                $this->load->view('footer');
            }
        }
    }
?>