<?php
class DraftSidang extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('m_draftsidang');
        if($this->session->userdata('status') != 'login'){
            redirect(base_url('login'));
        }
    }

    function index(){
        $data['mahasiswa'] = $this->m_draftsidang->show_data_mahasiswa()->result();
        $data['draftsidang'] = $this->m_draftsidang->show_data_draftsidang(array('draft_sidang.status'=>null))->result();
        $this->load->view('header');
        $this->load->view('draft-sidang/draft-sidang-admin', $data);
        $this->load->view('footer');
    }

    function create_act(){
        $npm = $this->input->post('npm');
        $date = date_create($this->input->post('tanggal_pengumpulan'));
        $tanggal_pengumpulan = date_format($date,"Y-m-d");
        $terlambat = $this->input->post('terlambat');
        $cd = $this->input->post('cd');
        $laporan = $this->input->post('laporan'); 
        
        $where = array('npm' => $npm);
        $dt = $this->m_draftsidang->show_data_bimbingan($where)->row();

        $data = array(
            'kd_bimbingan' => $dt->kd_bimbingan,
            'npm' => $npm,
            'tgl_pengumpulan' => $tanggal_pengumpulan,
            'terlambat' => $terlambat,
            'cd' => $cd,
            'laporan' => $laporan,
        );

        $where = array(
            'status' => null,
            'kd_bimbingan'=> $dt->kd_bimbingan, 
            'npm'=>$npm
        );

        $this->m_draftsidang->input_data($data, $where); 
        $this->session->set_flashdata('message','simpan');
        redirect(base_url('draftsidang'));
    }

    function update($kd_bimbingan, $npm){
        $where = array('bimbingan.kd_bimbingan' => $kd_bimbingan, 'bimbingan.npm' => $npm);
        $data['drfs'] = $this->m_draftsidang->edit_data_draftsidang($where)->row();
        $data['draftsidang'] = $this->m_draftsidang->show_data_draftsidang(array('draft_sidang.status'=>null))->result();
        $this->load->view('header');
        $this->load->view('draft-sidang/draft-sidang-admin-ubah', $data);
        $this->load->view('footer');
    }

    function update_act($kd_bimbingan, $npm){
        $date = date_create($this->input->post('tanggal_pengumpulan'));
        $tanggal_pengumpulan = date_format($date,"Y-m-d");
        $terlambat = $this->input->post('terlambat');
        $cd = $this->input->post('cd');
        $laporan = $this->input->post('laporan'); 
        
        $where = array('kd_bimbingan' => $kd_bimbingan, 'npm' => $npm);

        $data = array(
            'tgl_pengumpulan' => $tanggal_pengumpulan,
            'terlambat' => $terlambat,
            'cd' => $cd,
            'laporan' => $laporan,
        );

        $this->m_draftsidang->edit_data($where, $data); 
        $this->session->set_flashdata('message','ubah');
        redirect(base_url('draftsidang'));
    }

    function delete_act($kd_bimbingan, $npm){
        $where = array('kd_bimbingan' => $kd_bimbingan, 'npm' => $npm);
        $this->m_draftsidang->delete_data($where);
        $this->session->set_flashdata('message','hapus');
        redirect(base_url('draftsidang'));
    }

    function laporan(){
        $data['draftsidang'] = $this->m_draftsidang->show_data_draftsidangs()->result();
        $this->load->view('header');
        $this->load->view('draft-sidang/draft-sidang-laporan', $data);
        $this->load->view('footer');
    }

    function laporan_mahasiswa(){
        $where = array('bimbingan.npm' => $this->session->userdata('id'));
        $data['draftsidang'] = $this->m_draftsidang->show_data_draftsidang_mahasiswa($where)->result();
        $this->load->view('header');
        $this->load->view('draft-sidang/draft-sidang-laporan-mahasiswa', $data);
        $this->load->view('footer');
    }
}
?>