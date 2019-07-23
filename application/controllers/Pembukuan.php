<?php
class Pembukuan extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('m_pembukuan');
        if($this->session->userdata('status') != 'login'){
            redirect(base_url('login'));
        }
    }

    function index(){
        $data['mahasiswa'] = $this->m_pembukuan->show_data_mahasiswa()->result();
        $data['pembukuan'] = $this->m_pembukuan->show_data_pembukuan()->result();
        $this->load->view('header');
        $this->load->view('pembukuan/pembukuan-admin', $data);
        $this->load->view('footer');
    }

    function create_act(){
        $kd_sidang = $this->input->post('kd_sidang');
        $date = date_create($this->input->post('tanggal_pembukuan'));
        $tanggal_pembukuan = date_format($date,"Y-m-d");
        $terlambat = $this->input->post('terlambat');
        $cd = $this->input->post('cd');
        $laporan = $this->input->post('laporan'); 
        
        $where = array('sidang.kd_sidang' => $kd_sidang);
        $dt = $this->m_pembukuan->show_data_sidang($where)->row();

        $data = array(
            'kd_sidang' => $kd_sidang,
            'npm' => $dt->npm,
            'tgl_pembukuan' => $tanggal_pembukuan,
            'terlambat' => $terlambat,
            'cd' => $cd,
            'laporan' => $laporan,
        );

        $where = array('kd_sidang' => $dt->kd_sidang);
        $get = $this->m_pembukuan->show_data_all($where)->row();

        $sidang = array('kd_sidang'=> $get->kd_sidang,'kd_bimbingan'=>$get->kd_bimbingan, 'status' => null );

        $this->m_pembukuan->input_data($data, $sidang); 
        $this->session->set_flashdata('message','simpan');
        redirect(base_url('pembukuan'));
    }

    function update($kd_sidang, $npm){
        $where = array('pembukuan.kd_sidang' => $kd_sidang, 'pembukuan.npm' => $npm);
        $data['pbk'] = $this->m_pembukuan->show_data_pembukuan_mahasiswa($where)->row();
        $data['pembukuan'] = $this->m_pembukuan->show_data_pembukuan()->result();
        $this->load->view('header');
        $this->load->view('pembukuan/pembukuan-admin-ubah', $data);
        $this->load->view('footer');
    }

    function update_act($kd_sidang, $npm){
        $date = date_create($this->input->post('tanggal_pembukuan'));
        $tanggal_pembukuan = date_format($date,"Y-m-d");
        $terlambat = $this->input->post('terlambat');
        $cd = $this->input->post('cd');
        $laporan = $this->input->post('laporan'); 
        
        $where = array('pembukuan.kd_sidang' => $kd_sidang, 'pembukuan.npm' => $npm);

        $data = array(
            'tgl_pembukuan' => $tanggal_pembukuan,
            'terlambat' => $terlambat,
            'cd' => $cd,
            'laporan' => $laporan,
        );

        $this->m_pembukuan->update_data($where, $data); 
        $this->session->set_flashdata('message','ubah');
        redirect(base_url('pembukuan'));
    }

    function delete_act($kd_sidang, $npm){
        $where = array('pembukuan.kd_sidang' => $kd_sidang, 'pembukuan.npm' => $npm);
        $cek = $this->m_pembukuan->show_data_pembukuans($where)->row();
        $sidang = array('sidang.kd_sidang' => $kd_sidang, 'sidang.kd_bimbingan' => $cek->kd_bimbingan);

        $this->m_pembukuan->delete_data($where, $sidang);
        $this->session->set_flashdata('message','hapus');
        redirect(base_url('pembukuan'));
    }

    function laporan(){
        $data['pembukuan'] = $this->m_pembukuan->show_data_pembukuan()->result();
        $this->load->view('header');
        $this->load->view('pembukuan/pembukuan-laporan',$data);
        $this->load->view('footer');
    }
    function laporan_mahasiswa(){
        $where = array('bimbingan.npm' => $this->session->userdata('id'));
        $data['pembukuan'] = $this->m_pembukuan->show_data_pembukuan_mahasiswa($where)->result();
        $this->load->view('header');
        $this->load->view('pembukuan/pembukuan-laporan-mahasiswa',$data);
        $this->load->view('footer');
    }

    function search_laporan(){
        $judul_laporan = $this->input->post('judul_laporan');
        $data['pembukuan'] = $this->m_pembukuan->search_laporan($judul_laporan)->result();
        $this->load->view('header');
        $this->load->view('pembukuan/pembukuan-laporan',$data);
        $this->load->view('footer');
    }
}
?>