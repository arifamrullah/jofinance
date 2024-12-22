<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    session_start();
    class CKredit extends CI_Controller {
        public function __construct(){
            parent::__construct();
            $this->load->model('MKredit');
            $this->load->model('MPembeli');
            $this->load->model('MMobil');
            $this->load->model('MPaketKredit');
            if (!$this->session->userdata('username')) {
                redirect('CLogin');
            }
        }
        function index() {
            $data['hasil'] = $this->MKredit->get();
            $this->load->view('header');
            $this->load->view('leasing/menu');
            $this->load->view('leasing/VKredit', $data);
            $this->load->view('footer');
        }
        function confirm($kode) {
            $data['kode'] = $kode;
            $data['kode_paket'] = $this->input->post('kode_paket');
            $data['KTP'] = $this->input->post('ktp');
            $data['harga'] = $this->MMobil->get_harga($kode);
            $this->load->view('header');
            $this->load->view('leasing/menu');
            $this->load->view('leasing/add_kredit', $data);
            $this->load->view('footer');
        }
        function add() {
            if ($this->input->post('submit')) {
                $this->MKredit->add();
                $this->load->view('header');
                $this->load->view('leasing/add_bayar');
                $this->load->view('leasing/menu');
                $this->load->view('footer');
            }
        }
        function update($id) {
            if ($_POST==NULL) {
                $data['hasil'] = $this->MKredit->select($id);
                $this->load->view('header');
                $this->load->view('leasing/menu');
                $this->load->view('leasing/up_kredit', $data);
                $this->load->view('footer');
            } else {
                $this->MKredit->update($id);
                redirect('leasing/CKredit');
            }
        }
        function delete($id) {
            $this->db->delete('kredit', array('kode_kredit'=>$id));
            redirect('leasing/CKredit');
        }
        function pilih_paket($kode) {
            $data['kode'] = $kode;
            $data['hasil'] = $this->MPaketKredit->get_paket($kode);
            $this->load->view('header');
            $this->load->view('leasing/menu');
            $this->load->view('leasing/pilih_paket', $data);
            $this->load->view('footer');
        }
        function pilih_pembeli($kode) {
            $data['kode'] = $kode;
            $data['kode_paket'] = $this->input->post('kode_paket');
            $data['hasil'] = $this->MPembeli->get();
            $this->load->view('header');
            $this->load->view('leasing/menu');
            $this->load->view('leasing/pilih_pembeli_kredit', $data);
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
                $this->load->view('leasing/menu');
                $this->load->view('leasing/VKredit', $data);
                $this->load->view('footer');
            }
        }
        function search_kr($kode) {
            $data['kode'] = $kode;
            $data['kode_paket'] = $kode_paket;
            $data['hasil'] = $this->MPembeli->search();
            if ($data['hasil']==NULL) {
                echo "<script>
                        alert('Data Tidak Ditemukan');
                        history.go(-1);
                    </script>";
            } else {
                $this->load->view('header');
                $this->load->view('leasing/menu');
                $this->load->view('leasing/pilih_pembeli_kredit', $data);
                $this->load->view('footer');
            }
        }
    }
?>