<?php 
class RelasiM extends CI_Model
{
  private $_table = 'rls_mat_sup';
  private $_vtable = 'v_rls_mat_sup';

  public function dataSP()
  {
    $query = $this->db->get('m_sup');
    return $query;
  }

  public function dataRelasi($sup)
  {
    $query = $this->db->get_where($this->_vtable, ['FK_SUP' => $sup]);
    return $query;
  }

  public function dataMaterial()
  {
    $query = $this->db->get('m_mat');
    return $query;
  }

  public function dMaterial($mat)
  {
    $query = $this->db->get_where('m_mat', ['FK_MAT' => $mat]);
    return $query;
  }


  public function cekSP($sup)
  {
    $query = $this->db->get_where('m_sup', ['FK_SUP' => $sup]);
    return $query;
  }

  public function cekRelasi($sup, $mat)
  {
    $query = $this->db->get_where($this->_table, ['FK_SUP' => $sup, 'FK_MAT' => $mat]);
    return $query;
  }

  public function save($a, $b, $c, $d)
  {
    $data = [
      'FK_SUP' => $a,
      'FK_MAT' => $b,
      'FHARGA' => $c,
      'FN_MAT_SUP' => $d
    ];

    $this->db->insert($this->_table, $data);
  }
 
  public function delete($sup, $mat)
  {
    $this->db->where('FK_SUP', $sup);
    $this->db->where('FK_MAT', $mat);
    $this->db->delete($this->_table);
  }
}


?>