<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    session_start();
    class CBeliCash extends CI_Controller {
        public function __construct(){
            parent::__construct();
            $this->load->model('MBeliCash');
            if (!$this->session->userdata('username')) {
                redirect('CLogin');
            }
        }
        /*
        function is_logged_in(){
            $is_logged_in=$this->session->userdata('is_logged_in');
            if(!isset($is_logged_in)||$is_logged_in!= true) {
                echo "Anda Belum Login<br/>Silahkan <a href=\"".base_url()."\">Login</a> $is_logged_in";
            } 
        }
        */
        function index() {
            $this->load->view('header');
            $this->load->view('manajer/menu');
            $this->load->view('manajer/LapBeliCash');
            $this->load->view('footer');
        }
        function delete($id) {
            $this->db->delete('beli_cash', array('kode_cash'=>$id));
            redirect('manajer/CBeliCash');
        }
        function search() {
            $data['hasil'] = $this->MBeliCash->search();
            if ($data['hasil']==NULL) {
                echo "<script>
                        alert('Data Tidak Ditemukan');
                        history.go(-1);
                    </script>";
            } else {
                $this->load->view('header');
                $this->load->view('manajer/menu');
                $this->load->view('manajer/VBeliCash', $data);
                $this->load->view('footer');
            }
        }
        function lap_search() {
            $tgl_awal = $this->input->post('tgl_awal');
            $tgl_akhir = $this->input->post('tgl_akhir');
            $data['hasil'] = $this->MBeliCash->lap_search($tgl_awal, $tgl_akhir);
            if ($data['hasil']==NULL) {
                echo "<script>
                        alert('Data Tidak Ditemukan');
                        history.go(-1);
                    </script>";
            } else {
                $this->load->view('header');
                $this->load->view('manajer/menu');
                $this->load->view('manajer/VBeliCash', $data);
                $this->load->view('footer');
            }
        }
    }
?>