<?php 
class Barang extends CI_Controller
{
  private $dataUser = ''; // Variable Private Untuk Menampung Data User pada Controller Barang

  public function __construct()
  {
    parent::__construct();
    if ($this->session->has_userdata('uid')) {
      $uid = $this->session->userdata('uid'); // Mengambil Data UID pada Session
      $this->load->model('Sesi'); // Menggunakan Model Sesi
      $cek = $this->Sesi->cekLogin($uid); // Pengecekan Data Pegawai Sesuai UID yang di-Ambil dari Sesi
      if ($cek == '0') { // Return Data dari Model
        $this->session->sess_destroy(); // Penghancuran sesi / Menghapus segala sesi
        redirect(base_url()); // Mengalihkan Pengguna Ke-Halaman base_url() / http://localhost/CafeAllegra
      }else{
        if ($cek->level != '1') { // Pengecekan Apakah level User adalah bukan Admin / 1 jika Ya, maka Pegawai di alihkan ke halaman Login / base_url()
          redirect(base_url()); 
        }else{
          $this->dataUser = $cek; // Menampung data user hasil return model ke dalam variable dataUser
          $this->load->model('BarangM'); // Menggunakan Model BarangM
        }
      }
    }else{
      $this->session->sess_destroy(); // Jika Sesi Pegawai tidak di-temukan pengguna di Alihkan ke halaman login
      redirect(base_url()); 
    }
  }

  public function index()
  {
    $data = [  // Kumpulan data untuk di-kirim ke bagian view
      'user' => $this->dataUser, // $user akan berisi $dataUser
      'databarang' => $this->BarangM->dataBarang(), // $databarang akan berisi 
      'pg' => 'Admin/Master/barang' // $pg = akan berisi Admin/Master/barang yang di tujukan untuk me-load file view pada main.php
    ];

    $this->load->view('Admin/main', $data); // me-load main.php view pada folder view/Admin
  }

  public function tambah()
  {
    if (isset($_POST['sav'])) { // Melakukan Pengecekan Tombol / Data yang bernama 'sav' terkirim ke-controller jika YA maka
      $nama_barang = trim($this->input->post('nama_barang')); // Mengambil data nama_barang yang di kirim melalui method post
      $cek_nama = $this->BarangM->cekNama($nama_barang); // Pengecekan Nama Barang menggunakan function cekNama pada model BarangM 
      if ($cek_nama->num_rows() > 0) { // Jika pengecekan nama di temukan nama yang sama
        echo "<script>alert('Nama Barang $nama_barang Sudah Ada !');window.history.back();</script>"; // Memunculkan alert bahwa nama sudah ada 
      }else{ // Jika belum ada 
        $satuan = $this->input->post('satuan'); // Mengambil data satuan yang di kirim melalui method post
        $stok_min = $this->input->post('stok_min'); // Mengambil data stok_min yang di kirim melalui method post
        $stok_max = $this->input->post('stok_max'); // Mengambil data stok_max yang di kirim melalui method post

        $n1 = preg_replace('/[^a-zA-Z-0-9-]/', '', $nama_barang); // Menghapus dan hanya menyisakan huruf dari a-z A-Z 0-9 pada nama_barang
        $n2 = str_replace(' ', '', $n1); // menghilangkan spasi pada $n1 / nama_barang
        $n3 = substr($n2, 0,1); // mengambil huruf satu huruf pertama 
        $n4 = strtoupper($n3); // Mengubah $n3 / nama_barang menjadi huruf kapital

        $kode_otomatis = $this->BarangM->kodeOtomatis($n4);  // Membuat kode otomatis dengan menggunakan function kodeOtomatis pada model BarangM
        $r = $kode_otomatis->row_array(); // Pengambilan data dari kode_otomatis berupa array
        $r1 = $r['kode']; // Mengambil data kode metoder array
        $r2 = (int) substr($r1, 3,3); // Mengambil 3 huruf dari huruf ke-3 
        $r2++; // Pengambilan data terakhir / max hasil pengambilan

        $kode_barang = "BR".$n4.sprintf('%03s', $r2); // Membuat format Kode Otomatis
        
        $save = $this->BarangM->save($kode_barang, $nama_barang, $satuan, $stok_min, $stok_max); // Menggunakan function save pada Model barangM 
        echo "<script>alert('Data Barang Berhasil Di-Tambahkan !');window.location='".base_url('Admin/Barang')."';</script>"; // Memunculkan alert saat selesai melakukan penyimpanan data

      }
    }else{ // Jika Button / Data 'sav' tidak di temukan telah di kirim ke controller
      redirect('Admin/Barang'); 
    }
  }

  public function hapus()
  {
    $kode = $this->uri->segment(4); // Mengambil segment ke-4 pada url
    $cekKode = $this->BarangM->cekKode($kode); // Pengecekan Kode pada database 
    if ($cekKode->num_rows() > 0) { // Jika di-temukan data dengan kode yang di kirim ke Model
      $this->BarangM->delete($kode); // Melakukan penghapusan dengan function delete pada model BarangM
      echo "<script>alert('Data Berhasil Di-Hapus !');window.location='".base_url('Admin/Barang')."';</script>"; // Alert Data Berhasil di-Hapus dan redirect pada js
    }else{ // Jika tidak di-temukan data dengan kode yang di kirim
      redirect(site_url('Admin/Barang')); // redirect halaman Admin/Barang
    }
  }

  public function edit()
  {
    $kode = $this->uri->segment(4); // Mengambil segment ke-4 pada url
    $cekKode = $this->BarangM->cekKode($kode); // Pengecekan Kode pada database 
    if ($cekKode->num_rows() > 0) { // Jika di-temukan data dengan kode yang di kirim ke Model
      $data = [
        'user' => $this->dataUser, // $user akan berisi $dataUser
        'databarang' => $this->BarangM->dataBarang(), // $databarang akan berisi 
        'pg' => 'Admin/Master/barang', // $pg = akan berisi Admin/Master/barang yang di tujukan untuk me-load file view pada main.php
        'edit' => $cekKode->row() // $edit akan berisi data dari barang sesuai kode yang di cek
      ];
      $this->load->view('Admin/Main', $data); // me-load file main.php pada folder view/Admin
    }else{ // Jika data dengan kode yang di kirim tidak di-Temukan
      redirect(site_url('Admin/Barang')); // Redirect ke halaman Admin/Barang
    }
  }

  public function update()
  {
    if (isset($_POST['ed'])) {
      $kode = $this->input->post('kode'); // mengabil data dari view dengan method post dan name='kode'
      $namaLama = $this->input->post('namaLama'); // mengabil data dari view dengan method post dan name='namaLama'
      $nama_baru = $this->input->post('nama_barang'); // mengabil data dari view dengan method post dan name='nama_barang'
      $satuan = $this->input->post('satuan'); // mengabil data dari view dengan method post dan name='satuan'
      $stok_min = $this->input->post('stok_min'); // mengabil data dari view dengan method post dan name='stok_min'
      $stok_max = $this->input->post('stok_max'); // mengabil data dari view dengan method post dan name='stok_max'
      
      if ($namaLama == $nama_baru) { // Pengecekan apakah namaLama sama dengan nama yang baru di kirim ke controller Jika ya maka
        $this->BarangM->update($kode, $namaLama, $satuan, $stok_min, $stok_max); // Melakukan Peng-update an dengan function update pada model BarangM
        echo "<script>alert('Data Barang Berhasil Di-Edit !');window.location='".base_url('Admin/Barang')."';</script>"; // Alert data berhasil di-Edit
      }else{ // Bila namaLama Tidak sama
        $cekNama = $this->BarangM->cekNama($nama_baru); // Melakukan pengecekan nama  
        if($cekNama->num_rows() > 0){ // Jika di-temukan nama sudah ada
          echo "<script>alert('Nama Barang $nama_baru Sudah Ada !');window.history.back();</script>"; // Alert atas di-temukan nya nama yang sama
        }else{ // Jika tidak di-temukan nama yang sama
          $this->BarangM->update($kode, $namaLama, $satuan, $stok_min, $stok_max); // Melakukan Peng-update an dengan function update pada model BarangM
          echo "<script>alert('Data Barang Berhasil Di-Edit !');window.location='".base_url('Admin/Barang')."';</script>"; // Alert data berhasil di-Edit
        }
      }
      
    }else{
      redirect(base_url('Admin/Barang'));
    }
  }
}

?>