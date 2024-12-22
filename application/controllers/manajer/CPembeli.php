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
            $this->load->view('manajer/menu');
            $this->load->view('manajer/VPembeli',$data);
            $this->load->view('footer');
        }
        function delete($id){
            $this->db->delete('pembeli',array('KTP'=>$id));
            redirect('manajer/CPembeli');
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
                $this->load->view('manajer/menu');
                $this->load->view('manajer/VPembeli', $data);
                $this->load->view('footer');
            }
        }
    }
?>