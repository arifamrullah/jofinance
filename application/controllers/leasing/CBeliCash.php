<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    session_start();
    class CBeliCash extends CI_Controller {
        public function __construct(){
            parent::__construct();
            $this->load->model('MBeliCash');
            $this->load->model('MPembeli');
            $this->load->model('MMobil');
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
            $data['hasil'] = $this->MBeliCash->get();
            $this->load->view('header');
            $this->load->view('leasing/menu');
            $this->load->view('leasing/VBeliCash', $data);
            $this->load->view('footer');
        }
        function confirm($kode) {
            $data['kode'] = $kode;
            $data['KTP'] = $this->input->post('ktp');
            $data['harga'] = $this->MMobil->get_harga($kode);
            $this->load->view('header');
            $this->load->view('leasing/menu');
            $this->load->view('leasing/add_beli', $data);
            $this->load->view('footer');
        }
        function add() {
            if ($this->input->post('submit')) {
                $this->MBeliCash->add();
                redirect('leasing/CBeliCash');
            }
            $this->load->view('header');
            $this->load->view('leasing/menu');
            $this->load->view('leasing/add_beli');
            $this->load->view('footer');
        }
        function update($id) {
            if ($_POST==NULL) {
                $data['hasil'] = $this->MBeliCash->select($id);
                $this->load->view('header');
                $this->load->view('leasing/menu');
                $this->load->view('leasing/up_beli', $data);
                $this->load->view('footer');
            } else {
                $this->MBeliCash->update($id);
                redirect('leasing/CBeliCash');
            }
        }
        function delete($id) {
            $this->db->delete('beli_cash', array('kode_cash'=>$id));
            redirect('leasing/CBeliCash');
        }
        function pilih_pembeli($kode) {
            $data['kode'] = $kode;
            $data['hasil'] = $this->MPembeli->get();
            $this->load->view('header');
            $this->load->view('leasing/menu');
            $this->load->view('leasing/pilih_pembeli', $data);
            $this->load->view('footer');
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
                $this->load->view('leasing/menu');
                $this->load->view('leasing/VBeliCash', $data);
                $this->load->view('footer');
            }
        }
    }
?>