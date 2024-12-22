<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class MPembeli extends CI_Model {
		function select_all_paging($limit=array()) {		
			$this->db->select('*');
            $this->db->from('pembeli');
            $this->db->order_by('nama_pembeli', 'asc');
			if ($limit != NULL)
                $this->db->limit($limit['perpage'], $limit['offset']);
                return $this->db->get();
		}
        function get() {
            $this->db->order_by('nama_pembeli', 'asc');
            $get = $this->db->get('pembeli');
            if ($get->num_rows() > 0) {
                foreach ($get->result() as $data) {
                    $hasil[] = $data;
                }
                return $hasil;
            }
        }
        function add() {
            $ktp = $this->input->post('ktp');
            $nama = $this->input->post('nama');
            $alamat = $this->input->post('alamat');
            $telp = $this->input->post('telp');
            $data = array(
                'KTP'=>$ktp,
                'nama_pembeli'=>$nama,
                'alamat_pembeli'=>$alamat,
                'telp_pembeli'=>$telp
            );
            $this->db->insert('pembeli', $data);
        }
        function update($id) {
            $ktp = $this->input->post('ktp');
            $nama = $this->input->post('nama');
            $alamat = $this->input->post('alamat');
            $telp = $this->input->post('telp');
            $data = array(
                'KTP'=>$ktp,
                'nama_pembeli'=>$nama,
                'alamat_pembeli'=>$alamat,
                'telp_pembeli'=>$telp
            );
            $this->db->where('KTP', $id);
            $this->db->update('pembeli', $data);
        }
        function select($id) {
            return $this->db->get_where('pembeli', array('KTP'=>$id))->row();
        }
		function search() {
			$search = $this->input->post('keyword');
			$this->db->like('nama_pembeli', $search);
			$this->db->order_by('nama_pembeli', 'asc');
            $hasil = $this->db->get('pembeli');
            return $hasil->result();
		}
    }
?>