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
        $npm = $this->input->post('npm');
        $date = date_create($this->input->post('tanggal_pembukuan'));
        $tanggal_pembukuan = date_format($date,"Y-m-d");
        $terlambat = $this->input->post('terlambat');
        
        $where = array('draft_sidang.npm' => $npm);
        $dt = $this->m_pembukuan->show_data_sidang($where)->row();

        $data = array(
            'kd_sidang' => $dt->kd_sidang,
            'npm' => $npm,
            'tgl_pembukuan' => $tanggal_pembukuan,
            'terlambat' => $terlambat,
        );

        $where = array('kd_sidang' => $dt->kd_sidang);
        $get = $this->m_pembukuan->show_data_all($where)->row();

        $bimbingan = array('kd_bimbingan'=> $get->kd_bimbingan,'kd_pendaftaran'=> $get->kd_pendaftaran,'npm' => $npm, 'status' => null);
        $pendaftaran = array('kd_pendaftaran'=> $get->kd_pendaftaran,'npm' => $npm, 'status' => null);
        $draftsidang = array('kd_bimbingan'=> $get->kd_bimbingan,'npm' => $npm, 'status' => null);
        $sidang = array('kd_sidang'=> $get->kd_sidang,'kd_bimbingan'=>$get->kd_bimbingan, 'status' => null );

        $this->m_pembukuan->input_data($data,$bimbingan, $pendaftaran, $draftsidang, $sidang); 
        $this->session->set_flashdata('message','simpan');
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
}
?>