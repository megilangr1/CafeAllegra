<?php 
class BarangM extends CI_Model
{
  private $_table = 'm_brg'; // Pendeklarasian Table

  public function dataBarang()
  {
    $query = $this->db->get($this->_table); // $query =  "SELECT * FROM m_brg";
    return $query; // Pengiriman Data Hasil Eksekusi Query Menuju Controller
  }

  public function cekNama($nama) // $nama -> adalah data yang di kirim dari controller 
  {
    $query = $this->db->get_where($this->_table, ['FN_BRG' => $nama]); // $query = "SELECT * FROM m_brg WHERE FN_BRG = '$nama' ";
    return $query; // Pengiriman Data Hasil Eksekusi Query Menuju Controller
  }

  public function kodeOtomatis($huruf_pertama) // $huruf_pertama -> adalah data yang di kirim dari controller
  {
    $query = $this->db->query("SELECT max(FK_BRG) as kode FROM $this->_table WHERE FK_BRG LIKE 'BR$huruf_pertama%' "); 
    return $query; // Pengiriman Data Hasil Eksekusi Query Menuju Controller
  }

  public function save($kode_barang, $nama_barang, $satuan, $stok_min, $stok_max) // $kode_barang, $nama_barang, $satuan, $stok_min, $stok_max -> adalah data yang di kirim dari controller
  {
    $data = [
      'FK_BRG' => $kode_barang, // Field FK_BRG di isi dengan $kode_barang
      'FN_BRG' => $nama_barang, // Field FN_BRG di isi dengan $nama_barang
      'FSAT' => $satuan, // Field FSAT di isi dengan $satuan
      'FSTOK_MIN' => $stok_min, // Field FSTOK_MIN di isi dengan $stok_min
      'FSTOK_MAX' => $stok_max // Field FSTOK_MIN di isi dengan $stok_min
    ];  

    $this->db->insert($this->_table, $data); // "INSERT INTO m_brg VALUES $data";
  }

  public function cekKode($kode) // $kode -> adalah data yang di kirim dari controller 
  {
    $query = $this->db->get_where($this->_table, ['FK_BRG' => $kode]); // $query = "SELECT * FROM m_brg WHERE FK_BRG = '$kode' ";
    return $query; // Pengiriman Data Hasil Eksekusi Query Menuju Controller
  }

  public function update($kode_barang, $nama_barang, $satuan, $stok_min, $stok_max) // $kode_barang, $nama_barang, $satuan, $stok_min, $stok_max -> adalah data yang di kirim dari controller
  {
    $data = [
      'FN_BRG' => $nama_barang, // Field FN_BRG di isi dengan $nama_barang  
      'FSAT' => $satuan, // Field FSAT di isi dengan $satuan
      'FSTOK_MIN' => $stok_min, // Field FSTOK_MIN di isi dengan $stok_min
      'FSTOK_MAX' => $stok_max // Field FSTOK_MIN di isi dengan $stok_min
    ]; // Pencocokan Field Untuk Update Data


    $this->db->where('FK_BRG', $kode_barang); // Kondisi Where Untuk Update | query = "WHERE FK_BRG = '$kode_barang';

    $this->db->update($this->_table, $data); // Query Update | query = "UPDATE m_brg SET $data"; 
    /*
    ---- Penting !! ----
    Alur Update Pada Model CI 
    1. $data / Pencocokan Data Yang Akan di-Update
    2. Pendeklarasian WHERE (Apabila Menggunakan Kondisi WHERE) | $this->db->where(field_table, $kode);
    3. Eksekusi Query Update | $this->db->update(table, $data);  
    --------------------
    */
  }

  public function delete($kode_barang) // $kode_barang -> adalah data yang di kirim dari controller
  {
    $this->db->where('FK_BRG', $kode_barang); // Kondisi Where Untuk Delete | query = "WHERE FK_BRG = '$kode_barang';
    
    $this->db->delete($this->_table); // "DELETE FROM m_brg"; 
    /*
    ---- Penting !! ----
    Alur Delete Pada Model CI  
    1. Pendeklarasian WHERE (Apabila Menggunakan Kondisi WHERE) | $this->db->where(field_table, $kode);
    2. Eksekusi Query Delete | $this->db->delete(table);  
    --------------------
    */
  }
}

?>