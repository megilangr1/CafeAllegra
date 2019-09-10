<?php
class PrintM extends CI_Model
{
  public function tpembelian($id, $sup)
  {
    $query = $this->db->get_where('v_beli', ['FNO_BELI' => $id, 'FK_SUP' => $sup]);
    return $query;
  }
}
