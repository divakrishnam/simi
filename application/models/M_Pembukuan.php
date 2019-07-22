<?php
class M_Pembukuan extends CI_Model
{
  function show_data_mahasiswa()
  {
    $this->db->distinct();
    $this->db->select('*');
    $this->db->from('mahasiswa');
    $this->db->join('pendaftaran', 'pendaftaran.npm=mahasiswa.npm', 'inner');
    $this->db->join('bimbingan', 'bimbingan.npm=mahasiswa.npm', 'inner');
    $this->db->join('sidang', 'bimbingan.kd_bimbingan=sidang.kd_bimbingan', 'inner');
    $this->db->where(array('sidang.status'=>null))->limit(1)->order_by('sidang.kd_bimbingan', "DESC");
    $query = $this->db->get();
    return $query;
  }

  function show_data_sidang($where)
  {
    $this->db->select('*');
    $this->db->from('sidang');
    $this->db->join('draft_sidang', 'draft_sidang.kd_bimbingan=sidang.kd_bimbingan', 'inner');    
    $this->db->join('bimbingan', 'bimbingan.kd_bimbingan=sidang.kd_bimbingan', 'inner');
    $this->db->join('pendaftaran', 'pendaftaran.kd_pendaftaran=bimbingan.kd_pendaftaran', 'inner');
    $this->db->where($where)->limit(1)->order_by('sidang.kd_bimbingan', "DESC");
    $query = $this->db->get();
    return $query;
  }

  function show_data_all($where)
  {
    $this->db->select('*');
    $this->db->from('sidang');
    $this->db->join('bimbingan', 'bimbingan.kd_bimbingan=sidang.kd_bimbingan', 'inner');
    $this->db->where($where)->limit(1)->order_by('sidang.kd_bimbingan', "DESC");
    $query = $this->db->get();
    return $query;
  }

  function input_data($data, $bimbingan, $pendaftaran, $draftsidang, $sidang)
  {
    $this->db->insert('pembukuan', $data);

    $this->db->where($bimbingan);
    $this->db->update('bimbingan',array('status'=>'Approve'));
    
    $this->db->where($pendaftaran);
    $this->db->update('pendaftaran',array('status'=>'Approve'));
    
    $this->db->where($draftsidang);
    $this->db->update('draft_sidang',array('status'=>'Approve'));
    
    $this->db->where($sidang);
		$this->db->update('sidang',array('status'=>'Approve'));
  }

  function show_data_pembukuan()
  {
    $this->db->select('*, dosen.nama as namaDos, mahasiswa.nama as namaMhs');
    $this->db->from('sidang');
    $this->db->join('bimbingan', 'bimbingan.kd_bimbingan=sidang.kd_bimbingan', 'inner');
    $this->db->join('dosen', 'dosen.nik=bimbingan.nik', 'inner');
    $this->db->join('mahasiswa', 'mahasiswa.npm=bimbingan.npm', 'inner');
    $this->db->join('pembukuan', 'pembukuan.kd_sidang=sidang.kd_sidang', 'inner');
    $query = $this->db->get();
    return $query;
  }

  function show_data_pembukuan_mahasiswa($where)
  {
    $this->db->select('*, dosen.nama as namaDos, mahasiswa.nama as namaMhs');
    $this->db->from('sidang');
    $this->db->join('bimbingan', 'bimbingan.kd_bimbingan=sidang.kd_bimbingan', 'inner');
    $this->db->join('dosen', 'dosen.nik=bimbingan.nik', 'inner');
    $this->db->join('mahasiswa', 'mahasiswa.npm=bimbingan.npm', 'inner');
    $this->db->join('pembukuan', 'pembukuan.kd_sidang=sidang.kd_sidang', 'inner');
    $this->db->where($where)->order_by('sidang.kd_bimbingan', "DESC");
    $query = $this->db->get();
    return $query;
  }
}
