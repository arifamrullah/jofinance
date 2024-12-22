<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    session_start();
    class CPembeli extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->model('MPembeli');
            if (!$this->session->userdata('username')) {
                redirect('CLogin');
            }
        }
        function index(){
            $data['hasil']=$this->MPembeli->get();
            $this->load->view('header');
            $this->load->view('petugas/menu');
            $this->load->view('petugas/VPembeli',$data);
            $this->load->view('footer');
        }
        function add(){
            if($this->input->post('submit')){
                $this->MPembeli->add();
                redirect('petugas/CPembeli');
            }
            $this->load->view('header');
            $this->load->view('petugas/menu');
            $this->load->view('petugas/add_pembeli');
            $this->load->view('footer');
        }
        function update($id){
            if($_POST==NULL){
                $data['hasil'] = $this->MPembeli->select($id);
                $this->load->view('header');
                $this->load->view('petugas/menu');
                $this->load->view('petugas/up_pembeli', $data);
                $this->load->view('footer');
            } else {
                $this->MPembeli->update($id);
                redirect('petugas/CPembeli');
            }
        }
        function delete($id){
            $this->db->delete('pembeli',array('KTP'=>$id));
            redirect('petugas/CPembeli');
        }
        function search() {
            $data['hasil'] = $this->MPembeli->search();
            if ($data['hasil']==NULL) {
                echo "<script>
                        alert('Data Tidak Ditemukan');
                        history.go(-1);
                    </script>";
            } else {
                $this->load->view('header');
                $this->load->view('petugas/menu');
                $this->load->view('petugas/VPembeli', $data);
                $this->load->view('footer');
            }
        }
    }
?>