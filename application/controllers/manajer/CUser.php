<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    session_start();
    class CUser extends CI_Controller {
        function __construct() {
            parent::__construct();
            $this->load->model('MUser');
            if (!$this->session->userdata('username')) {
                redirect('CLogin');
            }
        }
        function index() {
            $data['hasil'] = $this->MUser->get();
            $this->load->view('header');
            $this->load->view('manajer/menu');
            $this->load->view('manajer/VUser', $data);
            $this->load->view('footer');
        }
        function delete($id) {
            $this->db->delete('user', array('username'=>$id));
            redirect('manajer/CUser');
        }
        function search() {
            $data['hasil'] = $this->MUser->search();
            if ($data['hasil']==NULL) {
                echo "<script>
                        alert('Data Tidak Ditemukan');
                        history.go(-1);
                    </script>";
            } else {
                $this->load->view('header');
                $this->load->view('manajer/menu');
                $this->load->view('manajer/VUser', $data);
                $this->load->view('footer');
            }
        }
    }
?>