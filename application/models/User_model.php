<?php
class User_model extends CI_Model {

    public function check_login($username, $password) {
        return $this->db->get_where('users', [
            'username' => $username,
            'password' => $password
        ])->row();
    }

    public function insert($data) {
        return $this->db->insert('users', $data);
    }
}
