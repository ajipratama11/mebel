<?php 

class M_faq extends CI_Model {

    function tampil_faq(){
      $query = $this->db->query("SELECT * FROM faq");
      return $query->result();
    }
  function save(){
    $data = array(
      "id_faq" => $this->input->post('id_faq'),
      "nama" => $this->input->post('nama'),
      "kritik" => $this->input->post('kritik')
      
    );
    
    $this->db->insert('faq', $data); // Untuk mengeksekusi perintah insert data
  }

}
?>