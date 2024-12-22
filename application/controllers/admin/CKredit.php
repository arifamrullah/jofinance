<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    session_start();
    class CKredit extends CI_Controller {
        public function __construct(){
            parent::__construct();
            $this->load->model('MKredit');
            if (!$this->session->userdata('username')) {
                redirect('CLogin');
            }
        }
        function index() {
            $data['hasil'] = $this->MKredit->get();
            $this->load->view('header');
            $this->load->view('admin/menu');
            $this->load->view('admin/VKredit', $data);
            $this->load->view('footer');
        }
        function search() {
            $data['hasil'] = $this->MKredit->search();
            if ($data['hasil']==NULL) {
                echo "<script>
                        alert('Data Tidak Ditemukan');
                        history.go(-1);
                    </script>";
            } else {
                $this->load->view('header');
                $this->load->view('admin/menu');
                $this->load->view('admin/VKredit', $data);
                $this->load->view('footer');
            }
        }
    }
?>