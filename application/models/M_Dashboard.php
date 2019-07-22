<?php
class M_Dashboard extends CI_Model{
    function show_admin($where){
		return $this->db->get_where('user', $where);
	}
    function show_dosen($where){
        $this->db->select('*');
        $this->db->from('dosen');
        $this->db->join('user','dosen.nik=user.id','inner');
        $this->db->where($where);
        $query=$this->db->get();
		return $query;
    }
    function show_mahasiswa($where){
        $this->db->select('*');
        $this->db->from('mahasiswa');
        $this->db->join('user','mahasiswa.npm=user.id','inner');
        $this->db->where($where);
        $query=$this->db->get();
		return $query;
    }
}
?>