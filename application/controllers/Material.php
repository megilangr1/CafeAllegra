<?php 
class Material extends CI_Controller
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
					$this->load->model('MaterialM'); 
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
			'dataGM' => $this->MaterialM->dataGM(), 
			'dataMaterial' => $this->MaterialM->dataMaterial(),
			'pg' => 'Admin/Master/Material'
		];

		$this->load->view('Admin/main', $data);
	}
	
	public function detailGM()
	{
		$gmat1 = $this->input->post('id', TRUE);
		$data = $this->MaterialM->dataGMD($gmat1)->result();
		echo json_encode($data);
	}

	public function tambah()
	{
		if (isset($_POST['sav'])) {
			$a = $this->input->post('gmat1');
			$b = $this->input->post('gmat2');
			$c = trim($this->input->post('nama'));
			$cekNama = $this->MaterialM->cekNama($a.$b, $c);
			if ($cekNama->num_rows() > 0) {
				echo "<script>alert('Data Material $c Sudah Ada Untuk Group Produk Tersebut !');window.history.back();</script>";
			}else{
				$d = trim($this->input->post('satuan'));
        $e = trim($this->input->post('min'));    
        $f = trim($this->input->post('max'));

				$kodeOtomatis = $this->MaterialM->kodeOtomatis($a.$b);
				$k = $kodeOtomatis->row_array();
				$k1 = $k['kode'];
				$k2 = (int) substr($k1, 4,2);
				$k2++;

				$kode = $a.$b.sprintf('%02s', $k2);

				$this->MaterialM->save($kode, $c, $d, $e, $f);
				echo "<script>alert('Data Material Berhasil Di-Tambahkan !');window.location='".base_url('Admin/Material')."';</script>";
			}
		}else{
			redirect(base_url('Admin/Material'));
		}
	}

	public function hapus()
	{
		$kode = $this->uri->segment(4);
		$cek = $this->MaterialM->cekKode($kode);
		if ($cek->num_rows() > 0) {
			$this->MaterialM->delete($kode);
			echo "<script>alert('Data Material di-Hapus !');window.location='".base_url('Admin/Material')."';</script>";
		}else{
			redirect(base_url('Admin/Material'));
		}
	}

	public function edit()
	{
		$kode = $this->uri->segment(4); 

		$cek = $this->MaterialM->cekKode($kode);  
		if ($cek->num_rows() > 0) {
			$r = $cek->row();
			$gmat1 = substr($r->FK_MAT, 0,3); 
			$gmat2 = substr($r->FK_MAT, 3,1);
			$q1 = $this->MaterialM->gmat1($gmat1);
			$q2 = $this->MaterialM->gmat2($gmat1, $gmat2);

			if ($q1->num_rows() > 0 && $q2->num_rows() > 0) {
				$data = [
					'user' => $this->dataUser,
					'dataGM' => $this->MaterialM->dataGM(), 
					'dataMaterial' => $this->MaterialM->dataMaterial(),
					'pg' => 'Admin/Master/Material',
					'edit' => [
						'material' => $r,
						'gmat1' => $q1->row(),
						'gmat2' => $q2->row()
					]
				];

				$this->load->view('Admin/main', $data);


			}else{
				redirect(base_url('Admin/Material'));
			}
		}else{
			redirect(base_url('Admin/Material'));
		}


	}

	public function update()
	{
		if (isset($_POST['ed'])) {
			$kode = trim($this->input->post('kode'));
			$namaLama = trim($this->input->post('namaLama'));
			
			$a = trim($this->input->post('nama'));
			$b = trim($this->input->post('satuan'));
			$c = trim($this->input->post('min'));
			$d = trim($this->input->post('max')); 

			if ($a == $namaLama) {
				$this->MaterialM->update($kode, $namaLama, $b, $c, $d);
				echo "<script>alert('Data Material Berhasil di-Ubah !');window.location='".base_url('Admin/Material')."';</script>";
			}else{
				$gmat1 = substr($kode, 0,3);
				$gmat2 = substr($kode, 3,1);

				$cekNama = $this->MaterialM->cekNama($gmat1.$gmat2, $a);
				if ($cekNama->num_rows() > 0) {
					echo "<script>alert('Data Material $a Sudah Ada Untuk Group Produk Tersebut !');window.history.back();</script>";				
				}else{
					$this->MaterialM->update($kode, $a, $b, $c, $d);
					echo "<script>alert('Data Material Berhasil di-Ubah !');window.location='".base_url('Admin/Material')."';</script>";
				}
			}

		}else{
			redirect('Admin/Material');
		}
	}
}

?>