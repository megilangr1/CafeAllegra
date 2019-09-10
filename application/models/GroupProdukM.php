<?php 
class GroupProdukM extends CI_Model
{
  private $_table = 'ref_gpr1';

  public function dataGroupProduk()
  {
    $query = $this->db->get($this->_table);
    return $query;
  }

  public function cekNama($nama)
  {
    $query = $this->db->get_where($this->_table, ['FN_GPR1' => $nama]);
    return $query;
  }

  public function kodeOtomatis()
  {
    $query = $this->db->query("SELECT max(FK_GPR1) as kode FROM $this->_table WHERE FK_GPR1 LIKE 'F%' ");
    return $query;
  }

  public function save($kode, $nama)
  {
    $data = [
      'FK_GPR1' => $kode,
      'FN_GPR1' => $nama
    ];

    $this->db->insert($this->_table, $data);
  }

  public function cekKode($kode)
  {
    $query = $this->db->get_where($this->_table, ['FK_GPR1' => $kode]);
    return $query;
  }

  public function delete($kode)
  {
    $this->db->where('FK_GPR1', $kode);
    $this->db->delete($this->_table);
  }

  public function update($kode, $nama)
  {
    $data = [
      'FN_GPR1' => $nama 
    ];

    $this->db->where('FK_GPR1', $kode);
    $this->db->update($this->_table, $data);
  }

}

?>