<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan extends CI_Controller
{

  // untuk meload model & helper kalian
  function __construct()
  {
    parent::__construct();
    $this->load->model('m_model');
    // $this->load->helper('my_helper');
    // fungsi validasi dibawah untuk ngecek ketika masuk ke halaman admin , data sdh true atau blm
    // kalo blm true maka akan kembali ke page auth
    if ($this->session->userdata('logged_in') != true || $this->session->userdata('role') != 'karyawan') {
      redirect(base_url() . 'auth');
    }
  }
  public function index()
  {
    $data['karyawan'] = $this->m_model->getData();
    $this->load->view('karyawan/index',$data);
  }
  public function menu_absensi()
  {
    $this->load->view('karyawan/menu_absensi');
  }
}
