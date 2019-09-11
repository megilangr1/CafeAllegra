<?php
class Pembelian extends CI_Controller
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
          $this->load->model('PembelianM');
        }
      }
    } else {
      $this->session->sess_destroy();
      redirect(base_url());
    }
  }

  public function index()
  {
    if ($this->session->has_userdata('Supplier-Pembelian')) {
      $kodeSp = $this->session->userdata('Supplier-Pembelian');
      $cekSp = $this->PembelianM->cekSupplier($kodeSp);
      if ($cekSp->num_rows() > 0) {
        $sp = $cekSp->row();
        $mat = $this->PembelianM->dataMaterial($kodeSp);
        $tbc = $this->cart->contents();
      } else {
        $this->session->unset_userdata('Supplier-Pembelian');
        redirect('Admin/Pembelian');
      }
    } else {
      $sp = '';
      $mat = '';
      $tbc = '';
    }

    $data = [
      'user' => $this->dataUser,
      'dataSupplier' => $this->PembelianM->dataSupplier(),
      'sp' => $sp,
      'mat' => $mat,
      'pg' => 'Admin/Transaksi/pembelian',
      'tbc' => $tbc
    ];

    $this->load->view('Admin/main', $data);
  }

  public function supplier()
  {
    $sp = $this->uri->segment(4);
    $cekSp = $this->PembelianM->cekSupplier($sp);
    if ($cekSp->num_rows() > 0) {
      $this->session->set_userdata('Supplier-Pembelian', $sp);
      redirect(base_url('Admin/Pembelian'));
    } else {
      redirect(base_url('Admin/Pembelian'));
    }
  }

  public function material()
  {
    $mat = $this->input->post('mat', true);
    $cek = $this->PembelianM->cekMaterial($mat)->row();
    echo json_encode($cek);
  }

  public function batal()
  {

    $cart = $this->cart->contents();
    $uid = $this->session->userdata('uid');
    $tgl = $this->session->userdata('Tanggal-Pembelian');
    $pem = $this->session->userdata('Pembayaran-Pembelian');
    $sup = $this->session->userdata('Supplier-Pembelian');

    foreach ($cart as $ca) {
      if ($ca['transaksi'] == 'Pembelian' && $ca['tanggal'] == $tgl && $ca['jenis'] == $pem && $ca['supplier'] == $sup && $ca['uid'] == $uid) {
        $rowid = $ca['rowid'];
        $this->cart->remove($rowid);
      }
    }

    $this->session->unset_userdata('Supplier-Pembelian');
    $this->session->unset_userdata('Tanggal-Pembelian');
    $this->session->unset_userdata('Pembayaran-Pembelian');

    redirect('Admin/Pembelian');
  }

  public function tambah()
  {
    if (isset($_POST['sav'])) {
      $sup = $this->session->userdata('Supplier-Pembelian');

      if ($this->session->has_userdata('Tanggal-Pembelian')) {
        $tgl = $this->session->userdata('Tanggal-Pembelian');
      } else {
        $tgl = trim($this->input->post('tgl'));
        $this->session->set_userdata('Tanggal-Pembelian', $tgl);
      }

      if ($this->session->has_userdata('Pembayaran-Pembelian')) {
        $jenis = $this->session->userdata('Pembayaran-Pembelian');
      } else {
        $jenis = trim($this->input->post('jenis'));
        $this->session->set_userdata('Pembayaran-Pembelian', $jenis);
      }

      $mat = trim($this->input->post('mat'));
      $nmat = trim($this->input->post('nmat1'));
      $qty = trim($this->input->post('qty'));
      $harga = trim($this->input->post('harga'));

      $harga = str_replace(',', '', $harga);
      $cart = $this->cart->contents();

      $data = [
        'id' => $mat,
        'qty' => $qty,
        'price' => $harga,
        'name' => $nmat,
        'supplier' => $sup,
        'tanggal' => $tgl,
        'jenis' => $jenis,
        'uid' => $this->session->userdata('uid'),
        'transaksi' => "Pembelian"
      ];

      $this->cart->insert($data);
      echo "<script>alert('Data di-Masukan Keranjang Pembelian !');window.location='" . base_url('Admin/Pembelian') . "';</script>";
    } else {
      redirect(base_url('Admin/Pembelian'));
    }
  }

  public function hapus()
  {
    $rid = $this->uri->segment(4);

    $this->cart->remove($rid);
    echo "<script>alert('Material di-Hapus dari Cart !');window.location='" . base_url('Admin/Pembelian') . "';</script>";
  }

  public function selesai()
  {
    $uid = $this->session->userdata('uid');
    $sup = $this->session->userdata('Supplier-Pembelian');
    $tgl = $this->session->userdata('Tanggal-Pembelian');
    $pem = $this->session->userdata('Pembayaran-Pembelian');

    $d = date('d');

    $k = $this->PembelianM->kodeOtomatis($d, $sup);
    $kk = $k->row_array();
    $k1 = $kk['kode'];
    $k2 = (int) substr($k1, 2, 5);
    $k2++;

    $kode = $d . sprintf('%05s', $k2);

    $s1 = $this->PembelianM->saveh($kode, $tgl, $sup, $pem);

    $cart = $this->cart->contents();

    $jmlMat = 0;
    $bayar = 0;

    foreach ($cart as $dc) {
      if ($dc['transaksi'] == 'Pembelian' && $dc['tanggal'] == $tgl && $dc['jenis'] == $pem && $dc['supplier'] == $sup && $dc['uid'] == $uid) {

        $jmlMat += 1;
        $bayar += $dc['qty'] * $dc['price'];

        $rowid = $dc['rowid'];
        $mat = $dc['id'];
        $jml = $dc['qty'];
        $harga = $dc['price'];

        $s2 = $this->PembelianM->saved($kode, $mat, $jml, $harga);

        $data = [
          'rowid' => $rowid,
          'qty' => 0
        ];
        $this->cart->update($data);
      }
    }

    if ($pem == '0') {
      $s3 = $this->PembelianM->savehd($kode, $sup, $jmlMat, $bayar);
    }

    $this->session->unset_userdata('Supplier-Pembelian');
    $this->session->unset_userdata('Tanggal-Pembelian');
    $this->session->unset_userdata('Pembayaran-Pembelian');


    echo "<script>
    alert('Transaksi Selesai !');
    window.location='" . base_url('Admin/Pembelian') . "';
    window.open('" . base_url() . "Admin/Print/Pembelian/" . $kode . "/" . $sup . "');
    </script>";
    echo "<script></script>";
  }
}
