<?php
class DataPembelianM extends CI_Model
{
  public function dataPembelian()
  {
    $this->db->select('*, SUM(FHARGA * FQTY) as total, COUNT(FK_MAT) as jml_mat');
    $this->db->group_by('FK_SUP');
    $this->db->group_by('FNO_BELI');
    $query = $this->db->get('v_beli');
    return $query;
  }
}
