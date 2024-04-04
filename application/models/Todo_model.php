<?php
class Todo_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_todo_list() {
        $query = $this->db->get('todos');
        return $query->result();
    }
     public function get_todo_item($id) {
        $query = $this->db->get_where('todos', array('id' => $id));
        return $query->row();
    }

    public function add_todo_item($data) {
        $this->db->insert('todos', $data);
    }

    public function update_todo_item($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('todos', $data);
    }

    public function delete_todo_item($id) {
        $this->db->where('id', $id);
        $this->db->delete('todos');
    }

}
?>
