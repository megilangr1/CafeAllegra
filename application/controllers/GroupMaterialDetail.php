<?php 
class GroupMaterialDetail extends CI_Controller
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
          $this->load->model('GroupMaterialDetailM');
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
      'dataGM' => $this->GroupMaterialDetailM->dataGM(),
      'dataGMD' => $this->GroupMaterialDetailM->dataGMD(),
      'pg' => 'Admin/Master/groupmaterial2'
    ];

    $this->load->view('Admin/main', $data);
  }

  public function tambah()
  {
    if (isset($_POST['sav'])) {
      $gmat1 = trim($this->input->post('gmat1'));
      $a = trim($this->input->post('nama'));
      $cek = $this->GroupMaterialDetailM->cekNama($gmat1, $a);
      if ($cek->num_rows() > 0) {
        echo "<script>alert('Nama Group Material Detail $a Sudah Ada ! ');window.history.back();</script>";
      }else{
        $k = $this->GroupMaterialDetailM->kodeOtomatis($gmat1);
        $k1 = $k->row_array();
        $k2 = $k1['kode'];
        $k3 = (int) substr($k2, 0,1);
        $k3++;

        $kode = sprintf('%01s', $k3);

        $this->GroupMaterialDetailM->save($gmat1, $kode, $a);
        echo "<script>alert('Data Group Material Berhasil di-Tambahkan !');window.location='".base_url('Admin/Group-Material-Detail')."';</script>";
      }
    }else{
      redirect('Admin/Group-Material-Detail');
    }
  }

  public function hapus()
  {
    $gmat1 = $this->uri->segment(4);
    $gmat2 = $this->uri->segment(5);
    $cek = $this->GroupMaterialDetailM->cekKode($gmat1, $gmat2);
    if ($cek->num_rows() > 0) {
      $this->GroupMaterialDetailM->delete($gmat1, $gmat2);
      echo "<script>alert('Data Group Produk Detail Berhasil di-Hapus !');window.location='".base_url('Admin/Group-Material-Detail')."';</script>";
    }else{
      redirect('Admin/Group-Material-Detail');
    }
  }

  public function edit()
  {
    $gmat1 = $this->uri->segment(4);
    $gmat2 = $this->uri->segment(5);
    $cek = $this->GroupMaterialDetailM->cekKode($gmat1, $gmat2);
    if ($cek->num_rows() > 0) {
      $data = [
        'user' => $this->dataUser,
        'dataGMD' => $this->GroupMaterialDetailM->dataGMD(),
        'pg' => 'Admin/Master/groupmaterial2',
        'edit' => $cek->row()
      ];

      $this->load->view('Admin/main', $data);
    }else{
      redirect('Admin/Group-Material->Detail');
    }

  }

  public function update()
  {
    if (isset($_POST['ed'])) {
      $gmat1 = trim($this->input->post('gmat1'));
      $gmat2 = trim($this->input->post('gmat2'));
      $namaLama = trim($this->input->post('namaLama'));
      $a = trim($this->input->post('nama'));
      if ($a == $namaLama) {
        $this->GroupMaterialDetailM->update($gmat1, $gmat2, $a);
        echo "<script>alert('Data Group Produk Detail Berhasil di-Ubah !');window.location='".base_url('Admin/Group-Material-Detail')."';</script>";        
      }else{ 
        $cek = $this->GroupMaterialDetailM->cekNama($gmat1, $a);
        if ($cek->num_rows() > 0) {
          echo "<script>alert('Nama Group Material Detail $a Sudah Ada ! ');window.history.back();</script>";        
        }else{
          $this->GroupMaterialDetailM->update($gmat1, $gmat2, $a);
          echo "<script>alert('Data Group Produk Detail Berhasil di-Ubah !');window.location='".base_url('Admin/Group-Material-Detail')."';</script>";
        }
      }
      
    }else{
      redirect('Admin/Group-Material-Detail');
    }
  }

}
?>