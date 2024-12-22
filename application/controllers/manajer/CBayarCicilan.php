<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
            $this->load->view('header');
            $this->load->view('manajer/menu');
            $this->load->view('manajer/LapBayarCicilan');
            $this->load->view('footer');
        }
        function delete($id) {
            $this->db->delete('bayar_cicilan', array('kode_cicilan'=>$id));
            redirect('manajer/CBayarCicilan');
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
                $this->load->view('manajer/menu');
                $this->load->view('manajer/VBayarCicilan', $data);
                $this->load->view('footer');
            }
        }
        function lap_search() {
            $tgl_awal = $this->input->post('tgl_awal');
            $tgl_akhir = $this->input->post('tgl_akhir');
            $data['hasil'] = $this->MBayarCicilan->lap_search($tgl_awal, $tgl_akhir);
            if ($data['hasil']==NULL) {
                echo "<script>
                        alert('Data Tidak Ditemukan');
                        history.go(-1);
                    </script>";
            } else {
                $this->load->view('header');
                $this->load->view('manajer/menu');
                $this->load->view('manajer/VBayarCicilan', $data);
                $this->load->view('footer');
            }
        }
    }
?>