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
        function index($offset=0) {
            /*
            $perpage = 10;
            $config = array(
                'base_url' => site_url('petugas/CMobil'),
                'total_rows' => count($this->MMobil->select_all_paging()->result()),
                'per_page' => $perpage,
            );
            
            $this->pagination->initialize($config);
            $limit['perpage'] = $perpage;
            $limit['offset'] = $offset;
            */
            $data['hasil'] = $this->MMobil->get();
            $this->load->view('header');
            $this->load->view('petugas/menu');
            $this->load->view('petugas/VMobil', $data);
            $this->load->view('footer');
        }
        function add() {
            if ($this->input->post('submit')) {
                $this->MMobil->add();
                redirect('petugas/CMobil');
            }
            $this->load->view('header');
            $this->load->view('petugas/menu');
            $this->load->view('petugas/add_mobil');
            $this->load->view('footer');
        }
        function update($id) {
            if ($_POST==NULL) {
                $data['hasil'] = $this->MMobil->select($id);
                $this->load->view('header');
                $this->load->view('petugas/menu');
                $this->load->view('petugas/up_mobil', $data);
                $this->load->view('footer');
            } else {
                $this->MMobil->update($id);
                redirect('petugas/CMobil');
            }
        }
        function delete($id) {
            $this->db->delete('mobil', array('kode_mobil'=>$id));
            redirect('petugas/CMobil');
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
                $this->load->view('petugas/menu');
                $this->load->view('petugas/VMobil', $data);
                $this->load->view('footer');
            }
        }
    }
?>