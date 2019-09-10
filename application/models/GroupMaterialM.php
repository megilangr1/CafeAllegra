<?php 
class GroupMaterialM extends CI_Model
{
  private $_table = 'ref_gmat1';

  public function dataGM()
  {
    $query = $this->db->get($this->_table);
    return $query;
  }

  public function cekNama($nama)
  {
    $query = $this->db->get_where($this->_table, ['FN_GMAT1' => $nama]);
    return $query;
  }

  public function kodeOtomatis()
  {
    $query = $this->db->query("SELECT max(FK_GMAT1) as kode FROM $this->_table");
    return $query;
  }

  public function save($kode, $nama)
  {
    $data = [
      'FK_GMAT1' => $kode,
      'FN_GMAT1' => $nama
    ];
    $this->db->insert($this->_table, $data);
  }

  public function cekKode($kode)
  {
    $query = $this->db->get_where($this->_table, ['FK_GMAT1' => $kode]);
    return $query;
  }

  public function delete($kode)
  {
    $this->db->where('FK_GMAT1', $kode);
    $this->db->delete($this->_table);
  }

  public function update($kode, $nama)
  {
    $data = [
      'FN_GMAT1' => $nama
    ];

    $this->db->where('FK_GMAT1', $kode);
    $this->db->update($this->_table, $data);
  }
}
