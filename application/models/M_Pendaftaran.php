<?php
class M_Pendaftaran extends CI_Model
{
  function show_data_mahasiswa()
  {
    return $this->db->get('mahasiswa');
  }

  function show_data_pendaftaran()
  {
    $this->db->select('*');
    $this->db->from('pendaftaran');
    $this->db->join('mahasiswa', 'pendaftaran.npm=mahasiswa.npm', 'inner')->order_by('pendaftaran.kd_pendaftaran', "DESC");;
    $query = $this->db->get();
    return $query;
  }

  function show_data_pendaftaran_mahasiswa($where)
  {
    $this->db->select('*');
    $this->db->from('pendaftaran');
    $this->db->join('mahasiswa', 'pendaftaran.npm=mahasiswa.npm', 'inner');
    $this->db->where($where)->order_by('pendaftaran.kd_pendaftaran', "DESC");
    $query = $this->db->get();
    return $query;
  }

  function input_data($data)
  {
    $this->db->insert('pendaftaran', $data);
  }

  function edit_data($where,$data){
		$this->db->where($where);
		$this->db->update('pendaftaran',$data);
  }
  function delete_data($where){
		$this->db->where($where);
		$this->db->delete('pendaftaran');
  }
  
  function search_pendaftaran($keyword){
    $this->db->select('*');
    $this->db->from('pendaftaran');
    $this->db->join('mahasiswa', 'pendaftaran.npm=mahasiswa.npm', 'inner');
    $this->db->where(array('year(tgl_pendaftaran)'=>$keyword));
    return $this->db->get();
  }
  function edit_data_diterima($where,$data){
		$this->db->where($where);
		$this->db->update('pendaftaran',$data);
  }
}
