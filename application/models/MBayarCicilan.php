<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class MBayarCicilan extends CI_Model {
        function get() {
            $this->db->select('bayar_cicilan.*, kredit.kode_kredit');
            $this->db->join('kredit', 'kredit.kode_kredit = bayar_cicilan.kode_kredit', 'inner');
            $this->db->order_by('bayar_cicilan.kode_cicilan', 'asc');
            $get = $this->db->get('bayar_cicilan');
            if ($get->num_rows() > 0) {
                foreach ($get->result() as $data) {
                    $hasil[] = $data;
                }
                return $hasil;
            }
        }
        function add() {
            $kode = $this->input->post('kode');
            $kodekrd = $this->input->post('kodekrd');
            $tgl = $this->input->post('tgl');
            $jumcil = $this->input->post('jumcil');
            $cilke = $this->input->post('cilke');
            $cilsisake = $this->input->post('cilsisake');
            $cilsisahrg = $this->input->post('cilsisahrg');
            $data = array(
                'kode_cicilan'=>$kode,
                'kode_kredit'=>$kodekrd,
                'tgl_cicilan'=>$tgl,
                'jumlah_cicilan'=>$jumcil,
                'cicilan_ke'=>$cilke,
                'cicilan_sisa_ke'=>$cilsisake,
                'cicilan_sisa_harga'=>$cilsisahrg
            );
            $this->db->insert('bayar_cicilan', $data);
        }
        function update($id) {
            $kode = $this->input->post('kode');
            $kodekrd = $this->input->post('kodekrd');
            $tgl = $this->input->post('tgl');
            $jumcil = $this->input->post('jumcil');
            $cilke = $this->input->post('cilke');
            $cilsisake = $this->input->post('cilsisake');
            $cilsisahrg = $this->input->post('cilsisahrg');
            $data = array(
                'kode_cicilan'=>$kode,
                'kode_kredit'=>$kodekrd,
                'tgl_cicilan'=>$tgl,
                'jumlah_cicilan'=>$jumcil,
                'cicilan_ke'=>$cilke,
                'cicilan_sisa_ke'=>$cilsisake,
                'cicilan_sisa_harga'=>$cilsisahrg
            );
            $this->db->where('kode_cicilan', $id);
            $this->db->update('bayar_cicilan', $data);
        }
        function bayar($id) {
            $bulan = $this->input->post('bulan');
            $data = array('cicilan_ke'=>$bulan);
            $this->db->where('kode_cicilan', $id);
            $this->db->update('bayar_cicilan', $data);
        }
        function select($id) {
            return $this->db->get_where('bayar_cicilan', array('kode_cicilan'=>$id))->row();
        }
        function delete($id) {
            $this->db->delete('bayar_cicilan', array('kode_cicilan'=>$id));
        }
        function search() {
            $src = $this->input->post('keyword');
            $this->db->like('kode_cicilan', $src);
            $this->db->or_like('kode_kredit', $src);
            $hasil = $this->db->get('bayar_cicilan');
            return $hasil->result();
        }
        function lap_search($tgl_awal, $tgl_akhir) {
            $this->db->where('tgl_cicilan >=', $tgl_awal);
            $this->db->where('tgl_cicilan <=', $tgl_akhir);
            $hasil = $this->db->get('bayar_cicilan');
            return $hasil->result();
        }
    }
?>