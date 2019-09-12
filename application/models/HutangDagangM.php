<?php
class HutangDagangM extends CI_Model
{
  private $_table = 't_hd';

  public function dataHutang()
  {
    $query = $this->db->get($this->_table);
    return $query;
  }
}
