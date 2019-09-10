<?php 
class Admin extends CI_Controller
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
      }else{ 
        if ($cek->level != '1') {
          redirect(base_url());
        }else{
          $this->dataUser = $cek;
        }
      }
    }else{
      $this->session->sess_destroy();
      redirect(base_url());
    }
  }

  public function index()
  {
    $data = [
      'user' => $this->dataUser
    ];
    $this->load->view('Admin/main', $data);
  }

  public function logout()
  {
    $this->session->sess_destroy();
    redirect(base_url());
  }
}

?>