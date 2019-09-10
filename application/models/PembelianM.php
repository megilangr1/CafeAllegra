<?php
class PembelianM extends CI_Model
{
  private $_h = 'h_beli';
  private $_t = 't_beli';
  private $_th = 't_hd';

  public function dataSupplier()
  {
    $query = $this->db->get('m_sup');
    return $query;
  }

  public function cekSupplier($sp)
  {
    $query = $this->db->get_where('m_sup', ['FK_SUP' => $sp]);
    return $query;
  }

  public function dataMaterial($sup)
  {
    $query = $this->db->get_where('v_rls_mat_sup', ['FK_SUP' => $sup]);
    return $query;
  }

  public function cekMaterial($mat)
  {
    $query = $this->db->get_where('v_rls_mat_sup', ['FK_MAT' => $mat]);
    return $query;
  }

  public function kodeOtomatis($tg, $sup)
  {
    $query = $this->db->query("SELECT max(FNO_BELI) as kode FROM h_beli WHERE FNO_BELI LIKE '$tg%' AND FK_SUP='$sup' ");
    return $query;
  }

  public function saveh($a, $b, $c, $d)
  {
    $data = [
      'FNO_BELI' => $a,
      'FTGL_BELI' => $b,
      'FK_SUP' => $c,
      'FHC' => $d
    ];

    $this->db->insert($this->_h, $data);
  }

  public function saved($a, $b, $c, $d)
  {
    $data = [
      'FNO_BELI' => $a,
      'FK_MAT' => $b,
      'FQTY' => $c,
      'FHARGA' => $d
    ];

    $this->db->insert($this->_t, $data);
  }

  public function savehd($a, $b, $c, $d)
  {
    $data = [
      'FNO_BELI' => $a,
      'FK_SUP' => $b,
      'FJML' => $c,
      'FBAYAR' => $d,
      'FTGL_BAYAR' => null
    ];

    $this->db->insert($this->_th, $data);
  }
}
