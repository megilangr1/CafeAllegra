<?php 
class SupplierM extends CI_Model
{
  private $_table = 'm_sup';

  public function dataSupplier()
  {
    $query = $this->db->get($this->_table);
    return $query;
  }

  public function cekNama($nama)
  {
    $query = $this->db->get_where($this->_table, ['FNA_SUP' => $nama]);
    return $query;
  }

  public function kodeOtomatis()
  {
    $query = $this->db->query("SELECT max(FK_SUP) as kode FROM $this->_table ");
    return $query;
  }

  public function save($kode, $a, $b, $c, $d, $e, $f, $g, $h, $i)
  {
    $data = [
      'FK_SUP' => $kode,
      'FNA_SUP' => $a,
      'FALAMAT' => $b,
      'FKOTA' => $c,
      'FTEL' => $d,
      'FCP' => $e,
      'FLAMA_BAYAR' => $f,
      'FPENERIMA' => $g,
      'FBANK' => $h,
      'FNO_ACC' => $i,
    ];

    $this->db->insert($this->_table, $data);
  }

  public function cekKode($kode)
  {
    $query = $this->db->get_where($this->_table, ['FK_SUP' => $kode]);
    return $query;
  }

  public function delete($kode)
  {
    $this->db->where('FK_SUP', $kode);
    $this->db->delete($this->_table);
  }

  public function update($kode, $nama, $b, $c, $d, $e, $f, $g, $h, $i)
  {
    $data = [
      'FNA_SUP' => $nama,
      'FALAMAT' => $b,
      'FKOTA' => $c,
      'FTEL' => $d,
      'FCP' => $e,
      'FLAMA_BAYAR' => $f,
      'FPENERIMA' => $g,
      'FBANK' => $h,
      'FNO_ACC' => $i,
    ];

    $this->db->where('FK_SUP', $kode);
    $this->db->update($this->_table, $data);
  }

}

?>