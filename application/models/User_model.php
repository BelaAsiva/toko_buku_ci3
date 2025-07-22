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


    public function getAll() {
        return $this->db->get('users')->result();
    }


    public function getById($id) {
        return $this->db->get_where('users', ['id' => $id])->row();
    }

    public function update($id, $data) {
        return $this->db->where('id', $id)->update('users', $data);
    }

    public function delete($id) {
        return $this->db->delete('users', ['id' => $id]);
    }
}
