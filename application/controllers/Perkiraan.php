<?php
class Perkiraan extends CI_Controller
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
          $this->load->model('PerkiraanM');
        }
      }
    } else {
      $this->session->sess_destroy();
      redirect(base_url());
    }
  }

  public function index()
  {
    $data = [
      'tb' => $this->PerkiraanM->dataPerkiraan(),
      'user' => $this->dataUser,
      'pg' => 'Admin/Master/perkiraan'
    ];

    $this->load->view('Admin/main', $data);
  }

  public function tambah()
  {
    if (isset($_POST['sav'])) {
      $a = trim($this->input->post('kode'));
      $b = trim($this->input->post('nama'));
      $c = trim($this->input->post('saldo'));

      $this->PerkiraanM->save($a, $b, $c);

      echo "<script>alert('Data Perkiraan Berhasil di-Tambahkan !');window.location='" . base_url('Admin/Perkiraan') . "';</script>";
    } else {
      redirect('Admin/Perkiraan');
    }
  }

  public function hapus($id)
  {
    $cek = $this->PerkiraanM->cekKode($id);
    if ($cek->num_rows() > 0) {
      $this->PerkiraanM->delete($id);
      echo "<script>alert('Data Perkiraan Berhasil di-Hapus !');window.location='" . base_url('Admin/Perkiraan') . "';</script>";
    } else {
      redirect('Admin/Perkiraan');
    }
  }
}
