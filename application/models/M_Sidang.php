<?php
class M_Sidang extends CI_Model
{
  function show_data_dosen()
  {
    return $this->db->get('dosen');
  }

  function show_data_mahasiswa()
  {
    $this->db->select('*');
    $this->db->from('mahasiswa');
    $this->db->join('bimbingan', 'mahasiswa.npm=bimbingan.npm', 'inner');
    $this->db->where(array('bimbingan.status'=>null));
    $query = $this->db->get();
    return $query;
  }

  function input_data($data)
  {
    $this->db->insert('sidang', $data);
  }

  function show_data_sidang()
  {
    $this->db->select('*, dosen.nama as namaDos, mahasiswa.nama as namaMhs');
    $this->db->from('sidang');
    $this->db->join('bimbingan', 'sidang.kd_bimbingan =bimbingan.kd_bimbingan ', 'inner');
    $this->db->join('mahasiswa', 'mahasiswa.npm=bimbingan.npm', 'inner');
    $this->db->join('dosen', 'sidang.nik_penguji =dosen.nik', 'inner');
    $query = $this->db->get();
    return $query;
  }

  function show_data_sidang_koordinator($where)
  {
    $this->db->select('*, dosen.nama as namaDos, mahasiswa.nama as namaMhs');
    $this->db->from('sidang');
    $this->db->join('bimbingan', 'sidang.kd_bimbingan =bimbingan.kd_bimbingan ', 'inner');
    $this->db->join('mahasiswa', 'mahasiswa.npm=bimbingan.npm', 'inner');
    $this->db->join('dosen', 'sidang.nik_penguji =dosen.nik', 'inner');
    $this->db->where($where)->order_by('sidang.kd_sidang', "DESC");
    $query = $this->db->get();
    return $query;
  }

  function edit_data_sidang($where, $data)
  {
    $this->db->where($where);
    $this->db->update('sidang', $data);
  }

  function delete_data($where)
  {
    $this->db->where($where);
    $this->db->delete('sidang');
  }

  function show_data_mahasiswa_dosen($where)
  {
    $this->db->distinct();
    $this->db->select('*');
    $this->db->from('sidang');
    $this->db->join('bimbingan', 'sidang.kd_bimbingan=bimbingan.kd_bimbingan', 'inner');
    $this->db->join('mahasiswa', 'mahasiswa.npm=bimbingan.npm', 'inner');
    $this->db->where($where)->order_by('sidang.kd_sidang', "DESC");
    $query = $this->db->get();
    return $query;
  }

  function edit_data_dosen($where, $data)
  {
    $this->db->where($where);
    $this->db->update('sidang', $data);
  }

  function show_data_sidang_dosen($where)
  {
    $this->db->select('*, dosen.nama as namaDos, mahasiswa.nama as namaMhs');
    $this->db->from('sidang');
    $this->db->join('bimbingan', 'sidang.kd_bimbingan =bimbingan.kd_bimbingan ', 'inner');
    $this->db->join('mahasiswa', 'mahasiswa.npm=bimbingan.npm', 'inner');
    $this->db->join('dosen', 'sidang.nik_penguji =dosen.nik', 'inner');
    $this->db->where($where)->order_by('sidang.kd_sidang', "DESC");
    $query = $this->db->get();
    return $query;
  }

  function show_data_sidang_mahasiswa($where)
  {
    $this->db->select('*, dosen.nama as namaDos, mahasiswa.nama as namaMhs');
    $this->db->from('sidang');
    $this->db->join('bimbingan', 'sidang.kd_bimbingan =bimbingan.kd_bimbingan ', 'inner');
    $this->db->join('mahasiswa', 'mahasiswa.npm=bimbingan.npm', 'inner');
    $this->db->join('dosen', 'sidang.nik_penguji =dosen.nik', 'inner');
    $this->db->where($where);
    $query = $this->db->get();
    return $query;
  }
}
