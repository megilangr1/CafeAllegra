<?php
class PerkiraanM extends CI_Model
{
  private $_table = 'm_perk';

  public function dataPerkiraan()
  {
    $query = $this->db->get($this->_table);
    return $query;
  }

  public function save($a, $b, $c)
  {
    $data = [
      'FK_PERK' => $a,
      'FN_PERK' => $b,
      'FSALDO_NORMAL' => $c
    ];

    $this->db->insert($this->_table, $data);
  }

  public function cekKode($id)
  {
    $query = $this->db->get_where($this->_table, ['FK_PERK' => $id]);
    return $query;
  }
}
