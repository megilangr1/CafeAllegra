<?php 
class Supplier extends CI_Controller
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
					$this->load->model('SupplierM');
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
			'dataS' => $this->SupplierM->dataSupplier(),
			'pg' => 'Admin/Master/supplier'
		];

		$this->load->view('Admin/main', $data);
	}

	public function tambah()
	{
		if (isset($_POST['sav'])) {
			$a = trim($this->input->post('nama'));
			$cekNama = $this->SupplierM->cekNama($a);
			if ($cekNama->num_rows() > 0) {
				echo "<script>alert('Nama Supplier $a Sudah Ada !');window.history.back();</script>";
			}else{ 
        $b = trim($this->input->post('alamat'));
        $c = trim($this->input->post('kota'));
        $d = trim($this->input->post('telp'));
        $e = trim($this->input->post('cp'));
        $f = trim($this->input->post('lamaBayar'));
        $g = trim($this->input->post('penerima'));
        $h = trim($this->input->post('bank'));
        $i = trim($this->input->post('noacc'));
            

				$kode_otomatis = $this->SupplierM->kodeOtomatis();
				$r = $kode_otomatis->row_array();
				$r1 = $r['kode'];
				$r2 = (int) substr($r1, 0,3);
				$r2++;

				$kode = sprintf('%03s', $r2);
 
				$this->SupplierM->save($kode, $a, $b, $c, $d, $e, $f, $g, $h, $i);
				echo "<script>alert('Data Supplier Berhasil di-Tambahkan !');window.location='".base_url('Admin/Supplier')."';</script>";
			}
		}else{
			redirect(base_url('Admin/Supplier'));
		}
	}

	public function hapus()
	{
		$kode = $this->uri->segment(4);
		$cekKode = $this->SupplierM->cekKode($kode);
		if ($cekKode->num_rows() > 0) {
			$this->SupplierM->delete($kode);
			echo "<script>alert('Data Supplier Berhasil di-Hapus !');window.location='".base_url('Admin/Supplier')."';</script>";
		}else{
			redirect(base_url('Admin/Supplier'));
		}
	}

	public function edit()
	{
		$kode = $this->uri->segment(4);
		$cekKode = $this->SupplierM->cekKode($kode);
		if ($cekKode->num_rows() > 0) {
			$data = [
				'user' => $this->dataUser,
				'dataS' => $this->SupplierM->dataSupplier(),
				'pg' => 'Admin/Master/supplier',
				'edit' => $cekKode->row()
			];

			$this->load->view('Admin/main', $data);
		}else{
			redirect(base_url('Admin/Supplier'));
		}
	}

	public function update()
	{
		if (isset($_POST['ed'])) {
			$kode = trim($this->input->post('kode'));
			$namaLama = trim($this->input->post('namaLama'));

			$namaBaru = trim($this->input->post('nama'));
      $b = trim($this->input->post('alamat'));
      $c = trim($this->input->post('kota'));
      $d = trim($this->input->post('telp'));
      $e = trim($this->input->post('cp'));
      $f = trim($this->input->post('lamaBayar'));
      $g = trim($this->input->post('penerima'));
      $h = trim($this->input->post('bank'));
      $i = trim($this->input->post('noacc'));

			if ($namaLama == $namaBaru) {
				$this->SupplierM->update($kode, $namaBaru, $b, $c, $d, $e, $f, $g, $h, $i);
				echo "<script>alert('Data Supplier Berhasil di-Ubah !');window.location='".base_url('Admin/Supplier')."';</script>";
			}else{
				$cekNama = $this->SupplierM->cekNama($namaBaru);
				if ($cekNama->num_rows() > 0) {
					echo "<script>alert('Nama Supplier $namaBaru Sudah Ada !');window.history.back();</script>";
				}else{
					$this->SupplierM->update($kode, $namaBaru, $b, $c, $d, $e, $f, $g, $h, $i);
					echo "<script>alert('Data Supplier Berhasil di-Ubah !');window.location='".base_url('Admin/Supplier')."';</script>";
				}
			}

		}else{
			redirect(base_url('Admin/Supplier'));
		}
	}

}

?>