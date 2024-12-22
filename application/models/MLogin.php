<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class MLogin extends CI_Model {
        function get() {
            $get = $this->db->get('login');
            if ($get->num_rows() > 0) {
                foreach ($get->result() as $data) {
                    $hasil[] = $data;
                }
                return $hasil;
            }
        }
        function cek_user($data) {
            /*
            $user = $this->input->post('username');
            $this->db->query("insert into login(username) values('$user')");
            */
            $query = $this->db->get_where('user', $data);
            return $query;
        }
        function search() {
            $search = $this->input->post('keyword');
            $this->db->like('username', $search);
            $hasil = $this->db->get('login');
            return $hasil->result();
        }
    }
?>