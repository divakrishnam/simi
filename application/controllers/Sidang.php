<?php
class Sidang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_sidang');
        if ($this->session->userdata('status') != 'login') {
            redirect(base_url('login'));
        }
    }

    function dosen()
    {
        $where = array('bimbingan.nik' => $this->session->userdata('id'), 'bimbingan.status' => null);
        $data['mahasiswa'] = $this->m_sidang->show_data_mahasiswa_dosen($where)->result();
        $where = array('bimbingan.nik' => $this->session->userdata('id'), 'sidang.status' => null);
        $data['sidang'] = $this->m_sidang->show_data_sidang_dosen($where)->result();
        $this->load->view('header');
        $this->load->view('sidang/sidang-dosen', $data);
        $this->load->view('footer');
    }

    function create_act_dosen()
    {
        $kd_sidang = $this->input->post('kd_sidang');
        $berita_acara = $this->upload_berita_acara($kd_sidang, null);
        $nilai = $this->input->post('nilai');
        $data = array(
            'upload_berita_acara' => $berita_acara,
            'nilai' => $nilai,
        );

        $where = array('kd_sidang' => $kd_sidang);

        $this->m_sidang->edit_data_dosen($where, $data);
        $this->session->set_flashdata('message', 'simpan');
        redirect(base_url('sidang/dosen'));
    }

    function update($kd_sidang, $kd_bimbingan, $npm)
    {
        $where = array('sidang.kd_sidang' => $kd_sidang, 'sidang.kd_bimbingan' => $kd_bimbingan, 'bimbingan.npm' => $npm, 'sidang.status' => null);
        $data['sidg'] = $this->m_sidang->show_data_sidang_dosen($where)->row();
        $where = array('bimbingan.nik' => $this->session->userdata('id'), 'sidang.status' => null);
        $data['sidang'] = $this->m_sidang->show_data_sidang_dosen($where)->result();
        $this->load->view('header');
        $this->load->view('sidang/sidang-dosen-ubah', $data);
        $this->load->view('footer');
    }

    function update_act_dosen($kd_sidang, $kd_bimbingan)
    {
        $ubah_berita_acara = $this->input->post('ubah_berita_acara');
        $berita_acara = $this->upload_berita_acara($kd_sidang, $ubah_berita_acara);
        $nilai = $this->input->post('nilai');
        $data = array(
            'upload_berita_acara' => $berita_acara,
            'nilai' => $nilai,
        );

        $where = array('kd_sidang' => $kd_sidang, 'kd_bimbingan' => $kd_bimbingan, 'status' => null);

        $this->m_sidang->edit_data_dosen($where, $data);
        $this->session->set_flashdata('message', 'ubah');
        redirect(base_url('sidang/dosen'));
    }

    function upload_berita_acara($kd_sidang, $ubah_berita_acara)
    {
        $config['upload_path']          = './uploads/sidang';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['file_name']            = $kd_sidang;
        $config['max_size']             = 1000;
        $config['overwrite']            = true;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('berita_acara')) {
            // $error = array('error' => $this->upload->display_errors());
            // print_r($error);
            return $ubah_berita_acara;
        } else {
            // $data = array('upload_data' => $this->upload->data());
            // print_r($data);
            return $this->upload->data("file_name");
        }
    }

    function koordinator()
    {
        $data['dosen'] = $this->m_sidang->show_data_dosen()->result();
        $data['mahasiswa'] = $this->m_sidang->show_data_mahasiswa()->result();
        $data['sidang'] = $this->m_sidang->show_data_sidang()->result();
        $this->load->view('header');
        $this->load->view('sidang/sidang-koordinator', $data);
        $this->load->view('footer');
    }

    function create_act_sidang()
    {
        $kd_bimbingan = $this->input->post('kd_bimbingan');
        $nik = $this->input->post('nik');
        $date  =  date_create($this->input->post('tanggal_sidang'));
        $tanggal_sidang = date_format($date, "Y-m-d");
        $time  =  date_create($this->input->post('waktu_sidang'));
        $waktu_sidang = date_format($time, "H:i:s");
        $ruangan = $this->input->post('ruangan');

        $data = array(
            'kd_bimbingan' => $kd_bimbingan,
            'nik_penguji' => $nik,
            'tgl_sidang' => $tanggal_sidang,
            'waktu_sidang' => $waktu_sidang,
            'ruangan' => $ruangan,
        );

        $this->m_sidang->input_data($data);

        redirect(base_url('sidang/koordinator'));
    }

    function update_sidang_koordinator($kd_sidang, $kd_bimbingan, $npm)
    {
        $data['dosen'] = $this->m_sidang->show_data_dosen()->result();
        $where = array('kd_sidang' => $kd_sidang, 'sidang.kd_bimbingan' => $kd_bimbingan, 'bimbingan.npm' => $npm, 'sidang.status' => null);
        $data['sids'] = $this->m_sidang->show_data_sidang_koordinator($where)->row();
        $data['sidang'] = $this->m_sidang->show_data_sidang()->result();
        $this->load->view('header');
        $this->load->view('sidang/sidang-koordinator-ubah', $data);
        $this->load->view('footer');
    }

    function update_act_sidang_koordinator($kd_sidang, $kd_bimbingan)
    {
        $nik = $this->input->post('nik');
        $date  =  date_create($this->input->post('tanggal_sidang'));
        $tanggal_sidang = date_format($date, "Y-m-d");
        $time  =  date_create($this->input->post('waktu_sidang'));
        $waktu_sidang = date_format($time, "H:i:s");
        $ruangan = $this->input->post('ruangan');

        $data = array(
            'nik_penguji' => $nik,
            'tgl_sidang' => $tanggal_sidang,
            'waktu_sidang' => $waktu_sidang,
            'ruangan' => $ruangan,
        );

        $where = array('kd_sidang' => $kd_sidang, 'sidang.kd_bimbingan' => $kd_bimbingan, 'sidang.status' => null);

        $this->m_sidang->edit_data_sidang($where, $data);

        redirect(base_url('sidang/koordinator'));
    }

    function delete_act($kd_sidang, $kd_bimbingan, $npm)
    {
        $where = array('kd_sidang' => $kd_sidang, 'sidang.kd_bimbingan' => $kd_bimbingan, 'bimbingan.npm' => $npm, 'sidang.status' => null);
        $this->m_sidang->delete_data($where);
        $this->session->set_flashdata('message', 'hapus');
        redirect(base_url('sidang/koordinator'));
    }

    function laporan()
    {
        $data['sidang'] = $this->m_sidang->show_data_sidang()->result();
        $this->load->view('header');
        $this->load->view('sidang/sidang-laporan', $data);
        $this->load->view('footer');
    }

    function laporan_dosen()
    {
        $where = array('bimbingan.nik' => $this->session->userdata('id'), 'sidang.status' => null);
        $data['sidang'] = $this->m_sidang->show_data_sidang_dosen($where)->result();
        $this->load->view('header');
        $this->load->view('sidang/sidang-laporan-dosen', $data);
        $this->load->view('footer');
    }

    function laporan_mahasiswa()
    {
        $where = array('bimbingan.npm' => $this->session->userdata('id'));
        $data['sidang'] = $this->m_sidang->show_data_sidang_mahasiswa($where)->result();
        $this->load->view('header');
        $this->load->view('sidang/sidang-laporan-mahasiswa', $data);
        $this->load->view('footer');
    }
    function download($url){				
		force_download('uploads/sidang/'.$url,NULL);
	}	
}
