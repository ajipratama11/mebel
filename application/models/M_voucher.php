<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_voucher extends CI_Model {
  // Fungsi untuk menampilkan semua data gambar
  function tambahvoucher($kodevoucher,$namavoucher,$tglawal,$tglakhir,$totalvoucher,$minimumbelanja,$keterangan){
    $hasil=$this->db->query("INSERT INTO voucher(kode_voucher,nama_voucher,tgl_awal,tgl_akhir,total_voucher,minimum_belanja,keterangan) VALUES ('$kodevoucher','$namavoucher','$tglawal','$tglakhir','$totalvoucher','$minimumbelanja','$keterangan')");
    return $hasil;
  }
  
  function tampilvoucher(){
    $query = $this->db->query("SELECT * FROM voucher");
    return $query->result();
  }
  function tampilvoucher2($id_voucher){
    $query = $this->db->query("SELECT * FROM voucher WHERE id_voucher='$id_voucher'");
    return $query->result();
  }
  function hapusvoucher($id_voucher){
    $query = $this->db->query("DELETE FROM `voucher` WHERE id_voucher='$id_voucher'");
}
function ubahvoucher($idvoucher,$kodevoucher,$namavoucher,$tglawal,$tglakhir,$totalvoucher,$minimumbelanja,$keterangan){
    $query = $this->db->query("UPDATE `voucher` SET `kode_voucher`='$kodevoucher',`nama_voucher`='$namavoucher',`tgl_awal`='$tglawal',`tgl_akhir`='$tglakhir',`total_voucher`='$totalvoucher',`minimum_belanja`='$minimumbelanja',`keterangan`='$keterangan' WHERE id_voucher='$idvoucher'");
    return $query;
}
}
?>