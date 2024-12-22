<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class CLogin extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->model('MLogin');
        }
        function index(){
            $this->load->view('header');
            $this->load->view('form_login');
            $this->load->view('footer');
        }
        function login_check(){
            $data = array('username'=>$this->input->post('username', TRUE),
                          'password'=>md5($this->input->post('password',TRUE))
                         );
            $hasil = $this->MLogin->cek_user($data);
            if ($hasil->num_rows() <> 0) {
                foreach ($hasil->result() as $sess) {
                    $sess_data['username'] = $sess->username;
                    $sess_data['nama_lengkap'] = $sess->nama_lengkap;
                    $sess_data['hak'] = $sess->hak_akses;
                    $this->session->set_userdata($sess_data);
                }
                if ($this->session->userdata('hak')=='Administrator') {
                    redirect('admin/home');
                    echo "<script type='text/javascript'>
                            alert('Selamat Datang Admin');
                        </script>";
                } else if ($this->session->userdata('hak')=='Petugas') {
                    redirect('petugas/home');
                } else if ($this->session->userdata('hak')=='Leasing') {
                    redirect('leasing/home');
                } else {
                    redirect('manajer/home');
                }
            } else {
                echo "<script type='text/javascript'>
                        alert('Gagal login: Cek Username, Password!');
                        history.go(-1);
                    </script>";
            }
        }
        function logout(){
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('nama_lengkap');
            $this->session->unset_userdata('hak');
            session_destroy();
            redirect('CLogin');
        }
    }
?>