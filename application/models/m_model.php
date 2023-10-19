<?php

class M_model extends CI_Model
{
    function get_data($table)
    {
        return $this->db->get($table);
    }

    public function get_izin($id_karyawan)
    {
        // memilih kolom yg diperlukan dan menghitung total jam masuk
        $this->db->select('absensi.*,user.id, COUNT(TIME_TO_SEC(jam_masuk)) AS total_jam_masuk');    
        // membatasi hasil pencarian berdasarkan id karyawan 
        $this->db->where('absensi.id_karyawan',$id_karyawan);
        // membatasi hasil pencarian hanya untuk jam masuk dengan nilai '00:00:00'
        $this->db->where('jam_masuk','00:00:00');
        // menggabungkan table user dengan absensi menggunakan left join
        $this->db->join('user','user.id = absensi.id_karyawan','left');
        // menjalankan query untuk mengambil data ari table absensi
        $query = $this->db->get('absensi');
        // mengambil query untuk object tunggal 
        $result = $query->row();
        // mengembalikan total jam masuk
        return $result->total_jam_masuk;
    }
    public function get_absen($id_karyawan)
    {
     // memilih kolom yg diperlukan dan menghitung total jam masuk
     $this->db->select('absensi.*,user.id, COUNT(IF(jam_masuk != "00:00:00",TIME_TO_SEC(jam_masuk),0)) as total_jam_masuk');
     // membatasi hasil pencarian berdasarkan id karyawan 
     $this->db->where('absensi.id_karyawan',$id_karyawan);
     // membatasi hasil pencarian hanya untuk jam masuk dengan nilai '00:00:00'
     $this->db->where('jam_masuk !=','00:00:00');
      // menggabungkan table user dengan absensi menggunakan left join
     $this->db->join('user','user.id = absensi.id_karyawan','left');
     // menjalankan query untuk mengambil data ari table absensi
     $query = $this->db->get('absensi');
     // mengambil query untuk object tunggal
     $result = $query->row();
      // mengembalikan total jam masuk
     return $result->total_jam_masuk;
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

    // untuk relasi nama depan dan nama belakang dri table user
    public function getAbsensiByIdKaryawan($idKaryawan)
    {
        $this->db->select('absensi.*, user.nama_depan, user.nama_belakang');
        $this->db->where('absensi.id_karyawan', $idKaryawan);
        $this->db->join('user', 'user.id = absensi.id_karyawan', 'left');
        $query = $this->db->get('absensi');
        return $query->result();
    }
    // public function get_by_date($date)
    // {
    //     $this->db->select('id');
    //     $this->db->from('absensi');
    //     $this->db->where('date', $date);
    //     $query = $this->db->get();

    //     if ($query->num_rows() > 0) {
    //         $result = $query->row();
    //         return $result->date;
    //     } else {
    //         return false;
    //     }
    // }

    // izin hanya di perbolehkan 1 kali sesuai tgl
    public function izin_satu_kali($id)
    {
        $this->db->where('id_karyawan', $id);
        $this->db->where('date', date('Y-m-d'));
        $query = $this->db->get('absensi');
        return $query->result();
    }

    // rekap seminggu
    public function getAbsensiLast7Days()
    {
        $this->load->database();
        $end_date = date('Y-m-d');
        $start_date = date('Y-m-d', strtotime('-7 days', strtotime($end_date)));
        $query = $this->db->select('absensi.*, user.nama_depan, user.nama_belakang,date, kegiatan, jam_masuk, jam_pulang, keterangan_izin, status, COUNT(*) AS total_absences')
            ->from('absensi')
            ->join('user', 'absensi.id_karyawan = user.id', 'left')
            ->where('date >=', $start_date)
            ->where('date <=', $end_date)
            ->group_by('date, kegiatan, jam_masuk, jam_pulang, keterangan_izin, status')
            ->get();
        return $query->result_array();
    }

    // untuk rekap perbulan
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

    // untuk absensi rekap per hari
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
