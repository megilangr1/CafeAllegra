<?php 
class GroupMaterial extends CI_Controller
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
          $this->load->model('GroupMaterialM');
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
      'user' => $this->dataUser,
      'dataGM' => $this->GroupMaterialM->dataGM(),
      'pg' => 'Admin/Master/groupmaterial1'
    ];

    $this->load->view('Admin/main', $data);
  }

  public function tambah()
  {
    if (isset($_POST['sav'])) {
      $a = trim($this->input->post('nama'));

      $cekNama = $this->GroupMaterialM->cekNama($a);
      if ($cekNama->num_rows() > 0) {
        echo "<script>alert('Nama Material $a Sudah Ada !');window.history.back();</script>";
      }else{
        $k = $this->GroupMaterialM->kodeOtomatis();
        $k1 = $k->row_array();
        $k2 = $k1['kode'];
        $k3 = (int) substr($k2, 0,3);
        $k3++;

        $kode = sprintf('%03s', $k3);

        $this->GroupMaterialM->save($kode, $a);
        echo "<script>alert('Data Group Material Berhasil di-Tambahkan !');window.location='".base_url('Admin/Group-Material')."';</script>";
      }
    }else{
      redirect('Admin/Group-Material');
    }
  }

  public function hapus()
  {
    $kode = $this->uri->segment(4);
    $cek = $this->GroupMaterialM->cekKode($kode);
    if ($cek->num_rows() > 0) {
      $this->GroupMaterialM->delete($kode);
      echo "<script>alert('Data Group Material Berhasil di-Hapus !');window.location='".base_url('Admin/Group-Material')."';</script>";
    }else{
      redirect(base_url('Admin/Group-Material'));
    }
  }

  public function edit()
  {
    $kode = $this->uri->segment(4);
    $cek = $this->GroupMaterialM->cekKode($kode);
    if ($cek->num_rows() > 0) {
      $data = [
        'user' => $this->dataUser,
        'dataGM' => $this->GroupMaterialM->dataGM(),
        'pg' => 'Admin/Master/groupmaterial1',
        'edit' => $cek->row()
      ];

      $this->load->view('Admin/main', $data);
    }else{
      redirect(base_url('Admin/Group-Material'));
    }
  }

  public function update()
  {
    if (isset($_POST['ed'])) {
      $kode = $this->input->post('kode');
      $namaLama = $this->input->post('namaLama');
      $a = trim($this->input->post('nama'));

      if ($a == $namaLama) {
        $this->GroupMaterialM->update($kode, $namaLama);
        echo "<script>alert('Data Group Material Berhasil di-Ubah !');window.location='".base_url('Admin/Group-Material')."';</script>";        
      }else{
        $cekNama = $this->GroupMaterialM->cekNama($a);
        if ($cekNama->num_rows() > 0) {
          echo "<script>alert('Nama Material $a Sudah Ada !');window.history.back();</script>"; 
        }else{
          $this->GroupMaterialM->update($kode, $a);
          echo "<script>alert('Data Group Material Berhasil di-Ubah !');window.location='".base_url('Admin/Group-Material')."';</script>";
        }
      }
    }else{
      redirect('Admin/Group-Material');
    }
  }
}

?>