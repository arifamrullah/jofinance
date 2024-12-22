<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class MKredit extends CI_Model {
        function get() {
            $this->db->select('kredit.*, pembeli.KTP, paket_kredit.kode_paket, mobil.kode_mobil');
            $this->db->join('pembeli', 'pembeli.KTP = kredit.KTP', 'inner');
            $this->db->join('paket_kredit', 'paket_kredit.kode_paket = kredit.kode_paket', 'inner');
            $this->db->join('mobil', 'mobil.kode_mobil = kredit.kode_mobil', 'inner');
            $this->db->order_by('kredit.kode_kredit', 'asc');
            $get = $this->db->get('kredit');
            if ($get->num_rows() > 0) {
                foreach ($get->result() as $data) {
                    $hasil[] = $data;
                }
                return $hasil;
            }
        }
        function add() {
            $ktp = $this->input->post('ktp');
            $kodepkt = $this->input->post('kodepkt');
            $kodembl = $this->input->post('kodembl');
            $tgl = $this->input->post('tgl');
            $fkktp = $this->input->post('fkktp');
            $fkkk = $this->input->post('fkkk');
            $fksg = $this->input->post('fksg');
            $data = array(
                'KTP'=>$ktp,
                'kode_paket'=>$kodepkt,
                'kode_mobil'=>$kodembl,
                'tgl_kredit'=>$tgl,
                'fotokopi_ktp'=>$fkktp,
                'fotokopi_kk'=>$fkkk,
                'fotokopi_slip_gaji'=>$fksg
            );
            $this->db->insert('kredit', $data);
        }
        function update($id) {
            $kode = $this->input->post('kode');
            $ktp = $this->input->post('ktp');
            $kodepkt = $this->input->post('kodepkt');
            $kodembl = $this->input->post('kodembl');
            $tgl = $this->input->post('tgl');
            $fkktp = $this->input->post('fkktp');
            $fkkk = $this->input->post('fkkk');
            $fksg = $this->input->post('fksg');
            $data = array(
                'kode_kredit'=>$kode,
                'KTP'=>$ktp,
                'kode_paket'=>$kodepkt,
                'kode_mobil'=>$kodembl,
                'tgl_kredit'=>$tgl,
                'fotokopi_ktp'=>$fkktp,
                'fotokopi_kk'=>$fkkk,
                'fotokopi_slip_gaji'=>$fksg
            );
            $this->db->where('kode_kredit', $id);
            $this->db->update('kredit', $data);
        }
        function select($id) {
            return $this->db->get_where('kredit', array('kode_kredit'=>$id))->row();
        }
        function delete($id) {
            $this->db->delete('kredit', 'bayar_cicilan', array('kode_kredit'=>$id));
        }
        function search() {
            $search = $this->input->post('keyword');
            $this->db->like('kode_kredit', $search);
            $this->db->or_like('kode_paket', $search);
            $this->db->or_like('kode_mobil', $search);
            $hasil = $this->db->get('kredit');
            return $hasil->result();
        }
        function lap_search($tgl_awal, $tgl_akhir) {
            $this->db->where('tgl_kredit >=', $tgl_awal);
            $this->db->where('tgl_kredit <=', $tgl_akhir);
            $hasil = $this->db->get('kredit');
            return $hasil->result();
        }
    }
?>