<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class MUser extends CI_Model {
        function get() {
            $get = $this->db->get('user');
            if ($get->num_rows() > 0) {
                foreach ($get->result() as $data) {
                    $hasil[] = $data;
                }
                return $hasil;
            }
        }
        function add() {
            $user = $this->input->post('user');
            $pass = md5($this->input->post('pass'));
            $nama = $this->input->post('nama');
            $hak = $this->input->post('hak');
            $data = array(
                'username'=>$user,
                'password'=>$pass,
                'nama_lengkap'=>$nama,
                'hak_akses'=>$hak
            );
            $this->db->insert('user', $data);
        }
        function update($id) {
            $user = $this->input->post('user');
            $nama = $this->input->post('nama');
            $hak = $this->input->post('hak');
            $data = array(
                'username'=>$user,
                'nama_lengkap'=>$nama,
                'hak_akses'=>$hak
            );
            $this->db->where('username', $id);
            $this->db->update('user', $data);
        }
        function select($id) {
            return $this->db->get_where('user', array('username'=>$id))->row();
        }
        function delete($id) {
            $this->db->delete('user', array('username'=>$id));
        }
        function search() {
            $search = $this->input->post('keyword');
            $this->db->like('username', $search);
            $this->db->or_like('nama_lengkap', $search);
            $this->db->or_like('hak_akses', $search);
            $hasil = $this->db->get('user');
            return $hasil->result();
        }
    }
?>