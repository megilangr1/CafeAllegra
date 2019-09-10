<?php
class MaterialM extends CI_Model
{
  private $_table = 'm_mat';

  public function dataMaterial()
  {
    $query = $this->db->get($this->_table);
    return $query;
  }

  public function dataGM()
  {
    $query = $this->db->get('ref_gmat1');
    return $query;
  }

  public function dataGMD($gmat1)
  {
    $query = $this->db->get_where('ref_gmat2', ['FK_GMAT1' => $gmat1]);
    return $query;
  }

  public function cekNama($kode, $nama)
  {
    $query = $this->db->query("SELECT * FROM $this->_table WHERE FN_MAT='$nama' AND FK_MAT LIKE '$kode%' ");
    return $query;
  }

  public function kodeOtomatis($FK)
  {
    $query = $this->db->query("SELECT max(FK_MAT) as kode FROM $this->_table WHERE FK_MAT LIKE '$FK%' ");
    return $query;
  }

  public function save($a, $b, $c, $d, $e)
  {
    $data = [
      'FK_MAT' => $a,
      'FN_MAT' => $b,
      'FSAT' => $c,
      'FSTOK_MIN' => $d,
      'FSTOK_MAX' => $e
    ];

    $this->db->insert($this->_table, $data);
  }
  
  public function cekKode($kode)
  {
    $query = $this->db->get_where($this->_table, ['FK_MAT' => $kode]);
    return $query;
  }
  
  public function gmat1($gmat1)
  {
    $query = $this->db->get_where('ref_gmat1', ['FK_GMAT1' => $gmat1]);
    return $query;
  }

  public function gmat2($gmat1, $gmat2)
  {
    $query = $this->db->get_where('ref_gmat2', ['FK_GMAT1' => $gmat1, 'FK_GMAT2' => $gmat2]);
    return $query;
  }

  public function delete($kode)
  {
    $this->db->where('FK_MAT', $kode);
    $this->db->delete($this->_table);
  }

  public function update($kode, $a, $b, $c, $d)
  {
    $data = [
      'FN_MAT' => $a,
      'FSAT' => $b,
      'FSTOK_MIN' => $c,
      'FSTOK_MAX' => $d
    ];
    $this->db->where('FK_MAT', $kode);
    $this->db->update($this->_table, $data);
  }
}

?>