<?php 
class GroupProdukDetailM extends CI_Model
{
  private $_table = 'ref_gpr2';
  private $_view = 'v_gpr2';

  public function dataGPD()
  {
    $query = $this->db->get($this->_table);
    return $query;
  }

  public function cekNama($kodeGPR1, $nama)
  {
    $query = $this->db->get_where($this->_table, ['FK_GPR1' => $kodeGPR1, 'FN_GPR2' => $nama]);
    return $query;  
  }

  public function kodeOtomatis($kodeGPR1)
  { 
    $query = $this->db->query("SELECT max(FK_GPR2) as kode FROM $this->_table WHERE FK_GPR1='$kodeGPR1' ");
    return $query;
  }

  public function save($kodeGPR1, $kode, $nama)
  {
    $data = [
      'FK_GPR1' => $kodeGPR1,
      'FK_GPR2' => $kode,
      'FN_GPR2' => $nama
    ];
    
    $this->db->insert($this->_table, $data);
  }

  public function cekKode($kodeGPR1, $kode)
  {
    $query = $this->db->get_where($this->_view, ['FK_GPR1' => $kodeGPR1, 'FK_GPR2' => $kode]);
    return $query;
  }

  public function delete($kodeGPR1, $kode)
  {
    $this->db->where('FK_GPR1', $kodeGPR1);
    $this->db->where('FK_GPR2', $kode);
    $this->db->delete($this->_table);
  }

  public function update($kodeGPR1, $kode, $nama)
  {
    $data = [
      'FN_GPR2' => $nama
    ];

    $this->db->where('FK_GPR1', $kodeGPR1);
    $this->db->where('FK_GPR2', $kode);
    $this->db->update($this->_table, $data);
  }
}

?>