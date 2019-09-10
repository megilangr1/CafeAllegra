<?php 
class Sesi extends CI_Model
{
  private $_table = 'pegawai';

  public function cekLogin($a)
  {
    $s1 = $this->db->get_where($this->_table, ['uid' => $a]);
    if ($s1->num_rows() > 0) {
      $r1 = $s1->row();
      if ($r1->aktif != '1') {
        $data = '0';
      }else{
        $data = $r1;
      }
    }else{
      $data = '0';
    }

    return $data;
  }
}

?>