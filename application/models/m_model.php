<?php

class M_model extends CI_Model{
    function get_data($table){
        return $this->db->get($table);
    }

    function getwhere($table, $data)
    {
        return $this->db->get_where($table, $data);
    }
    function delete($table, $field, $id)
    {
        $data=$this->db->delete($table,array($field => $id));
        return $data;
    }
    function tambah_data($tabel, $data)
    {
       $this->db->insert($tabel, $data);
        return $this->db->insert_id();
    }

    public function get_by_id($tabel,$id_column,$id){
        $data=$this->db->where($id_column, $id)->get($tabel);
        return $data;
    }

    public function ubah_data($tabel,$data,$where){
        $data=$this->db->update($tabel,$data,$where);
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
}
