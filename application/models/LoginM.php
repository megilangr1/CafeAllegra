<?php
class LoginM extends CI_Model
{
  private $_table = 'pegawai';

  public function login($a, $b)
  {
    $s1 = $this->db->get_where($this->_table, ['username' => $a, 'password' => $b]);
    return $s1;
  }
}

?>