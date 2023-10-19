<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('m_model');
    $this->load->library('form_validation');
  }
  public function index()
  {
    $this->load->view('auth/login');
  }
  public function register_karyawann()
  {
    $this->load->view('auth/register_karyawan');
  }
  public function register_adminn()
  {
    $this->load->view('auth/register_admin');
  }

  public function aksi_login()
  {

    $email = $this->input->post('email', true);
    $password = $this->input->post('password', true);
    // vaiable data berfungsi untuk mengambil yg diinputkan
    $data = ['email' => $email,];
    $query = $this->m_model->getwhere('user', $data);
    // result berfngsi menjalankan query nya
    $result = $query->row_array();


    if (!empty($result)  && md5($password) === $result['password']) {
      $data = [
        'logged_in' => TRUE,
        // yg didalam array ngambil dari database
        'email'     => $result['email'],
        'username'  => $result['username'],
        'role'      => $result['role'],
        'id'        => $result['id'],
      ];
      // session dibawah berfngsi untk penampungan sementara
      $this->session->set_userdata($data);
      // validasi dbwh mengecek apakah role itu "admin" / "karyawan"
      if ($this->session->userdata('role') == 'admin') {
        redirect(base_url() . "admin/dasboard");
      } elseif ($this->session->userdata('role') == 'karyawan') {
        // jika login menggunakan role karyawan makan akan otomatis di table karyawan menambah data trsbt
        $data = [
          'id_karyawan' => $result['id'],
          'date' => date('Y-m-d'),
          'jam_masuk' => date('H:i:s'),
          'kegiatan' => '-',
          'jam_pulang' => '00:00:00',
          'keterangan_izin' => '-',
          'status' => 'not',
        ];
        // menambahkan data di table absensi
        $this->m_model->tambah_data('absensi', $data);
        redirect(base_url() . "karyawan");
      } else {
        // Jika validasi gagal, kembalikan ke halaman login
        redirect(base_url() . "auth");
      }
    } else {
      redirect(base_url() . "auth");
    }
  }

  function logout()
  {
    // sess_detroy berfungsi menghapus semua yg ada di session
    $this->session->sess_destroy();
    redirect(base_url('auth'));
  }

  public function register_admin()
  {
    // Validasi form
    $this->form_validation->set_rules('email', 'email', 'required');
    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('nama_depan', 'nama_depan', 'required');
    $this->form_validation->set_rules('nama_belakang', 'nama_belakang', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
    $this->form_validation->set_rules('role', 'role', 'required');

    if ($this->form_validation->run() == FALSE) {
      // Jika validasi gagal, kembalikan ke halaman registrasi
      $this->load->view('auth/register_admin');
    } else {
      // Jika validasi berhasil, simpan data ke database
      $email = $this->input->post('email');
      $username = $this->input->post('username');
      $nama_depan = $this->input->post('nama_depan');
      $nama_belakang = $this->input->post('nama_belakang');
      $password = md5($this->input->post('password'));
      $role = $this->input->post('role');

      // Pastikan nilai 'role' tetap 'admin'
      if ($role !== 'admin') {
        $role = 'admin';
      }

      // Simpan data ke database sesuai kebutuhan Anda
      $this->m_model->register_user($email, $username, $nama_depan, $nama_belakang, $password, $role);

      // Redirect ke halaman sukses atau login
      redirect('auth');
    }
  }
  public function register_karyawan()
  {
    // Validasi form
    $this->form_validation->set_rules('email', 'email', 'required');
    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('nama_depan', 'nama_depan', 'required');
    $this->form_validation->set_rules('nama_belakang', 'nama_belakang', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
    $this->form_validation->set_rules('role', 'role', 'required');

    if ($this->form_validation->run() == FALSE) {
      // Jika validasi gagal, kembalikan ke halaman registrasi
      $this->load->view('auth/register_karyawan');
    } else {
      // Jika validasi berhasil, simpan data ke database
      $email = $this->input->post('email');
      $username = $this->input->post('username');
      $nama_depan = $this->input->post('nama_depan');
      $nama_belakang = $this->input->post('nama_belakang');
      $password = md5($this->input->post('password'));
      $role = $this->input->post('role');

      // Pastikan nilai 'role' tetap 'admin'
      if ($role !== 'karyawan') {
        $role = 'karyawan';
      }

      // Simpan data ke database sesuai kebutuhan Anda
      $this->m_model->register_user($email, $username, $nama_depan, $nama_belakang, $password, $role);

      // Redirect ke halaman sukses atau login
      redirect('auth');
    }
  }
}
