<?php 
class GroupProdukDetail extends CI_Controller
{
  private $dataUser = '';

  public function __construct()
  {
    parent::__construct();
    if ($this->session->has_userdata('uid')) {
      $uid = $this->session->userdata('uid');
      $this->load->model('Sesi');
      $cekSesi = $this->Sesi->cekLogin($uid);
      if ($cekSesi == '0') {
        $this->session->sess_destroy();
        redirect(base_url());
      }else{
        if ($cekSesi->level != '1') {
          redirect(base_url());
        }else{
          $this->dataUser = $cekSesi;
          $this->load->model('GroupProdukDetailM');
          $this->load->model('GroupProdukM');
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
      'dataGP' => $this->GroupProdukM->dataGroupProduk(),
      'dataGPD' => $this->GroupProdukDetailM->dataGPD(),
      'pg' => 'Admin/Master/groupproduk2' 
    ];

    $this->load->view('Admin/main', $data);  
  }

  public function tambah()
  {
    if (isset($_POST['sav'])) {
      $groupProduk = trim($this->input->post('groupProduk'));
      $namaGroupDetail = trim($this->input->post('namaGroupDetail'));
			$cekNama = $this->GroupProdukDetailM->cekNama($groupProduk, $namaGroupDetail);
			if ($cekNama->num_rows() > 0) {
				echo "<script>alert('Nama Group Produk Detail $namaGroupDetail pada Group Produk Sudah Ada !');window.history.back();</script>";
			}else{
				$kode_otomatis = $this->GroupProdukDetailM->kodeOtomatis($groupProduk);
				$r = $kode_otomatis->row_array();
				$r1 = $r['kode'];
				$r2 = (int) substr($r1, 0,1);
				$r2++;

				$kode = sprintf('%01s', $r2);
  
				$this->GroupProdukDetailM->save($groupProduk, $kode, $namaGroupDetail);
				echo "<script>alert('Data Group Produk Berhasil di-Tambahkan !');window.location='".base_url('Admin/Group-Produk-Detail')."';</script>";
			}
    }else{
      redirect(base_url('Admin/Group-Produk-Detail'));
    }
  }

  public function hapus()
  { 
    $gpr1 = $this->uri->segment(4);
    $gpr2 = $this->uri->segment(5);
    $cek = $this->GroupProdukDetailM->cekKode($gpr1, $gpr2);
    if ($cek->num_rows() > 0) {
      $this->GroupProdukDetailM->delete($gpr1, $gpr2);
      echo "<script>alert('Data Group Detail Berhasil di-Hapus !');window.location='".base_url('Admin/Group-Produk-Detail')."';</script>";
    }else{
      redirect(base_url('Admin/Group-Produk-Detail'));
    }
  }

  public function edit()
  {
    $gpr1 = $this->uri->segment(4);
    $gpr2 = $this->uri->segment(5);
    $cek = $this->GroupProdukDetailM->cekKode($gpr1, $gpr2);
    if ($cek->num_rows() > 0) {
      $data = [
        'user' => $this->dataUser,
        'dataGP' => $this->GroupProdukM->dataGroupProduk(),
        'dataGPD' => $this->GroupProdukDetailM->dataGPD(),
        'pg' => 'Admin/Master/groupproduk2',
        'edit' => $cek->row()
      ];

      $this->load->view('Admin/main', $data);
    }else{
      redirect(base_url('Admin/Group-Produk-Detail'));
    }
  }

  public function update()
  {
    if (isset($_POST['ed'])) {
      $gpr1 = trim($this->input->post('gpr1'));
      $gpr2 = trim($this->input->post('gpr2'));
      $namaLama = trim($this->input->post('namaLama'));

      $namaBaru = trim($this->input->post('namaGroupDetail'));
      if ($namaLama == $namaBaru) {
        $this->GroupProdukDetailM->update($gpr1, $gpr2, $namaLama);
        echo "<script>alert('Data Group Model Berhasil Di-Ubah !');window.location='".base_url('Admin/Group-Produk-Detail')."';</script>";
      }else{
        $cekNama = $this->GroupProdukDetailM->cekNama($gpr1, $namaBaru);
        if ($cekNama->num_rows() > 0) {
          echo "<script>alert('Nama Group Produk Detail $namaBaru Sudah Ada Untuk Group Produk $gpr1');window.history.back();</script>";
        }else{
          $this->GroupProdukDetailM->update($gpr1, $gpr2, $namaBaru);
          echo "<script>alert('Data Group Model Berhasil Di-Ubah !');window.location='".base_url('Admin/Group-Produk-Detail')."';</script>";
        }
      }


    }else{
      redirect(base_url('Admin/Group-Produk-Detail'));
    }
  }
}

?>