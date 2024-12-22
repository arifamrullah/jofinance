<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class MPaketKredit extends CI_Model {
		function select_all_paging($limit=array()) {		
			$this->db->select('*');
            $this->db->from('paket_kredit');
            $this->db->order_by('kode_paket', 'asc');
			if ($limit != NULL)
                $this->db->limit($limit['perpage'], $limit['offset']);
                return $this->db->get();
		}
        function get() {
            $this->db->select('paket_kredit.*, mobil.kode_mobil');
            $this->db->join('mobil', 'mobil.kode_mobil = paket_kredit.kode_mobil', 'inner');
            $this->db->order_by('paket_kredit.kode_paket', 'asc');
            $get = $this->db->get('paket_kredit');
            if ($get->num_rows() > 0) {
                foreach ($get->result() as $data) {
                    $hasil[] = $data;
                }
                return $hasil;
            }
        }
        function get_paket($kode) {
            $get = $this->db->query("select * from paket_kredit where kode_mobil = '$kode'");
            if ($get->num_rows() > 0) {
                foreach ($get->result() as $data) {
                    $hasil[] = $data;
                }
                return $hasil;
            }
        }
        function add() {
            $kode = $this->input->post('kode');
            $harga = $this->input->post('harga');
            $dp = $this->input->post('dp');
            $jumcil = $this->input->post('jumcil');
            $bunga = $this->input->post('bunga');
            $nilcil = $this->input->post('nilcil');
            $data = array(
                'kode_paket'=>$kode,
                'harga_paket'=>$harga,
                'uang_muka'=>$dp,
                'paket_jumlah_cicilan'=>$jumcil,
                'bunga'=>$bunga,
                'nilai_cicilan'=>$nilcil
            );
            $this->db->insert('paket_kredit', $data);
        }
        function update($id) {
            $kode = $this->input->post('kode');
            $harga = $this->input->post('harga');
            $dp = $this->input->post('dp');
            $jumcil = $this->input->post('jumcil');
            $bunga = $this->input->post('bunga');
            $nilcil = $this->input->post('nilcil');
            $data = array(
                'kode_paket'=>$kode,
                'harga_paket'=>$harga,
                'uang_muka'=>$dp,
                'paket_jumlah_cicilan'=>$jumcil,
                'bunga'=>$bunga,
                'nilai_cicilan'=>$nilcil
            );
            $this->db->where('kode_paket', $id);
            $this->db->update('paket_kredit', $data);
        }
        function select($id) {
            return $this->db->get_where('paket_kredit', array('kode_paket'=>$id))->row();
        }
        function delete($id) {
            $this->db->delete('paket_kredit', array('kode_paket'=>$id));
        }
        function search() {
            $search = $this->input->post('keyword');
            $this->db->like('kode_paket', $search);
            $hasil = $this->db->get('paket_kredit');
            return $hasil->result();
        }
    }
?>