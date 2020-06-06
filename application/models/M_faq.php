<?php 

class M_faq extends CI_Model {

    function tampil_faq(){
      $query = $this->db->query("SELECT * FROM faq");
      return $query->result();
    }
    function tambah_faq(){
     $query=$this->db->query("INSERT INTO faq ('id_faq','kritik','nama') VALUES ('$id_faq','$kritik','$nama)");
    return $query;
    }
}
?>