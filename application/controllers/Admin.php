<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class Admin extends CI_Controller
{

  // untuk meload model & helper kalian
  function __construct()
  {
    parent::__construct();
    $this->load->model('m_model');
    $this->load->helper('my_helper');
    $this->load->library('upload');
    // fungsi validasi dibawah untuk ngecek ketika masuk ke halaman admin , data sdh true atau blm
    // kalo blm true maka akan kembali ke page auth
    if ($this->session->userdata('logged_in') != true || $this->session->userdata('role') != 'admin') {
      redirect(base_url() . 'auth');
    }
  }
}
