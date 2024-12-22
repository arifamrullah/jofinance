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
            $this->load->view('header');
            $this->load->view('manajer/menu');
            $this->load->view('manajer/LapKredit');
            $this->load->view('footer');
        }
        function delete($id) {
            $this->db->delete('kredit', array('kode_kredit'=>$id));
            redirect('manajer/CKredit');
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
                $this->load->view('leasing/menu');
                $this->load->view('leasing/VKredit', $data);
                $this->load->view('footer');
            }
        }
        function lap_search() {
            $tgl_awal = $this->input->post('tgl_awal');
            $tgl_akhir = $this->input->post('tgl_akhir');
            $data['hasil'] = $this->MKredit->lap_search($tgl_awal, $tgl_akhir);
            if ($data['hasil']==NULL) {
                echo "<script>
                        alert('Data Tidak Ditemukan');
                        history.go(-1);
                    </script>";
            } else {
                $this->load->view('header');
                $this->load->view('manajer/menu');
                $this->load->view('manajer/VKredit', $data);
                $this->load->view('footer');
            }
        }
    }
?>