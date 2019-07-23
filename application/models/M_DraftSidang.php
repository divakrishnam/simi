<?php
class M_DraftSidang extends CI_Model
{
  function show_data_mahasiswa()
  {
    $this->db->select('*');
    $this->db->from('mahasiswa');
    $this->db->join('pendaftaran', 'pendaftaran.npm=mahasiswa.npm', 'inner');
    $this->db->join('bimbingan', 'bimbingan.kd_pendaftaran=pendaftaran.kd_pendaftaran', 'inner');
    $this->db->where(array('bimbingan.status' => null))->order_by('pendaftaran.kd_pendaftaran', "DESC");
    $query = $this->db->get();
    return $query;
  }

  function input_data($data, $where)
  {
    $this->db->where($where);
    $this->db->update('bimbingan',array('status'=>'Approve'));

    $this->db->insert('draft_sidang', $data);
  }

  function show_data_bimbingan($where)
  {
    $this->db->select('*');
    $this->db->from('bimbingan');
    $this->db->where($where)->limit(1)->order_by('kd_bimbingan', "DESC");
    $query = $this->db->get();
    return $query;
  }

  function show_data_draftsidangs()
  {
    $this->db->select('*, dosen.nama as namaDos, mahasiswa.nama as namaMhs');
    $this->db->from('mahasiswa');
    $this->db->join('pendaftaran', 'pendaftaran.npm=mahasiswa.npm', 'inner');
    $this->db->join('bimbingan', 'bimbingan.npm=mahasiswa.npm', 'inner');
    $this->db->join('dosen', 'bimbingan.nik=dosen.nik', 'inner');
    $this->db->join('draft_sidang', 'draft_sidang.kd_bimbingan=bimbingan.kd_bimbingan', 'inner');
    $query = $this->db->get();
    return $query;
  }

  function show_data_draftsidang($where)
  {
    $this->db->select('*, dosen.nama as namaDos, mahasiswa.nama as namaMhs');
    $this->db->from('mahasiswa');
    $this->db->join('pendaftaran', 'pendaftaran.npm=mahasiswa.npm', 'inner');
    $this->db->join('bimbingan', 'bimbingan.npm=mahasiswa.npm', 'inner');
    $this->db->join('dosen', 'bimbingan.nik=dosen.nik', 'inner');
    $this->db->join('draft_sidang', 'draft_sidang.kd_bimbingan=bimbingan.kd_bimbingan', 'inner');
    $this->db->where($where);
    $query = $this->db->get();
    return $query;
  }

  function edit_data_draftsidang($where)
  {
    $this->db->select('*, dosen.nama as namaDos, mahasiswa.nama as namaMhs');
    $this->db->from('mahasiswa');
    $this->db->join('pendaftaran', 'pendaftaran.npm=mahasiswa.npm', 'inner');
    $this->db->join('bimbingan', 'bimbingan.npm=mahasiswa.npm', 'inner');
    $this->db->join('dosen', 'bimbingan.nik=dosen.nik', 'inner');
    $this->db->join('draft_sidang', 'draft_sidang.kd_bimbingan=bimbingan.kd_bimbingan', 'inner');
    $this->db->where($where)->order_by('bimbingan.kd_bimbingan', "DESC");
    $query = $this->db->get();
    return $query;
  }

  function edit_data($where,$data){
		$this->db->where($where);
		$this->db->update('draft_sidang',$data);
	}

  function show_data_draftsidang_mahasiswa($where)
  {
    $this->db->select('*, dosen.nama as namaDos, mahasiswa.nama as namaMhs');
    $this->db->from('mahasiswa');
    $this->db->join('pendaftaran', 'pendaftaran.npm=mahasiswa.npm', 'inner');
    $this->db->join('bimbingan', 'bimbingan.npm=mahasiswa.npm', 'inner');
    $this->db->join('dosen', 'bimbingan.nik=dosen.nik', 'inner');
    $this->db->join('draft_sidang', 'draft_sidang.kd_bimbingan=bimbingan.kd_bimbingan', 'inner');
    $this->db->where($where)->order_by('bimbingan.kd_bimbingan', "DESC");
    $query = $this->db->get();
    return $query;
  }

  function delete_data($where){
    $this->db->where($where);
    $this->db->update('bimbingan',array('status'=>null));

		$this->db->where($where);
		$this->db->delete('draft_sidang');
	}
}
