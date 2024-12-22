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
            $this->load->view('admin/menu');
            $this->load->view('admin/VUser', $data);
            $this->load->view('footer');
        }
        function add() {
            if ($this->input->post('submit')) {
                $this->MUser->add();
                redirect('admin/CUser');
            }
            $this->load->view('header');
            $this->load->view('admin/menu');
            $this->load->view('admin/add_user');
            $this->load->view('footer');
        }
        function update($id) {
            if ($_POST==NULL) {
                $data['hasil'] = $this->MUser->select($id);
                $this->load->view('header');
                $this->load->view('admin/menu');
                $this->load->view('admin/up_user', $data);
                $this->load->view('footer');
            } else {
                $this->MUser->update($id);
                redirect('admin/CUser');
            }
        }
        function delete($id) {
            $this->db->delete('user', array('username'=>$id));
            redirect('admin/CUser');
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
                $this->load->view('admin/menu');
                $this->load->view('admin/VUser', $data);
                $this->load->view('footer');
            }
        }
    }
?>