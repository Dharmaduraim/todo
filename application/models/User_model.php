<?php
class User_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function create_user($data) {
        $this->db->insert('users', $data);
        return $this->db->insert_id();
    }

    public function get_user_by_email($email) {
        $query = $this->db->get_where('users', array('email' => $email));
        return $query->row();
    }

 public function authenticate($email, $password) {
        $query = $this->db->get_where('users', array('email' => $email, 'password' => $password));
        return $query->row();
    }

}
?>
