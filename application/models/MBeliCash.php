<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class MBeliCash extends CI_Model {        
        function get() {
            $this->db->select('beli_cash.*, pembeli.KTP, mobil.kode_mobil');
            $this->db->join('pembeli', 'pembeli.KTP = beli_cash.KTP', 'inner');
            $this->db->join('mobil', 'mobil.kode_mobil = beli_cash.kode_mobil', 'inner');
            $this->db->order_by('beli_cash.kode_cash', 'asc');
            $get = $this->db->get('beli_cash');
            if ($get->num_rows() > 0) {
                foreach ($get->result() as $data) {
                    $hasil[] = $data;
                }
                return $hasil;
            }
        }
        function add() {
            $ktp = $this->input->post('ktp');
            $kodembl = $this->input->post('kodembl');
            $cashtgl = $this->input->post('cashtgl');
            $cashbyr = $this->input->post('cashbyr');
            $data = array(
                'KTP'=>$ktp,
                'kode_mobil'=>$kodembl,
                'cash_tgl'=>$cashtgl,
                'cash_bayar'=>$cashbyr
            );
            $this->db->insert('beli_cash', $data);
        }
        function update($id) {
            $kode = $this->input->post('kode');
            $ktp = $this->input->post('ktp');
            $kodembl = $this->input->post('kodembl');
            $cashtgl = $this->input->post('cashtgl');
            $cashbyr = $this->input->post('cashbyr');
            $data = array(
                'kode_cash'=>$kode,
                'KTP'=>$ktp,
                'kode_mobil'=>$kodembl,
                'cash_tgl'=>$cashtgl,
                'cash_bayar'=>$cashbyr
            );
            $this->db->where('kode_cash', $id);
            $this->db->update('beli_cash', $data);
        }
        function select($id) {
            return $this->db->get_where('beli_cash', array('kode_cash'=>$id))->row();
        }
        function delete($id) {
            $this->db->delete('beli_cash', array('kode_cash'=>$id));
        }
        function search() {
            $search = $this->input->post('keyword');
            $this->db->like('kode_cash', $search);
            $this->db->or_like('kode_mobil', $search);
            $hasil = $this->db->get('beli_cash');
            return $hasil->result();
        }
        function lap_search($tgl_awal, $tgl_akhir) {
            $this->db->where('cash_tgl >=', $tgl_awal);
            $this->db->where('cash_tgl <=', $tgl_akhir);
            $hasil = $this->db->get('beli_cash');
            return $hasil->result();
        }
    }
?>