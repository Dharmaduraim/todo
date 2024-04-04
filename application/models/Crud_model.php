<?php
class Crud_model extends CI_Model 
{
  /* insert */
    function saverecords($data)
  {
        $this->db->insert('crud',$data);
        return true;
  }

    /*Display*/
    function display_records()
  {
    $query=$this->db->get("crud");
    return $query->result();
  }
  function deleterecords($id)
  {
    $this->db->where("id", $id);
    $this->db->delete("crud");
    return true;
  }
  /* update */
  function displayrecordsById($id)
  {
        $this->db->where("id", $id);
       $query= $this->db->get("crud");
    return $query->row();
  }
    function update_records($first_name,$last_name,$email,$id)
  {
  $query=$this->db->query("update crud SET first_name='$first_name',last_name='$last_name',email='$email' where id='$id'");
  }
}
?>