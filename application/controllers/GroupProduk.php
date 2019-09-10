<?php 
class GroupProduk extends CI_Controller
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
			'pg' => 'Admin/Master/groupproduk1'
		];

		$this->load->view('Admin/main', $data);
	}

	public function tambah()
	{
		if (isset($_POST['sav'])) {
			$namaGroup = trim($this->input->post('namaGroup'));
			$cekNama = $this->GroupProdukM->cekNama($namaGroup);
			if ($cekNama->num_rows() > 0) {
				echo "<script>alert('Nama Group Produk $namaGroup Sudah Ada !');window.history.back();</script>";
			}else{
				$kode_otomatis = $this->GroupProdukM->kodeOtomatis();
				$r = $kode_otomatis->row_array();
				$r1 = $r['kode'];
				$r2 = (int) substr($r1, 1,2);
				$r2++;

				$kode = "F".sprintf('%02s', $r2);
 
				$this->GroupProdukM->save($kode, $namaGroup);
				echo "<script>alert('Data Group Produk Berhasil di-Tambahkan !');window.location='".base_url('Admin/Group-Produk')."';</script>";
			}
		}else{
			redirect(base_url('Admin/Group-Produk'));
		}
	}

	public function hapus()
	{
		$kode = $this->uri->segment(4);
		$cekKode = $this->GroupProdukM->cekKode($kode);
		if ($cekKode->num_rows() > 0) {
			$this->GroupProdukM->delete($kode);
			echo "<script>alert('Data Group Produk Berhasil di-Hapus !');window.location='".base_url('Admin/Group-Produk')."';</script>";
		}else{
			redirect(base_url('Admin/Group-Produk'));
		}
	}

	public function edit()
	{
		$kode = $this->uri->segment(4);
		$cekKode = $this->GroupProdukM->cekKode($kode);
		if ($cekKode->num_rows() > 0) {
			$data = [
				'user' => $this->dataUser,
				'dataGP' => $this->GroupProdukM->dataGroupProduk(),
				'pg' => 'Admin/Master/groupproduk1',
				'edit' => $cekKode->row()
			];

			$this->load->view('Admin/main', $data);
		}else{
			redirect(base_url('Admin/Group-Produk'));
		}
	}

	public function update()
	{
		if (isset($_POST['ed'])) {
			$kode = trim($this->input->post('kode'));
			$namaLama = trim($this->input->post('namaLama'));

			$namaBaru = trim($this->input->post('namaGroup'));

			if ($namaLama == $namaBaru) {
				$this->GroupProdukM->update($kode, $namaBaru);
				echo "<script>alert('Data Group Produk Berhasil di-Ubah !');window.location='".base_url('Admin/Group-Produk')."';</script>";
			}else{
				$cekNama = $this->GroupProdukM->cekNama($namaBaru);
				if ($cekNama->num_rows() > 0) {
					echo "<script>alert('Nama Group Produk $namaBaru Sudah Ada !');window.history.back();</script>";
				}else{
					$this->GroupProdukM->update($kode, $namaBaru);
					echo "<script>alert('Data Group Produk Berhasil di-Ubah !');window.location='".base_url('Admin/Group-Produk')."';</script>";
				}
			}

		}else{
			redirect(base_url('Admin/Group-Produk'));
		}
	}

}

?>