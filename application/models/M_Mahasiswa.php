<?php
class M_Mahasiswa extends CI_Model{
    function show_data(){
		return $this->db->get('mahasiswa');
	}

	function input_data_user($data){
		$this->db->insert('user',$data);
	}

	function input_data_mahasiswa($data){
		$this->db->insert('mahasiswa',$data);
	}

	function show_data_edit($where){		
		$this->db->select('*');
        $this->db->from('mahasiswa');
        $this->db->join('user','mahasiswa.npm=user.id','inner');
        $this->db->where($where);
        $query=$this->db->get();
		return $query;
	}

	function edit_data_user($where,$data){
		$this->db->where($where);
		$this->db->update('user',$data);
	}
	
	function edit_data_mahasiswa($where,$data){
		$this->db->where($where);
		$this->db->update('mahasiswa',$data);
	}

	function delete_data_user($where){
		$this->db->where($where);
		$this->db->delete('user');
	}

	function delete_data_mahasiswa($where){
		$this->db->where($where);
		$this->db->delete('mahasiswa');
	}
}
?>