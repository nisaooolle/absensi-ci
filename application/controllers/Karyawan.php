<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan extends CI_Controller
{

  // untuk meload model & helper kalian
  function __construct()
  {
    parent::__construct();
    $this->load->model('m_model');
    $this->load->library('upload');
    // fungsi validasi dibawah untuk ngecek ketika masuk ke halaman admin , data sdh true atau blm
    // kalo blm true maka akan kembali ke page auth
    if ($this->session->userdata('logged_in') != true || $this->session->userdata('role') != 'karyawan') {
      redirect(base_url() . 'auth');
    }
  }
  public function index()
  {
    $idKaryawan = $this->session->userdata('id');
    $data_karyawan = $this->m_model->getAbsensiByIdKaryawan($idKaryawan);
    $data['karyawan'] = $data_karyawan;
    $data['user'] = $this->m_model->get_by_id('user', 'id', $this->session->userdata('id'))->result();
    $data['total_absen'] = $this->m_model->get_absen($this->session->userdata('id'));
    $data['total_izin'] = $this->m_model->get_izin($this->session->userdata('id'));
    $data['karya'] = $this->m_model->get_data('user')->num_rows();
    $this->load->view('karyawan/index', $data);
  }
  public function menu_absensi($id)
  {
    $data['absen'] = $this->m_model->get_by_id('absensi', 'id', $id)->result();
    $data['karyawan1'] = $this->m_model->get_by_id('absensi', 'id', $id)->result();
    $data['user'] = $this->m_model->get_by_id('user', 'id', $this->session->userdata('id'))->result();
    $this->load->view('karyawan/menu_absensi', $data);
  }

  public function aksi_update_absensi()
  {
    $data = array(
      'kegiatan' => $this->input->post('kegiatan'),
    );
    $eksekusi = $this->m_model->ubah_data('absensi', $data, array('id' => $this->input->post('id')));
    if ($eksekusi) {
      $this->session->set_flashdata('sukses', 'berhasil');
      redirect(base_url('karyawan/history_absen'));
    } else {
      $this->session->set_flashdata('error', 'gagal...');
      redirect(base_url('karyawan/menu_absensi/' . $this->input->post('id')));
    }
  }
  public function menu_izin()
  {
    $data['user'] = $this->m_model->get_by_id('user', 'id', $this->session->userdata('id'))->result();
    $this->load->view('karyawan/menu_izin', $data);
  }
  public function history_absen()
  {
    $idKaryawan = $this->session->userdata('id');
    $data_karyawan = $this->m_model->getAbsensiByIdKaryawan($idKaryawan);
    $data['karyawan'] = $data_karyawan;
    $data['user'] = $this->m_model->get_by_id('user', 'id', $this->session->userdata('id'))->result();
    $this->load->view('karyawan/history_absen', $data);
  }
  public function profile()
  {
    $data['user'] = $this->m_model->get_by_id('user', 'id', $this->session->userdata('id'))->result();
    $this->load->view('karyawan/profile', $data);
  }

  public function aksi_akun()
  {
    $foto = $this->upload_images('foto');
    $email = $this->input->post('email');
    $username = $this->input->post('username');
    $password_baru = $this->input->post('password_baru');
    $konfirmasi_password = $this->input->post('konfirmasi_password');

    $foto = $this->upload_images('foto');
    if ($foto[0] == false) {
      $data = [
        'foto' => 'User.png',
        'email' => $email,
        'username' => $username,
      ];
    } else {
      $data = [
        'foto' => $foto[1],
        'email' => $email,
        'username' => $username,
      ];
    }

    // jika ada pasword baru
    if (!empty($password_baru)) {
      // pastikan pasword sama
      if ($password_baru === $konfirmasi_password) {
        $data['password'] = md5($password_baru);
      } else {
        $this->session->set_flashdata('message', 'password baru dan konfirmasi password harus sama...');
        redirect(base_url('karyawan/profile'));
      }
    }
    // lakukan pembaruan data
    $this->session->set_userdata($data);
    $update_result = $this->m_model->ubah_data('user', $data, array('id' => $this->session->userdata('id')));
    if ($update_result) {
      redirect(base_url('karyawan/profile'));
    } else {
      redirect(base_url('karyawan/profile'));
    }
  }
  public function upload_images($value)
  {
    $kode = round(microtime(true)  * 1000);
    $config['upload_path'] = './images/karyawan/';
    $config['allowed_types'] = 'jpg|png|jpeg';
    $config['max_size'] = '30000';
    $config['file_name'] = $kode;
    $this->upload->initialize($config);
    if (!$this->upload->do_upload($value)) {
      return array(false, '');
    } else {
      $fn = $this->upload->data();
      $nama = $fn['file_name'];
      return array(true, $nama);
    }
  }

  public function pulang($id)
  {
    date_default_timezone_set('Asia/Jakarta');
    $absensi = $this->db->get_where('absensi', array('id' => $id))->row();

    if ($absensi) {
      $data = array(
        'jam_pulang' => date('H:i:s'),
        'status' => 'done',
      );

      $this->db->where('id', $id);
      $this->db->update('absensi', $data);
      redirect(base_url('karyawan/history_absen'));
    } else {
      echo 'Data absensi tidak ditemukan';
    }
  }

  public function aksi_keterangan_izin()
  {
    $id = $this->input->post('id');
    $user_id = $this->session->userdata('id');

    $data = [
      'keterangan_izin' => $this->input->post('keterangan_izin'),
      "jam_pulang" => "00:00:00",
      "jam_masuk" => "00:00:00",
      "kegiatan" => "-",
      "status" => "done",
    ];
    $eksekusi = $this->m_model->ubah_data('absensi', $data, array('id' => $this->input->post('id')));
    if ($eksekusi) {
      $this->session->set_flashdata('berhasil_izin', 'Berhasil untuk izin');
      redirect(base_url('karyawan/history_absen'));
    } else {
      $this->session->set_flashdata('gagal_izin', "Gagal memberi keterangan izin");
      redirect(base_url('karyawan/menu_absensi/' . $this->input->post('id')));
    }
  }

  public function hapus_karyawan($id)
  {
    $this->m_model->delete('absensi', 'id', $id);
    redirect(base_url('karyawan/history_absen'));
  }

  public function aksi_izin()
  {
    $tanggal = date('Y-m-d');
    $query_absen = $this->m_model->get_absen_by_tanggal($tanggal, $this->session->userdata('id'));
    $validasi_absen = $query_absen->num_rows();
    $query_izin = $this->m_model->get_izin_by_tanggal($tanggal, $this->session->userdata('id'));
    $validasi_izin = $query_izin->num_rows();
    if ($validasi_izin > 0) {
      $this->session->set_flashdata('error', 'error ');
      redirect(base_url('karyawan/menu_izin'));
    } else if ($validasi_absen > 0) {
      date_default_timezone_set('Asia/Jakarta');
      $currenttime = date('Y-m-d H:i:s');
      $data = [
        'kegiatan' => '-',
        'id_karyawan' => $this->session->userdata('id'),
        'jam_pulang' => NULL,
        'jam_masuk' => NULL,
        'date' => date('Y-m-d'),
        'keterangan_izin' => $this->input->post('izin'),
        'status' => 'done'
      ];
      $query = $this->m_model->get_absen_by_tanggal($tanggal, $this->session->userdata('id'));
      $id = $query->row_array();
      $this->m_model->ubah_data('absensi', $data, array('id' => $id['id']));
      $this->m_model->add('absensi', $data);
      redirect(base_url('karyawan/history_absen'));
    } else {
      $data = [
        'kegiatan' => '-',
        'id_kayawan' => $this->session->userdata('id'),
        'jam_pulang' => NULL,
        'jam_masuk' => NULL,
        'date' => date('Y-m-d'),
        'keterangan_izin' => $this->input->post('izin'),
        'status' => 'done'
      ];

      $this->m_model->add('absensi', $data);
      redirect(base_url('karyawan/history_absen'));
    }
  }
}
