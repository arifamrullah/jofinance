<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    session_start();
    class CPaketKredit extends CI_Controller {
        public function __construct(){
            parent::__construct();
            $this->load->model('MPaketKredit');
            if (!$this->session->userdata('username')) {
                redirect('CLogin');
            }
        }
        function index() {
            $data['hasil'] = $this->MPaketKredit->get();
            $this->load->view('header');
            $this->load->view('manajer/menu');
            $this->load->view('manajer/VPaketKredit', $data);
            $this->load->view('footer');
        }
        function delete($id) {
            $this->db->delete('paket_kredit', array('kode_paket'=>$id));
            redirect('manajer/CPaketKredit');
        }
		function search(){
			$data['hasil']=$this->MPaketKredit->search();
			if($data['hasil']==NULL){
				echo " <script>
		            alert('Data Tidak Ditemukan');
		            history.go(-1);
		          </script>";
				}
			else {
				$this->load->view('header');
				$this->load->view('manajer/menu');
				$this->load->view('manajer/VPaketKredit',$data);
				$this->load->view('footer');
			}
		}
    }
?>