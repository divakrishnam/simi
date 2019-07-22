<?php
class Dashboard extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('m_dashboard');
        if($this->session->userdata('status') != 'login'){
            redirect(base_url('login'));
        }
    }
    function index(){
        $hak_akses = $this->session->userdata('hak_akses');
        $where = array(
            'hak_akses' => $hak_akses,
            'id' => $this->session->userdata('id')
        );
        
        switch($hak_akses){
            case 'admin':
                $user = $this->m_dashboard->show_admin($where)->row();
                $this->session->unset_userdata('id');
                $this->session->unset_userdata('hak_akses');
                $data_session = array(
                    'id' => $user->id,
                    'hak_akses' => $user->hak_akses,
                    'nama' => $user->username,
                );
                $this->session->set_userdata($data_session);
                break;
            case 'koordinator':
                $user = $this->m_dashboard->show_dosen($where)->row();
                $this->session->unset_userdata('id');
                $this->session->unset_userdata('hak_akses');
                $data_session = array(
                    'id' => $user->nik,
                    'hak_akses' => $user->hak_akses,
                    'nama' => $user->nama,
                );
                $this->session->set_userdata($data_session);
                break;
            case 'kaprodi':
                $user = $this->m_dashboard->show_dosen($where)->row();
                $this->session->unset_userdata('id');
                $this->session->unset_userdata('hak_akses');
                $data_session = array(
                    'id' => $user->nik,
                    'hak_akses' => $user->hak_akses,
                    'nama' => $user->nama,
                );
                $this->session->set_userdata($data_session);
                break;
            case 'dosen':
                $user = $this->m_dashboard->show_dosen($where)->row();
                $this->session->unset_userdata('id');
                $this->session->unset_userdata('hak_akses');
                $data_session = array(
                    'id' => $user->nik,
                    'hak_akses' => $user->hak_akses,
                    'nama' => $user->nama,
                );
                $this->session->set_userdata($data_session);
                break;
            case 'mahasiswa':
                $user = $this->m_dashboard->show_mahasiswa($where)->row();
                $this->session->unset_userdata('id');
                $this->session->unset_userdata('hak_akses');
                $data_session = array(
                    'id' => $user->npm,
                    'hak_akses' => $user->hak_akses,
                    'nama' => $user->nama,
                );
                $this->session->set_userdata($data_session);
                break;
        }
        $this->load->view('header');
        $this->load->view('dashboard/dashboard');
        $this->load->view('footer');
    }
}
?>