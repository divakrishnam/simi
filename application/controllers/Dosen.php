<?php
class Dosen extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('m_dosen');
        if($this->session->userdata('status') != 'login'){
            redirect(base_url('login'));
        }
    }

    function index(){
        $data['dosen'] = $this->m_dosen->show_data()->result();
        $this->load->view('header');
        $this->load->view('dosen/dosen-admin', $data);
        $this->load->view('footer');
    }

    function create_act(){
        $nik = $this->input->post('nik');
        $username = $this->input->post('username');
        $nama = $this->input->post('nama');
        $prodi = $this->input->post('prodi');
        $password = $this->input->post('password');
        $hak_akses = $this->input->post('hak_akses');
 
		$dataUser = array(
            'id' => $nik,
            'username' => $username,
            'password' => $password,
            'hak_akses' => $hak_akses,
        );
        
        $dataDosen = array(
            'nik' => $nik,
            'nama' => $nama,
            'prodi' => $prodi,
        );
        
        $this->m_dosen->input_data_user($dataUser);
        $this->m_dosen->input_data_dosen($dataDosen);
        $this->session->set_flashdata('message','simpan');
		redirect(base_url('dosen'));
    }

    function update($nik){
        $where = array('nik' => $nik);
        $data['user'] = $this->m_dosen->show_data_edit($where)->row();
        $data['dosen'] = $this->m_dosen->show_data()->result();
		$this->load->view('header');
        $this->load->view('dosen/dosen-admin-ubah', $data);
        $this->load->view('footer');
    }
    
    function update_act($nik){
        $nama = $this->input->post('nama');
        $prodi = $this->input->post('prodi');
        $password = $this->input->post('password');
        $hak_akses = $this->input->post('hak_akses');
 
		$dataUser = array(
            'password' => $password,
            'hak_akses' => $hak_akses,
        );
        
        $dataDosen = array(
            'nama' => $nama,
            'prodi' => $prodi,
        );

        $whereUser = array('id' => $nik);

        $whereDosen = array('nik' => $nik);
        
        $this->m_dosen->edit_data_user($whereUser, $dataUser);
        $this->m_dosen->edit_data_dosen($whereDosen, $dataDosen);
        $this->session->set_flashdata('message','ubah');
		redirect(base_url('dosen'));
    }

    function delete_act($nik){
        $whereUser = array('id' => $nik);
        $whereDosen = array('nik' => $nik);
        $this->m_dosen->delete_data_user($whereUser);
        $this->m_dosen->delete_data_dosen($whereDosen);
        $this->session->set_flashdata('message','hapus');
        redirect(base_url('dosen'));
    }
}
?>