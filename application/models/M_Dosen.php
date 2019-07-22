<?php
class M_Dosen extends CI_Model{
    function show_data(){
        $this->db->select('*');
        $this->db->from('dosen');
        $this->db->join('user','dosen.nik=user.id','inner');
        $query=$this->db->get();
		return $query;
    }
    
    function input_data_user($data){
		$this->db->insert('user',$data);
	}

	function input_data_dosen($data){
		$this->db->insert('dosen',$data);
	}

	function show_data_edit($where){		
		$this->db->select('*');
        $this->db->from('dosen');
        $this->db->join('user','dosen.nik=user.id','inner');
        $this->db->where($where);
        $query=$this->db->get();
		return $query;
	}

	function edit_data_user($where,$data){
		$this->db->where($where);
		$this->db->update('user',$data);
	}
	
	function edit_data_dosen($where,$data){
		$this->db->where($where);
		$this->db->update('dosen',$data);
	}

	function delete_data_user($where){
		$this->db->where($where);
		$this->db->delete('user');
	}

	function delete_data_dosen($where){
		$this->db->where($where);
		$this->db->delete('dosen');
	}
}
?>