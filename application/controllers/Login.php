<?php 
class Login extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if ($this->session->has_userdata('uid')) {
      $this->load->model('Sesi');
      $uid = $this->session->userdata('uid');
      $cek = $this->Sesi->cekLogin($uid);
      if ($cek == '0') {
        $this->session->sess_destroy();
        redirect(base_url());
      }else{
        if ($cek->level == '1') {
          redirect('Admin');
        }else if ($cek->level == '2') {
          redirect('Pegawai');
        }else{
          $this->session->sess_destroy();
          redirect(base_url());
        }
      }
    }
    $this->load->model('LoginM');
  }

  public function index()
  {
    $this->form_validation->set_rules('username', 'Username', 'required|trim', [
      'required' => "Username Tidak Boleh Kosong !"
    ]);
    $this->form_validation->set_rules('password', 'Password', 'required', [
      'required' => "Password Tidak Boleh Kosong !"
    ]);

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('login');
    }else{
      $a = htmlspecialchars($this->input->post('username'));
      $b = htmlspecialchars(sha1($this->input->post('password')));

      $cek = $this->LoginM->login($a, $b);
      if ($cek->num_rows() > 0) {
        $r1 = $cek->row();
        if ($r1->aktif != '1') {
          $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible">
            <button class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            User Anda Tidak Dapat Mengakses Program
          </div>');
          redirect(base_url());
        }else{
          $this->session->set_userdata('uid', $r1->uid);
          if ($r1->level == '1') {
            redirect('Admin');
          }else if ($r1->level == '2') {
            redirect('Pegawai');
          }else{
            $this->session->sess_destroy();
            redirect(base_url());
          }
        }
      }else{
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
        Username / Password Salah !
        </div>');
        redirect(base_url());
      }
    }
  }
}

?>