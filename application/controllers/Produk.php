<?php 
class Produk extends CI_Controller
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
					$this->load->model('ProdukM'); 
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
			'dataGP' => $this->ProdukM->dataGroupProduk(), 
			'dataProduk' => $this->ProdukM->dataProduk(),
			'pg' => 'Admin/Master/produk'
		];

		$this->load->view('Admin/main', $data);
	}
	
	public function detailGP()
	{
		$gpr1 = $this->input->post('id', TRUE);
		$data = $this->ProdukM->dataGPD($gpr1)->result();
		echo json_encode($data);
	}

	public function tambah()
	{
		if (isset($_POST['sav'])) {
			$a = $this->input->post('gpr1');
			$b = $this->input->post('gpr2');
			$c = trim($this->input->post('nama'));
			$cekNama = $this->ProdukM->cekNama($a.$b, $c);
			if ($cekNama->num_rows() > 0) {
				echo "<script>alert('Data Produk $c Sudah Ada Untuk Group Produk Tersebut !');window.history.back();</script>";
			}else{
				$d = trim($this->input->post('satuan'));
				$e = trim($this->input->post('harga'));  
				$ee = str_replace(',', '', $e);

				$kodeOtomatis = $this->ProdukM->kodeOtomatis($a.$b);
				$k = $kodeOtomatis->row_array();
				$k1 = $k['kode'];
				$k2 = (int) substr($k1, 4,2);
				$k2++;

				$kode = $a.$b.sprintf('%02s', $k2);

				$this->ProdukM->save($kode, $c, $d, $ee);
				echo "<script>alert('Data Produk Berhasil Di-Tambahkan !');window.location='".base_url('Admin/Produk')."';</script>";
			}
		}else{
			redirect(base_url('Admin/Produk'));
		}
	}

	public function hapus()
	{
		$kode = $this->uri->segment(4);
		$cek = $this->ProdukM->cekKode($kode);
		if ($cek->num_rows() > 0) {
			$this->ProdukM->delete($kode);
			echo "<script>alert('Data Produk di-Hapus !');window.location='".base_url('Admin/Produk')."';</script>";
		}else{
			redirect(base_url('Admin/Produk'));
		}
	}

	public function edit()
	{
		$kode = $this->uri->segment(4); 

		$cek = $this->ProdukM->cekKode($kode);  
		if ($cek->num_rows() > 0) {
			$r = $cek->row();
			$gpr1 = substr($r->FK_BPR, 0,3); 
			$gpr2 = substr($r->FK_BPR, 3,1);
			$q1 = $this->ProdukM->gpr1($gpr1);
			$q2 = $this->ProdukM->gpr2($gpr1, $gpr2);

			if ($q1->num_rows() > 0 && $q2->num_rows() > 0) {
				$data = [
					'user' => $this->dataUser,
					'dataGP' => $this->ProdukM->dataGroupProduk(), 
					'dataProduk' => $this->ProdukM->dataProduk(),
					'pg' => 'Admin/Master/produk',
					'edit' => [
						'produk' => $r,
						'gpr1' => $q1->row(),
						'gpr2' => $q2->row()
					]
				];

				$this->load->view('Admin/main', $data);


			}else{
				redirect(base_url('Admin/Produk'));
			}
		}else{
			redirect(base_url('Admin/Produk'));
		}


	}

	public function update()
	{
		if (isset($_POST['ed'])) {
			$kode = trim($this->input->post('kode'));
			$namaLama = trim($this->input->post('namaLama'));
			
			$a = trim($this->input->post('nama'));
			$b = trim($this->input->post('satuan'));
			$c = trim($this->input->post('harga'));
			$cc = str_replace(',', '', $c);

			if ($a == $namaLama) {
				$this->ProdukM->update($kode, $namaLama, $b, $cc);
				echo "<script>alert('Data Produk Berhasil di-Ubah !');window.location='".base_url('Admin/Produk')."';</script>";
			}else{
				$gpr1 = substr($kode, 0,3);
				$gpr2 = substr($kode, 3,1);

				$cekNama = $this->ProdukM->cekNama($gpr1.$gpr2, $a);
				if ($cekNama->num_rows() > 0) {
					echo "<script>alert('Data Produk $a Sudah Ada Untuk Group Produk Tersebut !');window.history.back();</script>";				
				}else{
					$this->ProdukM->update($kode, $a, $b, $cc);
					echo "<script>alert('Data Produk Berhasil di-Ubah !');window.location='".base_url('Admin/Produk')."';</script>";
				}
			}

		}else{
			redirect('Admin/Produk');
		}
	}
}

?>