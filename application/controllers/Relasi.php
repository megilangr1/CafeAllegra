<?php 
class Relasi extends CI_Controller
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
					$this->load->model('RelasiM'); 
				}
			}
		}else{
			$this->session->sess_destroy();
			redirect(base_url());
		}
  }

  public function index()
  {
    $sp = $this->uri->segment(3);

    if (!empty($sp)) {
      $cek = $this->RelasiM->cekSP($sp);
      if ($cek->num_rows() > 0) { 
        $data = [
          'user' => $this->dataUser,
          'dataSP' => $this->RelasiM->dataSP(),
          'dataMaterial' => $this->RelasiM->dataMaterial(),
          'detailSP' => $cek->row(), 
          'dataRelasi' => $this->RelasiM->dataRelasi($sp),
          'pg' => 'Admin/Relasi/mat_sup'
        ];
      }else{
        redirect('Admin/Relasi-Material-Supplier');
      }
    }else{
      $data = [
        'user' => $this->dataUser,
        'dataSP' => $this->RelasiM->dataSP(),
        'pg' => 'Admin/Relasi/mat_sup'
      ];
    }
    
    $this->load->view('Admin/main', $data);
  }

  public function detailM()
  { 
		$mat = $this->input->post('id', TRUE);
		$data = $this->RelasiM->dMaterial($mat)->row();
		echo json_encode($data);
  }

  public function tambah()
  {
    if (isset($_POST['sav'])) {
      $sup = trim($this->input->post('kodeSupplier'));
      $mat = trim($this->input->post('material'));
      $nama = trim($this->input->post('nama'));
      $harga = trim($this->input->post('harga'));

      $harga = str_replace(',', '', $harga);

      $cek = $this->RelasiM->cekRelasi($sup, $mat);
      if ($cek->num_rows() > 0) {
        echo "<script>alert('Relasi Material Sudah Ada !');window.location='".base_url('Admin/Relasi-Material-Supplier/').$sup."';</script>";
      }else{
        $this->RelasiM->save($sup, $mat, $harga, $nama);
        echo "<script>alert('Relasi Berhasil di-Tambahkan !');window.location='".base_url('Admin/Relasi-Material-Supplier/').$sup."';</script>";
      }

    }else{ 
      redirect('Admin/Relasi-Material-Supplier');
    }
  }

  public function hapus()
  {
    $sup = $this->uri->segment(3);
    $mat = $this->uri->segment(5);

    $cek = $this->RelasiM->cekRelasi($sup, $mat);
    if ($cek->num_rows() > 0) {
      $this->RelasiM->delete($sup, $mat);
      echo "<script>alert('Data Relasi Berhasil di-Hapus !');window.location='".base_url('Admin/Relasi-Material-Supplier/').$sup."';</script>";
    }else{
      redirect('Admin/Relasi-Material-Supplier'); 
    }

  }

}

?>