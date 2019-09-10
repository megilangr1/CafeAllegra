<?php 
class GroupMaterialDetailM extends CI_Model
{
  private $_table = 'ref_gmat2';
  private $_tablev = 'v_gmat2';

  public function dataGM()
  {
    $query = $this->db->get('ref_gmat1');
    return $query;
  }

  public function dataGMD()
  {
    $query = $this->db->get($this->_table);
    return $query;
  }

  public function cekNama($gmat1, $nama)
  {
    $query = $this->db->get_where($this->_table, ['FN_GMAT2' => $nama, 'FK_GMAT1' => $gmat1]);
    return $query;
  }

  public function kodeOtomatis($gmat1)
  {
    $query = $this->db->query("SELECT max(FK_GMAT2) as kode FROM $this->_table WHERE FK_GMAT1='$gmat1' ");
    return $query;
  }

  public function save($gmat1, $kode, $nama)
  {
    $data = [
      'FK_GMAT1' => $gmat1,
      'FK_GMAT2' => $kode,
      'FN_GMAT2' => $nama
    ];

    $this->db->insert($this->_table, $data);
  }

  public function cekKode($gmat1, $kode)
  {
    $query = $this->db->get_where($this->_tablev, ['FK_GMAT2' => $kode, 'FK_GMAT1' => $gmat1]);
    return $query;
  }

  public function update($gmat1, $kode, $nama)
  {
    $data = [
      'FN_GMAT2' => $nama 
    ];

    $this->db->where('FK_GMAT2', $kode);
    $this->db->where('FK_GMAT1', $gmat1);
    $this->db->update($this->_table, $data);
  }

  public function delete($gmat1, $kode)
  {
    $this->db->where('FK_GMAT2', $kode);
    $this->db->where('FK_GMAT1', $gmat1);
    $this->db->delete($this->_table);
  }
}

?>