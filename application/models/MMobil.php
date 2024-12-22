<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class MMobil extends CI_Model { 
        var $gallery_path;
        var $gallery_path_url;
        
        function __construct() {
            parent::__construct();
            $this->gallery_path = realpath(APPPATH . '../assets/img/car');
            $this->gallery_path_url = base_url().'assets/img/car/';
        }
        function select_all_paging($limit=array()) {
            $this->db->select('*');
            $this->db->from('mobil');
            $this->db->order_by('kode_mobil', 'asc');
            if ($limit != NULL)
                $this->db->limit($limit['perpage'], $limit['offset']);
                return $this->db->get();
        }
        /*
        public function record_count() {
            return $this->db->count_all('mobil');
        }
        public function fetch_data($limit) {
            $this->db->select('*');
            $this->db->from('mobil');
            $this->db->order_by('kode_mobil', 'asc');
            if ($limit != NULL)
                $this->db->limit($limit);
            return $this->db->get();
            $get = $this->db->get('mobil');
            if ($get->num_rows() > 0) {
                foreach ($get->result() as $data) {
                    $hasil[] = $data;
                }
                return $hasil;
            }
            return false;
        }
        */
        function get() {
            $files = scandir($this->gallery_path);
            $files = array_diff($files, array('.','..','thumbnails'));
            
            $get = $this->db->get('mobil');
            if($get->num_rows() > 0){
                foreach($get->result() as $data){
                    $hasil[] = $data;
                }
                return $hasil;
            }
        }
        function get_harga($kode) {
            $get = $this->db->query("select harga_mobil from mobil where kode_mobil = '$kode'");
            return $get->row();
        }
        function add() {
            $config = array(
                'allowed_types' => 'jpg|jpeg|gif|png',
                'upload_path' => $this->gallery_path,
                'max-size' => 1000,
                'max-width' => 1920,
                'max-height' => 1600
            );
            $this->load->library('upload', $config);
            $this->upload->do_upload();
            $datafile = $this->upload->data();
            
            $config = array(
                'source_image' => $datafile['full_path'],
                'new_image' => $this->gallery_path . '/thumbnails',
                'maintain_ration' => TRUE,
                'width' => 160,
                'height' => 120
            );
            
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $kode = $this->input->post('kode');
            $merk = $this->input->post('merk');
            $type = $this->input->post('type');
            $warna = $this->input->post('warna');
            $harga = $this->input->post('harga');
            $userfile = $_FILES['userfile']['name'];
            $data = array(
                'kode_mobil' => $kode,
                'merk' => $merk,
                'type' => $type,
                'warna' => $warna,
                'harga_mobil' => $harga,
                'gambar' => $userfile
            );
            $this->db->insert('mobil', $data);
        }
        function update($id) {
            $config = array(
                'allowed_types' => 'jpg|jpeg|gif|png',
                'upload_path' => $this->gallery_path,
                'max-size' => 1000,
                'max-width' => 1920,
                'max-height' => 1600
            );
            $this->load->library('upload', $config);
            $this->upload->do_upload();
            $datafile = $this->upload->data();
            
            $config = array(
                'source_image' => $datafile['full_path'],
                'new_image' => $this->gallery_path . '/thumbnails',
                'maintain_ration' => TRUE,
                'width' => 160,
                'height' => 120
            );
            
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $merk = $this->input->post('merk');
            $type = $this->input->post('type');
            $warna = $this->input->post('warna');
            $harga = $this->input->post('harga');
            $userfile = $_FILES['userfile']['name'];
            $data = array(
                'merk' => $merk,
                'type' => $type,
                'warna' => $warna,
                'harga_mobil' => $harga,
                'gambar' => $userfile
            );
            $this->db->where('kode_mobil', $id);
            $this->db->update('mobil', $data);
        }
        function select($id) {
            return $this->db->get_where('mobil', array('kode_mobil'=>$id))->row();
        }
        function delete($id) {
            $this->db->delete('mobil', array('kode_mobil'=>$id));
        }
		function search() {
			$search = $this->input->post('keyword');
			$this->db->like('kode_mobil', $search);
			$this->db->or_like('merk', $search);
			$this->db->or_like('type', $search);
			$this->db->order_by('kode_mobil', 'asc');
            $hasil = $this->db->get('mobil');
			return $hasil->result();
		}
    }
?>