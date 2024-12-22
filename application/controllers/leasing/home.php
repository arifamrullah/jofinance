<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    session_start();
    class home extends CI_Controller {
        public function __construct() {
            parent::__construct();
            $this->load->model('MMobil');
        }
        /*
        public function index() {
            $config = array();
            $config['base_url'] = base_url() . 'index.php/leasing/home/index';
            $total_row = $this->MMobil->record_count();
            $config['total_rows'] = $total_row;
            $config['per_page'] = 1;
            $config['use_page_numbers'] = TRUE;
            $config['num_links'] = $total_row;
            $config['cur_tag_open'] = '&nbsp;<a class = "pagination">';
            $config['cur_tag_close'] = '</a>';
            $config['next_link'] = 'Next';
            $config['prev_link'] = 'Previous';
            
            $this->pagination->initialize($config);
            if ($this->uri->segment(3)) {
                $page = ($this->uri->segment(3));
            }
            
            $data['hasil'] = $this->MMobil->fetch_data($config['per_page']);
            $str_links = $this->pagination->create_links();
            $data['links'] = explode('&nbsp;',$str_links);
            
            $this->load->view('header');
            $this->load->view('leasing/menu');
            $this->load->view('leasing/home', $data);
            $this->load->view('footer');
        }
        */
        function index($offset=0) {
            $perpage = 4;
            $config = array(
                'base_url' => site_url('leasing/home/index'),
                'total_rows' => count($this->MMobil->select_all_paging()->result()),
                'per_page' => $perpage,
                'cur_tag_open' => '<a class = "pagination">',
                'cur_tag_close' => '</a>',
                'next_link' => 'Next',
                'prev_link' => 'Previous'
            );
            $this->pagination->initialize($config);
            $limit['perpage'] = $perpage;
            $limit['offset'] = $offset;
            
            $data['hasil'] = $this->MMobil->select_all_paging($limit)->result();
            $str_links = $this->pagination->create_links();
            $data['links'] = explode('&nbsp;', $str_links);
            $this->load->view('header');
            $this->load->view('leasing/menu');
            $this->load->view('leasing/home', $data);
            $this->load->view('footer');
        }
        function pilih_metode($kode) {
            $data['kode'] = $kode;
            $this->load->view('header');
            $this->load->view('leasing/menu');
            $this->load->view('leasing/VCashKredit', $data);
            $this->load->view('footer');
        }
		function search() {
			$data['hasil']=$this->MMobil->search();
			if ($data['hasil']==NULL) {
				echo " <script>
		            alert('Data Tidak Ditemukan');
		            history.go(-1);
		          </script>";
            } else {
				$this->load->view('header');
				$this->load->view('leasing/menu');
				$this->load->view('leasing/home', $data);
				$this->load->view('footer');
			}
		}
    }
?>