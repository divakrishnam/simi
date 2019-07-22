<?php
class M_Bimbingan extends CI_Model
{
  function show_data_dosen_mahasiswa($where)
  {
    $this->db->select('*');
    $this->db->from('dosen');
    $this->db->join('bimbingan', 'dosen.nik=bimbingan.nik', 'inner');
    $this->db->where($where)->limit(1)->order_by('bimbingan.kd_bimbingan', "DESC");
    $query = $this->db->get();
    return $query;
  }

  function show_data_dosen()
  {
    return $this->db->get('dosen');
  }

  function show_data_mahasiswa()
  {
    $this->db->select('*');
    $this->db->from('mahasiswa');
    $this->db->join('pendaftaran', 'mahasiswa.npm=pendaftaran.npm', 'inner');
    $this->db->where(array('status' => null));
    $query = $this->db->get();
    return $query;
  }

  function input_data_koordinator($data)
  {
    $this->db->insert('bimbingan', $data);
  }

  function show_data_pendaftaran($where)
  {
    $this->db->select('*');
    $this->db->from('pendaftaran');
    $this->db->where($where)->limit(1)->order_by('kd_pendaftaran', "ASC");
    $query = $this->db->get();
    return $query;
  }

  function show_data_bimbingan()
  {
    $this->db->select('*, dosen.nama as namaDos, mahasiswa.nama as namaMhs');
    $this->db->from('bimbingan');
    $this->db->join('mahasiswa', 'mahasiswa.npm=bimbingan.npm', 'inner');
    $this->db->join('dosen', 'dosen.nik=bimbingan.nik', 'inner');
    $this->db->join('detail_bimbingan', 'detail_bimbingan.kd_bimbingan=bimbingan.kd_bimbingan', 'inner')->order_by('kd_detail_bimbingan', "DESC");;
    $query = $this->db->get();
    return $query;
  }

  function show_data_bimbingan_koordinator()
  {
    $this->db->select('*, dosen.nama as namaDos, mahasiswa.nama as namaMhs');
    $this->db->from('bimbingan');
    $this->db->join('mahasiswa', 'mahasiswa.npm=bimbingan.npm', 'inner');
    $this->db->join('dosen', 'dosen.nik=bimbingan.nik', 'inner');
    $query = $this->db->get();
    return $query;
  }

  function show_data_bimbingan_koordinator_update($where)
  {
    $this->db->select('*, dosen.nama as namaDos, mahasiswa.nama as namaMhs');
    $this->db->from('bimbingan');
    $this->db->join('mahasiswa', 'mahasiswa.npm=bimbingan.npm', 'inner');
    $this->db->join('dosen', 'dosen.nik=bimbingan.nik', 'inner');
    $this->db->where($where)->order_by('kd_bimbingan', "DESC");
    $query = $this->db->get();
    return $query;
  }

  function edit_data_bimbingan($where,$data){
		$this->db->where($where);
		$this->db->update('bimbingan',$data);
  }
  function delete_data_bimbingan($where){
		$this->db->where($where);
		$this->db->delete('bimbingan');
	}

  function show_data_bimbingan_dosen($where)
  {
    $this->db->select('*');
    $this->db->from('bimbingan');
    $this->db->join('mahasiswa', 'mahasiswa.npm=bimbingan.npm', 'inner');
    $this->db->join('detail_bimbingan', 'detail_bimbingan.kd_bimbingan=bimbingan.kd_bimbingan', 'inner');
    $this->db->where($where)->order_by('kd_detail_bimbingan', "DESC");
    $query = $this->db->get();
    return $query;
  }

  function edit_data_bimbingan_mahasiswa($where, $data)
  {
    $this->db->where($where);
    $this->db->update('detail_bimbingan', $data);
  }

  function delete_data($where)
  {
    $this->db->where($where);
    $this->db->delete('detail_bimbingan');
  }

  function edit_data_dosen($where, $data)
  {
    $this->db->where($where);
    $this->db->update('detail_bimbingan', $data);
  }

  function show_data_bimbingan_mahasiswa($where)
  {
    $this->db->select('*, dosen.nama as namaDos');
    $this->db->from('bimbingan');
    $this->db->join('detail_bimbingan', 'detail_bimbingan.kd_bimbingan=bimbingan.kd_bimbingan', 'inner');
    $this->db->join('dosen', 'dosen.nik=bimbingan.nik', 'inner');
    $this->db->where($where)->order_by('kd_detail_bimbingan', "DESC");
    $query = $this->db->get();
    return $query;
  }

  function input_data_bimbingan_mahasiswa($data)
  {
    $this->db->insert('detail_bimbingan', $data);
  }
}
