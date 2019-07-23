<?php
class Pendaftaran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_pendaftaran');
        if ($this->session->userdata('status') != 'login') {
            redirect(base_url('login'));
        }
    }

    function admin()
    {
        $data['mahasiswa'] = $this->m_pendaftaran->show_data_mahasiswa()->result();
        $data['pendaftaran'] = $this->m_pendaftaran->show_data_pendaftaran()->result();
        $this->load->view('header');
        $this->load->view('pendaftaran/pendaftaran-admin', $data);
        $this->load->view('footer');
    }

    function create_act_admin()
    {
        $npm = $this->input->post('npm');
        $date = date_create($this->input->post('tanggal_pendaftaran'));
        $tanggal_pendaftaran = date_format($date, "Y-m-d");
        $nama_perusahaan = $this->input->post('nama_perusahaan');
        $dhs = $this->upload_dhs($npm, null);
        $alamat_perusahaan = $this->input->post('alamat_perusahaan');

        $data = array(
            'npm' => $npm,
            'tgl_pendaftaran' => $tanggal_pendaftaran,
            'nama_perusahaan' => $nama_perusahaan,
            'alamat_perusahaan' => $alamat_perusahaan,
            'upload_dhs' => $dhs,
        );

        $this->m_pendaftaran->input_data($data);
        $this->session->set_flashdata('message','simpan');
        redirect(base_url('pendaftaran/admin'));
    }

    function update_admin($kd_pendaftaran, $npm)
    {
        $where = array('kd_pendaftaran' => $kd_pendaftaran, 'mahasiswa.npm' => $npm);
        $data['pdftr'] = $this->m_pendaftaran->show_data_pendaftaran_mahasiswa($where)->row();
        $data['pendaftaran'] = $this->m_pendaftaran->show_data_pendaftaran()->result();
        $this->load->view('header');
        $this->load->view('pendaftaran/pendaftaran-ubah-admin', $data);
        $this->load->view('footer');
    }

    function update_act_admin($kd_pendaftaran)
    {
        $npm = $this->input->post('npm');
        $date = date_create($this->input->post('tanggal_pendaftaran'));
        $tanggal_pendaftaran = date_format($date, "Y-m-d");
        $nama_perusahaan = $this->input->post('nama_perusahaan');
        $ubah_dhs = $this->input->post('ubah_dhs');
        $dhs = $this->upload_dhs($npm, $ubah_dhs);
        $alamat_perusahaan = $this->input->post('alamat_perusahaan');

        $data = array(
            'tgl_pendaftaran' => $tanggal_pendaftaran,
            'nama_perusahaan' => $nama_perusahaan,
            'alamat_perusahaan' => $alamat_perusahaan,
            'upload_dhs' => $dhs,
        );

        $where = array('kd_pendaftaran' => $kd_pendaftaran, 'pendaftaran.npm' => $npm);

        $this->m_pendaftaran->edit_data($where, $data);
        $this->session->set_flashdata('message','ubah');
        redirect(base_url('pendaftaran/admin'));
    }

    function upload_dhs($npm, $ubah_dhs)
    {
        $config['upload_path']          = './uploads/pendaftaran';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['file_name']            = $npm;
        $config['max_size']             = 1000;
        $config['overwrite']            = true;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('dhs')) {
            $error = array('error' => $this->upload->display_errors());
            print_r($error);
            return $ubah_dhs;
        } else {
            // $data = array('upload_data' => $this->upload->data());
            // print_r($data);
            return $this->upload->data("file_name");
        }
    }

    function mahasiswa()
    {
        $where = array('mahasiswa.npm' => $this->session->userdata('id'));
        $data['pendaftaran'] = $this->m_pendaftaran->show_data_pendaftaran_mahasiswa($where)->result();
        $this->load->view('header');
        $this->load->view('pendaftaran/pendaftaran-mahasiswa', $data);
        $this->load->view('footer');
    }

    function create_act_mahasiswa()
    {
        $npm = $this->session->userdata('id');
        $date = date_create($this->input->post('tanggal_pendaftaran'));
        $tanggal_pendaftaran = date_format($date, "Y-m-d");
        $nama_perusahaan = $this->input->post('nama_perusahaan');
        $dhs = $this->upload_dhs($npm, null);
        $alamat_perusahaan = $this->input->post('alamat_perusahaan');

        $data = array(
            'npm' => $npm,
            'tgl_pendaftaran' => $tanggal_pendaftaran,
            'nama_perusahaan' => $nama_perusahaan,
            'alamat_perusahaan' => $alamat_perusahaan,
            'upload_dhs' => $dhs,
        );

        $this->m_pendaftaran->input_data($data);
        $this->session->set_flashdata('message','simpan');
        redirect(base_url('pendaftaran/mahasiswa'));
    }

    function update($kd_pendaftaran, $npm)
    {
        $where = array('kd_pendaftaran' => $kd_pendaftaran, 'mahasiswa.npm' => $npm);
        $data['pdftr'] = $this->m_pendaftaran->show_data_pendaftaran_mahasiswa($where)->row();
        $where = array('mahasiswa.npm' => $this->session->userdata('id'));
        $data['pendaftaran'] = $this->m_pendaftaran->show_data_pendaftaran_mahasiswa($where)->result();
        $this->load->view('header');
        $this->load->view('pendaftaran/pendaftaran-ubah', $data);
        $this->load->view('footer');
    }

    function update_act($kd_pendaftaran)
    {
        $npm = $this->input->post('npm');
        $date = date_create($this->input->post('tanggal_pendaftaran'));
        $tanggal_pendaftaran = date_format($date, "Y-m-d");
        $nama_perusahaan = $this->input->post('nama_perusahaan');
        $ubah_dhs = $this->input->post('ubah_dhs');
        $dhs = $this->upload_dhs($npm, $ubah_dhs);
        $alamat_perusahaan = $this->input->post('alamat_perusahaan');

        $data = array(
            'tgl_pendaftaran' => $tanggal_pendaftaran,
            'nama_perusahaan' => $nama_perusahaan,
            'alamat_perusahaan' => $alamat_perusahaan,
            'upload_dhs' => $dhs,
        );

        $where = array('kd_pendaftaran' => $kd_pendaftaran, 'pendaftaran.npm' => $npm);

        $this->m_pendaftaran->edit_data($where, $data);
        $this->session->set_flashdata('message','ubah');
        redirect(base_url('pendaftaran/mahasiswa'));
    }

    function delete_act($kd_pendaftaran, $npm){
        $where = array('kd_pendaftaran' => $kd_pendaftaran, 'npm' => $npm);
        $this->m_pendaftaran->delete_data($where);
        $this->session->set_flashdata('message','hapus');
        redirect(base_url('pendaftaran/mahasiswa'));
    }

    function laporan()
    {
        $data['pendaftaran'] = $this->m_pendaftaran->show_data_pendaftaran()->result();
        $data['jumlah'] = $this->m_pendaftaran->show_data_pendaftaran()->num_rows();
        $this->load->view('header');
        $this->load->view('pendaftaran/pendaftaran-laporan', $data);
        $this->load->view('footer');
    }

    function laporan_mahasiswa()
    {
        $where = array('mahasiswa.npm' => $this->session->userdata('id'));
        $data['pendaftaran'] = $this->m_pendaftaran->show_data_pendaftaran_mahasiswa($where)->result();
        $this->load->view('header');
        $this->load->view('pendaftaran/pendaftaran-laporan-mahasiswa', $data);
        $this->load->view('footer');
    }
    function download($url){				
		force_download('uploads/pendaftaran/'.$url,NULL);
    }	
    
    function search_tahun(){
        $date = date_create($this->input->post('tahun_pendaftaran').'-01-01');
        $tahun_pendaftaran = date_format($date, "Y");
        $data['pendaftaran'] = $this->m_pendaftaran->search_pendaftaran($tahun_pendaftaran)->result();
        $data['jumlah'] = $this->m_pendaftaran->search_pendaftaran($tahun_pendaftaran)->num_rows();

        $this->load->view('header');
        $this->load->view('pendaftaran/pendaftaran-laporan', $data);
        $this->load->view('footer');
    }
}
