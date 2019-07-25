<?php
class Bimbingan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_bimbingan');
        if ($this->session->userdata('status') != 'login') {
            redirect(base_url('login'));
        }
    }


    function koordinator()
    {
        $data['dosen'] = $this->m_bimbingan->show_data_dosen()->result();
        $data['mahasiswa'] = $this->m_bimbingan->show_data_mahasiswa()->result();
        $data['bimbingan'] = $this->m_bimbingan->show_data_bimbingan_koordinator()->result();
        $this->load->view('header');
        $this->load->view('bimbingan/bimbingan-koordinator', $data);
        $this->load->view('footer');
    }

    function create_act_bimbingan()
    {
        $npm = $this->input->post('npm');
        $nik = $this->input->post('nik');

        $where = array('npm' => $npm, 'status' => null);
        $dt = $this->m_bimbingan->show_data_pendaftaran($where)->row();

        $data = array(
            'npm' => $npm,
            'nik' => $nik,
            'kd_pendaftaran' => $dt->kd_pendaftaran
        );

        $where = array(
            'status' => null,
            'kd_pendaftaran' => $dt->kd_pendaftaran,
            'npm' => $npm
        );

        $this->m_bimbingan->input_data_koordinator($data, $where);
        $this->session->set_flashdata('message', 'simpan');
        redirect(base_url('bimbingan/koordinator'));
    }

    function update_bimbingan($kd_bimbingan, $npm)
    {
        $where = array('kd_bimbingan' => $kd_bimbingan, 'bimbingan.npm' => $npm);
        $data['bimb'] = $this->m_bimbingan->show_data_bimbingan_koordinator_update($where)->row();
        $data['bimbingan'] = $this->m_bimbingan->show_data_bimbingan_koordinator()->result();
        $data['dosen'] = $this->m_bimbingan->show_data_dosen()->result();
        $this->load->view('header');
        $this->load->view('bimbingan/bimbingan-koordinator-ubah', $data);
        $this->load->view('footer');
    }

    function update_act_bimbingan($kd_bimbingan, $npm)
    {
        $nik = $this->input->post('nik');

        $data = array(
            'nik' => $nik,
        );

        $where = array('kd_bimbingan' => $kd_bimbingan, 'bimbingan.npm' => $npm, 'status' => null);
        $this->m_bimbingan->edit_data_bimbingan($where, $data);
        $this->session->set_flashdata('message', 'ubah');
        redirect(base_url('bimbingan/koordinator'));
    }

    function delete_act_bimbingan($kd_bimbingan, $npm)
    {
        $where = array('kd_bimbingan' => $kd_bimbingan, 'bimbingan.npm' => $npm, 'status' => null);
        $this->m_bimbingan->delete_data_bimbingan($where);
        $this->session->set_flashdata('message', 'hapus');
        redirect(base_url('bimbingan/koordinator'));
    }

    function dosen()
    {
        $where = array('nik' => $this->session->userdata('id'));
        $data['bimbingan'] = $this->m_bimbingan->show_data_bimbingan_dosen($where)->result();
        $this->load->view('header');
        $this->load->view('bimbingan/bimbingan-dosen', $data);
        $this->load->view('footer');
    }

    function update_act_approve($kd_detail_bimbingan, $kd_bimbingan, $npm)
    {
        $where = array('detail_bimbingan.npm' => $npm, 'detail_bimbingan.kd_bimbingan' => $kd_bimbingan, 'detail_bimbingan.kd_detail_bimbingan' => $kd_detail_bimbingan);
        if ($this->input->post('persetujuan') == 'Approve') {
            $data = array(
                'status_bimbingan' => null,
            );
        } else {
            $data = array(
                'status_bimbingan' => 'Approve',
            );
        }

        $this->m_bimbingan->edit_data_dosen($where, $data);
        redirect(base_url('bimbingan/dosen'));
    }

    function update_act_rekomendasi($kd_bimbingan, $npm)
    {
        $where = array('bimbingan.npm' => $npm, 'bimbingan.kd_bimbingan' => $kd_bimbingan);
        if ($this->input->post('rekomendasi') == 'Rekomendasi') {
            $data = array(
                'rekomendasi' => null,
            );
        } else {
            $data = array(
                'rekomendasi' => 'Rekomendasi',
            );
        }

        $this->m_bimbingan->edit_data_rekomendasi($where, $data);
        redirect(base_url('bimbingan/laporan'));
    }

    function update_act_rekomendasi_dosen($kd_bimbingan, $npm)
    {
        $where = array('bimbingan.npm' => $npm, 'bimbingan.kd_bimbingan' => $kd_bimbingan);
        if ($this->input->post('rekomendasi') == 'Rekomendasi') {
            $data = array(
                'rekomendasi' => null,
            );
        } else {
            $data = array(
                'rekomendasi' => 'Rekomendasi',
            );
        }

        $this->m_bimbingan->edit_data_rekomendasi($where, $data);
        redirect(base_url('bimbingan/laporan_dosen'));
    }

    function mahasiswa()
    {
        $where = array('bimbingan.npm' => $this->session->userdata('id'), 'status' => null);
        $data['dosen'] = $this->m_bimbingan->show_data_dosen_mahasiswa($where)->row();
        $data['bimbingan'] = $this->m_bimbingan->show_data_bimbingan_mahasiswa($where)->result();
        $this->load->view('header');
        $this->load->view('bimbingan/bimbingan-mahasiswa', $data);
        $this->load->view('footer');
    }

    function create_act_bimbingan_mahasiswa()
    {
        $npm = $this->session->userdata('id');
        $kd_bimbingan = $this->input->post('kd_bimbingan');
        $date = date_create($this->input->post('tanggal_bimbingan'));
        $tanggal_bimbingan = date_format($date, "Y-m-d");
        $topik_bimbingan = $this->input->post('topik_bimbingan');

        $data = array(
            'npm' => $npm,
            'kd_bimbingan' => $kd_bimbingan,
            'tanggal_bimbingan' => $tanggal_bimbingan,
            'topik_bimbingan' => $topik_bimbingan,
        );

        $this->m_bimbingan->input_data_bimbingan_mahasiswa($data);
        $this->session->set_flashdata('message', 'simpan');
        redirect(base_url('bimbingan/mahasiswa'));
    }

    function update($kd_detail_bimbingan, $kd_bimbingan, $npm)
    {
        $where = array('bimbingan.kd_bimbingan' => $kd_bimbingan, 'bimbingan.npm' => $npm);
        $data['dosen'] = $this->m_bimbingan->show_data_dosen_mahasiswa($where)->row();
        $where = array('bimbingan.npm' => $npm, 'detail_bimbingan.kd_bimbingan' => $kd_bimbingan, 'detail_bimbingan.kd_detail_bimbingan' => $kd_detail_bimbingan);
        $data['bimb'] = $this->m_bimbingan->show_data_bimbingan_mahasiswa($where)->row();
        $where = array('bimbingan.npm' => $npm, 'status' => null);
        $data['bimbingan'] = $this->m_bimbingan->show_data_bimbingan_mahasiswa($where)->result();
        $this->load->view('header');
        $this->load->view('bimbingan/bimbingan-mahasiswa-ubah', $data);
        $this->load->view('footer');
    }

    function update_act_bimbingan_mahasiswa($kd_detail_bimbingan, $kd_bimbingan, $npm)
    {

        $date = date_create($this->input->post('tanggal_bimbingan'));
        $tanggal_bimbingan = date_format($date, "Y-m-d");
        $topik_bimbingan = $this->input->post('topik_bimbingan');

        $data = array(
            'npm' => $npm,
            'kd_bimbingan' => $kd_bimbingan,
            'tanggal_bimbingan' => $tanggal_bimbingan,
            'topik_bimbingan' => $topik_bimbingan,
        );

        $where = array('npm' => $npm, 'kd_bimbingan' => $kd_bimbingan, 'kd_detail_bimbingan' => $kd_detail_bimbingan);

        $this->m_bimbingan->edit_data_bimbingan_mahasiswa($where, $data);
        $this->session->set_flashdata('message', 'ubah');
        redirect(base_url('bimbingan/mahasiswa'));
    }

    function delete_act($kd_detail_bimbingan, $kd_bimbingan, $npm)
    {
        $where = array('npm' => $npm, 'kd_bimbingan' => $kd_bimbingan, 'kd_detail_bimbingan' => $kd_detail_bimbingan);
        $this->m_bimbingan->delete_data($where);
        $this->session->set_flashdata('message', 'hapus');
        redirect(base_url('bimbingan/mahasiswa'));
    }

    function laporan()
    {
        $where = array('status' => null);
        $data['bimbingan'] = $this->m_bimbingan->show_data_bimbingan()->result();
        $data['rekomendasi'] = $this->m_bimbingan->show_data_rekomendasi($where)->result();
        $this->load->view('header');
        $this->load->view('bimbingan/bimbingan-laporan', $data);
        $this->load->view('footer');
    }

    function laporan_dosen()
    {
        $where = array('bimbingan.nik' => $this->session->userdata('id'), 'status' => null);
        $data['bimbingan'] = $this->m_bimbingan->show_data_bimbingan()->result();
        $data['rekomendasi'] = $this->m_bimbingan->show_data_rekomendasi($where)->result();
        $this->load->view('header');
        $this->load->view('bimbingan/bimbingan-laporan-dosen', $data);
        $this->load->view('footer');
    }

    function laporan_mahasiswa()
    {
        $where = array('bimbingan.npm' => $this->session->userdata('id'), 'status' => null);
        $data['bimbingan'] = $this->m_bimbingan->show_data_bimbingan_mahasiswa($where)->result();
        $this->load->view('header');
        $this->load->view('bimbingan/bimbingan-laporan-mahasiswa', $data);
        $this->load->view('footer');
    }

    function search_bimbingan()
    {
        $bimbingan = $this->input->post('bimbingan');
        $data['bimbingan'] = $this->m_bimbingan->search_bimbingan($bimbingan)->result();
        $this->load->view('header');
        $this->load->view('bimbingan/bimbingan-laporan', $data);
        $this->load->view('footer');
    }
}
