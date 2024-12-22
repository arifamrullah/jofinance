<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    session_start();
    class CBayarCicilan extends CI_Controller {
        public function __construct(){
            parent::__construct();
            $this->load->model('MBayarCicilan');
            $this->load->model('MKredit');
            $this->load->model('MPaketKredit');
            if (!$this->session->userdata('username')) {
                redirect('CLogin');
            }
        }
        function index() {
            $data['hasil'] = $this->MBayarCicilan->get();
            $this->load->view('header');
            $this->load->view('leasing/menu');
            $this->load->view('leasing/VBayarCicilan', $data);
            $this->load->view('footer');
        }
        function add() {
            if ($this->input->post('submit')) {
                $this->MBayarCicilan->add();
                redirect('leasing/CBayarCicilan');
            }
            $this->load->view('header');
            $this->load->view('leasing/menu');
            $this->load->view('leasing/add_bayar');
            $this->load->view('footer');
        }
        function update($id) {
            if ($_POST==NULL) {
                $data['hasil'] = $this->MBayarCicilan->select($id);
                $this->load->view('header');
                $this->load->view('leasing/menu');
                $this->load->view('leasing/up_bayar', $data);
                $this->load->view('footer');
            } else {
                $this->MBayarCicilan->update($id);
                redirect('leasing/CBayarCicilan');
            }
        }
        function detail($id) {
            if ($_POST==NULL) {
                $data['hasil'] = $this->MBayarCicilan->select($id);
                $this->load->view('header');
                $this->load->view('leasing/menu');
                $this->load->view('leasing/detail_bayar', $data);
                $this->load->view('footer');
            } else {
                $this->MBayarCicilan->bayar($id);
                redirect('leasing/CBayarCicilan');
            }
        }
        function delete($id) {
            $this->db->delete('bayar_cicilan', array('kode_cicilan'=>$id));
            redirect('leasing/CBayarCicilan');
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
                $this->load->view('leasing/menu');
                $this->load->view('leasing/VBayarCicilan', $data);
                $this->load->view('footer');
            }
        }
    }
?>