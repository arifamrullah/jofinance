<?php
    session_start();
    class CBayarCicilan extends CI_Controller {
        public function __construct(){
            parent::__construct();
            $this->load->model('MBayarCicilan');
            if (!$this->session->userdata('username')) {
                redirect('CLogin');
            }
        }
        function index() {
            $data['hasil'] = $this->MBayarCicilan->get();
            $this->load->view('header');
            $this->load->view('admin/menu');
            $this->load->view('admin/VBayarCicilan', $data);
            $this->load->view('footer');
        }
        function search() {
            $data['hasil'] = $this->MBayarCicilan->search();
            if ($data['hasil']==NULL) {
                echo "<script>
                        alert('Data Tidak Ditemukan');
                        history.go(-1);
                    </script>";
            } else {
                $this->load->view('header');
                $this->load->view('admin/menu');
                $this->load->view('admin/VBayarCicilan', $data);
                $this->load->view('footer');
            }
        }
    }
?>