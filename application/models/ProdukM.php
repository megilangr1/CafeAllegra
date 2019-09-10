<?php
class ProdukM extends CI_Model
{
  private $_table = 'm_pr';

  public function dataProduk()
  {
    $query = $this->db->get($this->_table);
    return $query;
  }

  public function dataGroupProduk()
  {
    $query = $this->db->get('ref_gpr1');
    return $query;
  }

  public function dataGPD($gpr1)
  {
    $query = $this->db->get_where('ref_gpr2', ['FK_GPR1' => $gpr1]);
    return $query;
  }

  public function cekNama($kode, $nama)
  {
    $query = $this->db->query("SELECT * FROM $this->_table WHERE FN_BPR='$nama' AND FK_BPR LIKE '$kode%' ");
    return $query;
  }

  public function kodeOtomatis($FK)
  {
    $query = $this->db->query("SELECT max(FK_BPR) as kode FROM $this->_table WHERE FK_BPR LIKE '$FK%' ");
    return $query;
  }

  public function save($a, $b, $c, $d)
  {
    $data = [
      'FK_BPR' => $a,
      'FN_BPR' => $b,
      'FSAT' => $c,
      'FHARGA' => $d
    ];

    $this->db->insert($this->_table, $data);
  }
  
  public function cekKode($kode)
  {
    $query = $this->db->get_where($this->_table, ['FK_BPR' => $kode]);
    return $query;
  }
  
  public function gpr1($gpr1)
  {
    $query = $this->db->get_where('ref_gpr1', ['FK_GPR1' => $gpr1]);
    return $query;
  }

  public function gpr2($gpr1, $gpr2)
  {
    $query = $this->db->get_where('ref_gpr2', ['FK_GPR1' => $gpr1, 'FK_GPR2' => $gpr2]);
    return $query;
  }

  public function delete($kode)
  {
    $this->db->where('FK_BPR', $kode);
    $this->db->delete($this->_table);
  }

  public function update($kode, $a, $b, $c)
  {
    $data = [
      'FN_BPR' => $a,
      'FSAT' => $b,
      'FHARGA' => $c
    ];
    $this->db->where('FK_BPR', $kode);
    $this->db->update($this->_table, $data);
  }
}

?>