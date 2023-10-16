<?php

class M_model extends CI_Model
{
    function get_data($table)
    {
        return $this->db->get($table);
    }

    public function get_izin($table,$id_karyawan) {
        return $this->db->where('id_karyawan',$id_karyawan)
        ->where('kegiatan', '-')
        ->get($table);
    }
    public function get_absen($table,$id_karyawan) {
        return $this->db->where('id_karyawan',$id_karyawan)
        ->where('keterangan_izin', '-')
        ->get($table);
    }
    public function get_history($table, $id_karyawan)
    {
        return $this->db->where('id_karyawan', $id_karyawan)->get($table);
    }
    public function register_user($email, $username, $nama_depan, $nama_belakang, $password, $role)
    {
        $data = array(
            'email' => $email,
            'username' => $username,
            'nama_depan' => $nama_depan,
            'nama_belakang' => $nama_belakang,
            'password' => $password,
            'role' => $role
        );
        // Simpan data ke dalam tabel pengguna (ganti 'users' sesuai dengan nama tabel Anda)
        $this->db->insert('user', $data);
    }
    public function getData()
    {
        // Query database untuk mengambil data
        $this->db->select('absensi.*,user.nama_depan, user.nama_belakang');
        $this->db->from('absensi');
        $this->db->join('user', 'absensi.id_karyawan = user.id', 'left');
        $query = $this->db->get();
        return $query->result();
    }
    function getwhere($table, $data)
    {
        return $this->db->get_where($table, $data);
    }
    function delete($table, $field, $id)
    {
        $data = $this->db->delete($table, array($field => $id));
        return $data;
    }
    function tambah_data($tabel, $data)
    {
        $this->db->insert($tabel, $data);
        return $this->db->insert_id();
    }

    public function get_by_id($tabel, $id_column, $id)
    {
        $data = $this->db->where($id_column, $id)->get($tabel);
        return $data;
    }

    public function ubah_data($tabel, $data, $where)
    {
        $data = $this->db->update($tabel, $data, $where);
        return $this->db->affected_rows();
    }
    public function get_siswa_foto_by_id($id_siswa)
    {
        $this->db->select('foto');
        $this->db->from('siswa');
        $this->db->where('id_siswa', $id_siswa);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $result = $query->row();
            return $result->foto;
        } else {
            return false;
        }
    }
    public function getAbsensiByIdKaryawan($idKaryawan)
    {
        $this->db->select('absensi.*, user.nama_depan, user.nama_belakang');
        $this->db->where('absensi.id_karyawan', $idKaryawan);
        $this->db->join('user', 'user.id = absensi.id_karyawan', 'left');
        $query = $this->db->get('absensi');
        return $query->result();
    }
    public function get_by_date($date)
    {
        $this->db->select('id');
        $this->db->from('absensi');
        $this->db->where('date', $date);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $result = $query->row();
            return $result->date;
        } else {
            return false;
        }
    }
    public function izin_satu_kali($id)
    {
        $this->db->where('id_karyawan', $id);
        $this->db->where('date', date('Y-m-d'));
        $query = $this->db->get('absensi');
        return $query->result();
    }
    public function getAbsensiLast7Days()
    {
        $this->load->database();
        $end_date = date('Y-m-d');
        $start_date = date('Y-m-d', strtotime('-7 days', strtotime($end_date)));
        $query = $this->db->select('absensi.*, user.nama_depan, user.nama_belakang,date, kegiatan, jam_masuk, jam_pulang, keterangan_izin, status, COUNT(*) AS total_absences')
            ->from('absensi')
            ->join('user', 'absensi.id_karyawan = user.id','left')
            ->where('date >=', $start_date)
            ->where('date <=', $end_date)
            ->group_by('date, kegiatan, jam_masuk, jam_pulang, keterangan_izin, status')
            ->get();
        return $query->result_array();
    }
    public function getbulanan($bulan)
    {
        $this->db->select('absensi.*, user.nama_depan, user.nama_belakang');
        $this->db->from('absensi');
        $this->db->join('user', 'absensi.id_karyawan = user.id', 'left');
        $this->db->where("DATE_FORMAT(absensi.date,'%m') =", $bulan);
        $db = $this->db->get();
        $result = $db->result();
        return $result;
    }
    public function getDailyData($date)
    {
        $this->db->select('absensi.*, user.nama_depan, user.nama_belakang');
        $this->db->from('absensi');
        $this->db->join('user', 'absensi.id_karyawan = user.id', 'left');
        $this->db->where('date', $date);
        $query = $this->db->get();
        return $query->result();
    }
}
