<?php
class PrintData extends CI_Controller
{
  private $dataUser = '';

  public function __construct()
  {
    parent::__construct();
    if ($this->session->has_userdata('uid')) {
      $uid = $this->session->userdata('uid');
      $this->load->model('Sesi');
      $cek = $this->Sesi->cekLogin($uid);
      if ($cek == '0') {
        $this->session->sess_destroy();
        redirect(base_url());
      } else {
        if ($cek->level != '1') {
          redirect(base_url());
        } else {
          $this->dataUser = $cek;
          $this->load->model('PrintM');
        }
      }
    } else {
      $this->session->sess_destroy();
      redirect(base_url());
    }
  }

  public function pembelian($id, $sup)
  {
    $data = [
      'tb' => $this->PrintM->tpembelian($id, $sup),
      'sd' => $this->PrintM->tpembelian($id, $sup)->row()
    ];

    $this->load->view('Admin/Print/printdata', $data);
  }
}
