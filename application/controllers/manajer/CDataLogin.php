<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    session_start();
    class CDataLogin extends CI_Controller {
        public function __construct(){
            parent::__construct();
            $this->load->model('MLogin');
            if (!$this->session->userdata('username')) {
                redirect('CLogin');
            }
        }
        function index(){
            $data['hasil']=$this->MLogin->get();
            $this->load->view('header');
            $this->load->view('manajer/menu');
            $this->load->view('manajer/VDataLogin',$data);
            $this->load->view('footer');
        }
        function search() {
            $data['hasil'] = $this->MLogin->search();
            if ($data['hasil']==NULL) {
                echo "<script>
                        alert('Data Tidak Ditemukan');
                        history.go(-1);
                    </script>";
            } else {
                $this->load->view('header');
                $this->load->view('manajer/menu');
                $this->load->view('manajer/VDataLogin', $data);
                $this->load->view('footer');
            }
        }
    }
?>