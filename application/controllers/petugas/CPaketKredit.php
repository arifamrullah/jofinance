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
            /*
            $perpage = 10;
            $config = array(
                'base_url' => site_url('petugas/CPaketKredit'),
                'total_rows' => count($this->MPaketKredit->select_all_paging()->result()),
                'per_page' => $perpage,
            );
            
            $this->pagination->initialize($config);
            $limit['perpage'] = $perpage;
            $limit['offset'] = $offset;
            */
            $data['hasil'] = $this->MPaketKredit->get();
            $this->load->view('header');
            $this->load->view('petugas/menu');
            $this->load->view('petugas/VPaketKredit', $data);
            $this->load->view('footer');
        }
        function add() {
            if ($this->input->post('submit')) {
                $this->MPaketKredit->add();
                redirect('petugas/CPaketKredit');
            }
            $this->load->view('header');
            $this->load->view('petugas/menu');
            $this->load->view('petugas/add_paket');
            $this->load->view('footer');
        }
        function update($id) {
            if ($_POST==NULL) {
                $data['hasil'] = $this->MPaketKredit->select($id);
                $this->load->view('header');
                $this->load->view('petugas/menu');
                $this->load->view('petugas/up_paket', $data);
                $this->load->view('footer');
            } else {
                $this->MPaketKredit->update($id);
                redirect('petugas/CPaketKredit');
            }
        }
        function delete($id) {
            $this->db->delete('paket_kredit', array('kode_paket'=>$id));
            redirect('petugas/CPaketKredit');
        }
		function search(){
            /*
			$perpage = 10;
			$config = array(
				'base_url' => site_url('petugas/CPaketKredit'),
				'total_rows' => count($this->MPaketKredit->search()->result()),
				'per_page' => $perpage,
			);
			$this->pagination->initialize($config);
			$limit['perpage'] = $perpage;
			$limit['offset'] = $offset;
            */
			
			$data['hasil']=$this->MPaketKredit->search();
			if($data['hasil']==NULL){
				echo " <script>
		            alert('Data Tidak Ditemukan');
		            history.go(-1);
		          </script>";
				}
			else {
				$this->load->view('header');
				$this->load->view('petugas/menu');
				$this->load->view('petugas/VPaketKredit',$data);
				$this->load->view('footer');
			}
		}
    }
?>